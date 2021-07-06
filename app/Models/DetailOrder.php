<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_orders';
    protected $fillable = [
        'product_id',
        'order_id',
        'price_base',
        'price_promotion',
        'amount',
    ];

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
