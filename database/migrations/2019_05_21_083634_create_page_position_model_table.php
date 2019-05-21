<?php

use App\PagePosition;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagePositionModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_position_model', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_position_id');
            $table->foreign('page_position_id')
                ->references('id')
                ->on('page_positions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('id_model');
            $table->enum('model', PagePosition::type_model('key'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_position_model', function(Blueprint $table){

            $table->dropForeign('page_position_model_page_position_id_foreign');
        });
    }
}
