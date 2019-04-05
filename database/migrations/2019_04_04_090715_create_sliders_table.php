<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('portal_id');
            $table->foreign('portal_id')
                ->references('id')
                ->on('portals')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('last_modified_by');
            $table->foreign('last_modified_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('slide');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('status')->default(false);
            $table->string('locale');
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
        Schema::dropIfExists('sliders', function(Blueprint $table){

            $table->dropForeign('sliders_portal_id_foreign');
            $table->dropForeign('sliders_last_modified_by_foreign');
        });
    }
}
