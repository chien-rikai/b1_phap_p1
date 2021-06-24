<?php

namespace App\Repositories;

use App\Models\Order;
use DB;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Session;

class OrderRepository extends AbstractRepository
{
    public function getModel()
    {
        return \App\Models\Order::class;
    }

    public function payment($customer, $cart = [])
    {
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
}