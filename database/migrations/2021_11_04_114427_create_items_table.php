<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 100)->nullable();
            $table->unsignedInteger('commodity_id')->nullable();
            $table->string('slug')->nullable();
            $table->string('gambar', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('diskon')->nullable();
            $table->unsignedInteger('harga')->nullable();
            $table->json('keterangan', 30)->nullable();
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
        Schema::dropIfExists('items');
    }
}
