<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->unsignedBigInteger('inventory_id');
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->string('street_address');
            $table->string('apartment')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country_code');
            $table->integer('zip');
            $table->string('phone_number');
            $table->string('email');
            $table->string('name');
            $table->string('order_status')->nullable();
            $table->string('payment_ref')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_amt_cents')->default('0')->nullable();
            $table->string('ship_charged_cents')->default('0')->nullable();
            $table->string('ship_cost_cents')->default('0')->nullable();
            $table->string('subtotal_cents')->default('0')->nullable();
            $table->string('total_cents')->default('0')->nullable();
            $table->string('shipper_name')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->dateTime('shipped_date')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('tax_total_cents')->default('0')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
