<?php

namespace App\Repositories;

use App\Models\Order;
use DB;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Session;

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
        if (Auth::check()) {
            array_push($customer, ['member_id' => Auth::user()->id]);
        }

        DB::beginTransaction();
        try {
            $order = $this->model->create($customer);
            $order->detail_orders()->createMany($cart);

            DB::commit();
            Mail::to($order->email)->send(new OrderMail());
            Session::forget('cart');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error', __('message.payment_error'));
            return $e;
        }
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