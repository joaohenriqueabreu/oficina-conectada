<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('url')->unique();
            
            $table->string('email')->unique();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('logo_url')->nullable();

            $table->boolean('encrypt')->default(true);

            $table->string('callback_url')->unique();
            $table->string('public_token')->unique();
            $table->string('private_token')->unique();
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
        Schema::dropIfExists('products');
    }
}

