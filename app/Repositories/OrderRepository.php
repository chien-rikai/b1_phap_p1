<?php

namespace App\Repositories;

use App\Models\Order;
use DB;
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
            Session::flash('success', __('message.payment_success'));
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error', __('message.payment_error'));
        }
    }
}