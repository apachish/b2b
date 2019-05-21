<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('banner_position');
            $table->tinyInteger('time_duration');
            $table->string('image');
            $table->string('banner_url');
            $table->string('banner_page');
            $table->enum('status',[-1,1,0])->comment('0-> new ,1-> active,-1->deactivate');
            $table->enum('banner_type',[1,2]);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->tinyInteger('sort_order');
            $table->integer('clicks');
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
        Schema::dropIfExists('banners', function(Blueprint $table){

            $table->dropForeign('banners_user_id_foreign');
        });
    }
}
