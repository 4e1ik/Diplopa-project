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
        Schema::create('posts', function (Blueprint $table) {
            $table->id ();
            $table->unsignedBigInteger ('user_id');
            $table->foreign ('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string ('title', '255')->nullable('false');
            $table->text ('content')->nullable('false');
            $table->text ('address')->nullable('false');
            $table->integer ('place')->unsigned();
            $table->boolean ('active')->default(false);
            $table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
