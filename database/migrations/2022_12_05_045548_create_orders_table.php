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
            $table->string('invoice_no',255);
            $table->unsignedBigInteger('customer_id');
            $table->text('ship_address')->nullable();
            $table->text('ship_location')->nullable();
            $table->text('bill_address')->nullable();
            $table->text('bill_location')->nullable();
            $table->decimal('delivery_charge',18,2);
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->date('accepted_date')->nullable();
            $table->unsignedBigInteger('accepted_by')->nullable();
            $table->date('delivered_date')->nullable();
            $table->unsignedBigInteger('delivered_by')->nullable();
            $table->date('return_date')->nullable();
            $table->unsignedBigInteger('return_by')->nullable();
            $table->text('return_reason')->nullable();
            $table->unsignedBigInteger('status_id');
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
