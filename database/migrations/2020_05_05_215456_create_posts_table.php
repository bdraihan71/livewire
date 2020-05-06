<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('image')->nullable();
            $table->bigInteger('user_id');
            $table->bigInteger('subcategory_id');
            $table->timestamps();

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('subcategory_id');
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
}
