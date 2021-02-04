<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->string('blog_name');
            $table->Integer('cate_blog')->unsigned();
            $table->foreign('cate_blog')
                  ->references('cate_id')
                  ->on('category')
                  ->onDelete('cascade');
            $table->string('thumbnail');
            $table->string('mota');
            $table->text('content');
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
        Schema::dropIfExists('blog');
    }
}
