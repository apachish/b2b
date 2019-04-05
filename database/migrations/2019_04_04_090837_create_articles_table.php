<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('detail');
            $table->string('image');
            $table->tinyInteger('sort_order');
            $table->boolean('status')->default(false);
            $table->string('locale');
            $table->tinyInteger('position');
            $table->boolean('feature');
            $table->unsignedBigInteger('last_modified_by');
            $table->foreign('last_modified_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('articles', function(Blueprint $table){

            $table->dropForeign('articles_last_modified_by_foreign');
        });
    }
}
