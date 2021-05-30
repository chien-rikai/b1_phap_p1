<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'display'
    ];
    protected $casts = [
        'display' => 'boolean',
    ];

    protected $dates = ['deleted_at'];

    public function scopeDisplay($query, $order = 'id', $by = 'DESC')
    {
        return $query->whereDisplay(true)->orderBy($order, $by);
    }
    
    /**
     * Get all of the comments for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
