<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password_hash');
            $table->string('password_plain');
            $table->boolean('superadmin')->default(0);
            $table->string('shop_name')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->dateTime('trial_ends_at')->nullable();
            $table->string('shop_domain')->nullable();
            $table->boolean('is_enabled')->default(1);
            $table->string('billing_plan')->nullable();
            $table->dateTime('trial_starts_at')->nullable();

            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
