<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('description')->nullable();
            $table->string('style')->nullable();
            $table->string('brand')->nullable();
            $table->timestamps();
            $table->string('url')->nullable();
            $table->string('product_type')->nullable();
            $table->decimal('shipping_price')->nullable()->unsigned();
            $table->string('note')->nullable();
            $table->foreignId('admin_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

