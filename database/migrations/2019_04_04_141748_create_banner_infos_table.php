<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('banner_id');
            $table->foreign('banner_id')
                ->references('id')
                ->on('banners')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('company_name');
            $table->string('phone_number');
            $table->string('mobile');
            $table->text('comment');
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
        Schema::dropIfExists('banner_infos', function(Blueprint $table){

            $table->dropForeign('banner_infos_banner_id_foreign');
        });
    }
}
