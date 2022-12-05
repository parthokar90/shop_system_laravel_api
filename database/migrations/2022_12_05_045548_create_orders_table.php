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
            $table->string('invoice_no');
            $table->unsignedBigInteger('user_id');
            $table->decimal('delivery_charge',18,2);
            $table->unsignedBigInteger('coupon_id');
            $table->text('ship_address');
            $table->text('ship_location');
            $table->text('bill_address');
            $table->text('bill_location');
            $table->unsignedBigInteger('status_id');
            $table->date('delivered_date');
            $table->date('cancel_date');
            $table->date('return_date');
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
