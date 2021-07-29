<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Models\AnalyticRevenue as Revenue;
use Carbon\Carbon;

class AnalyticRenuve implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $revenue = 0;

        foreach ($this->order->detail_orders as $key => $item) {
            $revenue += (($item->price_promotion > 0) ? $item->price_promotion : $item->price_base ) * $item->amount;
        }

        Revenue::create([
            'order_id' => $this->order->id,
            'date' => Carbon::now('Asia/Ho_Chi_Minh')->day,
            'month' => Carbon::now('Asia/Ho_Chi_Minh')->month,
            'year' => Carbon::now('Asia/Ho_Chi_Minh')->year,
            'revenue' => $revenue
        ]);
    }
}
