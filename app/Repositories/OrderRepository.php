<?php

namespace App\Repositories;

use App\Models\Order;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;
use Carbon\Carbon;
use App\Jobs\SendingEmail;
use App\Jobs\AnalyticRenuve;

class OrderRepository extends AbstractRepository
{
    public function getModel()
    {
        return \App\Models\Order::class;
    }

    public function search($params)
    {
        $data = $this->model->select();
  
        if (isset($params['name']))
        {
            $data->orWhere('name', 'like', '%'.$params['name'].'%');
        }

        if (isset($params['email']))
        {
            $data->orWhere('email', 'like', '%'.$params['email'].'%');
        }

        if (isset($params['phone']))
        {
            $data->orWhere('phone', $params['phone']);
        }

        if (isset($params['status']))
        {
            $data->orWhere('status', $params['status']);
        }

        return $data->orderBy('id', 'DESC')->paginate(10);
    }

    public function payment($customer, $cart = [])
    {
        if (Auth::guard('site')->check()) {
            $customer['member_id'] = Auth::guard('site')->user()->id;
        }
        
        DB::beginTransaction();
        try {
            $order = $this->model->create($customer);
            $order->detail_orders()->createMany($cart);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error', __('message.payment_error'));
            return $e;
        }

        Session::forget('cart');
        Session::forget('customer');

        SendingEmail::dispatch($order);

        return;
    }

    public function clear($id)
    {
        $data = $this->model->find($id);

        if (blank($data)) {
            Session::flash('error', __('message.not_found'));
        }

        DB::beginTransaction();
        try {
            $data->detail_orders()->delete();
            $data->delete();

            DB::commit();
            Session::flash('success', __('message.success', ['action' => __('common.destroy'), 'model' => __('common.order')]));
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', __('message.error', ['action' => __('common.destroy'), 'model' => __('common.order')]));
        }

    }

    public function searchForMember($memberId, $params)
    {
        $data = $this->model->whereMemberId($memberId);

        if (!empty($params['status'])) {
            $data->whereStatus($params['status']);
        }

        return $data->orderBy('id', 'DESC')->paginate(self::LIMIT);
    }

    public function forward($id)
    {
        $order = $this->model->find($id);

        if (blank($order)) {
            Session::flash('error', __('message.not_found'));
        }

        $order->status += 1;

        DB::beginTransaction();
        try {
            if ((int) $order->status === 3) {
                $order->date_order_end = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
            }
    
            if ((int) $order->status === 4) {
                $order->date_take_money = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
                AnalyticRenuve::dispatch($order)->afterCommit();
            }
            
            $order->save();
            DB::commit();
            return $order;
        } catch (Exception $e) {
            return $e;
        }

    }

    public function analyticsStatusOrders()
    {
        return $this->model->select('status', DB::raw('count(*) as total'))
                           ->whereDate('created_at', '>=', Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString())
                           ->groupBy('status')
                           ->pluck('total','status')
                           ->all();
    }

    public function clear($id)
    {
        $data = $this->model->find($id);

        if (blank($data)) {
            Session::flash('error', 'Dữ liệu không tìm thấy !');
        }

        DB::beginTransaction();
        try {
            $data->detail_orders()->delete();
            $data->delete();

            DB::commit();
            Session::flash('success', 'Xóa thành công !');
        } catch (Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Xóa thất bại !');
        }

    }
}