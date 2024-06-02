<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouritesTable extends Migration
{
    public function up()
    {
        Schema::create('favourites', function (Blueprint $table) {
            $table->bigIncrements('id_fav');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produks', 'id_produk')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('favourites');
    }
}
