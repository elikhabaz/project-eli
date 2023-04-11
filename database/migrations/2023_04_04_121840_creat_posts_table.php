<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
           $table->id(); 
           $table->foreignId('cat_id');
           $table->foreignId('user_id');
           $table->string('title');
           $table->string('slug')->unique();
           $table->text('excerpt');
           $table->text('body');
           $table->string('date');
           $table->timestamps();
           $table->timestamp('published_at')->nullable();          
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
