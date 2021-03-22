<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "name",
        "email",
        "password_hash",
        "password_plain",
        "superadmin",
        "shop_name",
        "remember_token",
        "created_at",
        "updated_at",
        "card_brand",
        "card_last_four",
        "trial_ends_at",
        "shop_domain",
        "is_enabled",
        "billing_plan",
        "trial_starts_at"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        "password_hash",
        "password_plain",
        'remember_token',
    ];

    /**
     * fetch the pass hash for auth
     *
     * @return void
     */
    public function getAuthPassword(){
        return $this->password_hash;
    }

    /**
     * the users products
     *
     * @return HasMany
     */
    public function products() : HasMany
    {
        return $this->hasMany(Products::class, 'admin_id', 'id');
    }
}
