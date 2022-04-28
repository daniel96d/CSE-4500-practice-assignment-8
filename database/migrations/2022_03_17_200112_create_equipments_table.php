<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hardwareSpecs');
            $table->string('category');
            $table->string('user');
            $table->string('userContact');
            $table->string('manufacturerName');
            $table->string('manufacturerSaleContact');
            $table->string('manufacturerTechContact');
            $table->DateTime('purchaseDate');
            $table->double('price',20, 2);
            $table->integer('invoice');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipments');
    }
};
