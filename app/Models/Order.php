<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'status',
        'member_id',
        'date_order_end',
        'date_take_money'
    ];

    public function detail_orders()
    {
        return $this->hasMany(DetailOrder::class, 'order_id', 'id');
    }

    /**
     * Get the member that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function analytic_revenue()
    {
        return $this->hasOne(AnalyticRevenue::class, 'order_id', 'id');
    }
}
