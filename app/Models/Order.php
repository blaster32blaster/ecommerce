<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "product_id",
        "inventory_id",
        "street_address",
        "apartment",
        "city",
        "state",
        "country_code",
        "zip",
        "phone_number",
        "email",
        "name",
        "order_status",
        "payment_ref",
        "transaction_id",
        "payment_amt_cents",
        "ship_charged_cents",
        "ship_cost_cents",
        "subtotal_cents",
        "total_cents",
        "shipper_name",
        "payment_date",
        "shipped_date",
        "tracking_number",
        "tax_total_cents",
        "created_at",
        "updated_at"
    ];

    /**
     * the product this belongs to
     *
     * @return BelongsTo
     */
    public function product() : BelongsTo
    {
        return $this->belongsTo(Products::class);
    }

    /**
     * the inventory this belongs to
     *
     * @return BelongsTo
     */
    public function inventory() : BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}
