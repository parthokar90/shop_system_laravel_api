<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('mobile',100)->nullable();
            $table->string('image',255)->nullable();
            $table->text('address')->nullable();
            $table->string('city',100)->nullable();
            $table->string('zip_code',100)->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->rememberToken();
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('user_details');
    }
}
