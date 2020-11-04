<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataOffloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_offload', function (Blueprint $table) {
            $table->id();
            $table
                ->string('name')
                ->nullable(false)
                ->comment('Имя заказчика');
            $table
                ->string('phone_number', 50)
                ->comment('Номер телефона заказчика');
            $table
                ->string('email', 256)
                ->nullable(false)
                ->comment('Email заказчика');
            $table
                ->text('message')
                ->nullable(false)
                ->comment('Информация, которую хочет получить заказчик');
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
        Schema::dropIfExists('data_offload');
    }
}
