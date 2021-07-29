<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Member extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'members';
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'facebook_id',
        'google_id',
        'phone',
        'password'
    ];

    protected $hidden = [
        'password',
    ];
    /**
     * Get all of the comments for the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'member_id', 'id');
    }
}
