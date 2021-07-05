<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'url_image',
        'description',
        'price',
        'price_promotion',
        'stock',
        'view',
        'count_rating',
        'score_rating',
        'star_rating',
        'category_id',
        'display'
    ];
    protected $casts = [
        'display' => 'boolean',
    ];
    
    protected $dates = ['deleted_at'];
    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail_orders()
    {
        return $this->hasMany(DetailOrder::class, 'product_id', 'id');
    }
}
