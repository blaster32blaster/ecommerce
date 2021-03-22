<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "id",
        "product_id",
        "quantity",
        "color",
        "size",
        "weight",
        "price_cents",
        "sale_price_cents",
        "cost_cents",
        "sku",
        "length",
        "width",
        "height",
        "note"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public $timestamps = false;

    /**
     * the product relation
     *
     * @return BelongsTo
     */
    public function Product() : BelongsTo
    {
        return $this->belongsTo(Products::class);
    }
}
