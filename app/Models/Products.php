<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "product_name",
        "description",
        "style",
        "brand",
        "created_at",
        "updated_at",
        "url",
        "product_type",
        "shipping_price",
        "note",
        "admin_id"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * the inventory relationship
     *
     * @return HasMany
     */
    public function inventories() : HasMany
    {
        return $this->hasMany(Inventory::class,  'product_id', 'id');
    }

    /**
     * this products orders
     *
     * @return HasMany
     */
    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * the admin
     *
     * @return BelongsTo
     */
    public function admin() : BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'admin_id');
    }
}
