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
        Schema::create('gangas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('url');
            $table->unsignedBigInteger('category');
            $table->integer('likes')->default(0);
            $table->integer('unlikes')->default(0);
            $table->float('price');
            $table->float('price_sale');
            $table->boolean('available')->default(true);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('ganga');
    }
};
