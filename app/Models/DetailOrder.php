<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;


    protected $table = 'detail_orders';
    protected $fillable = [
        'id',
        'product_id',
        'order_id',
        'price_base',
        'price_promotion',
        'amount',
        'sold',
    ];

    /**
     * Get the user that owns the DetailOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Get the user that owns the DetailOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
