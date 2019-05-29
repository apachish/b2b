<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('friendly_url');
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->string('image')->nullable();
            $table->boolean('status');
            $table->string('locale');
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
        Schema::dropIfExists('pages', function(Blueprint $table){

            $table->dropForeign('pages_last_modified_by_foreign');
        });
    }
}
