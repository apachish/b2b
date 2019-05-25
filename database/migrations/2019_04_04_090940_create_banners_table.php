<?php

use App\Banner;
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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('banner_position',Banner::type_position('key'));
            $table->tinyInteger('time_duration');
            $table->string('image');
            $table->string('title');
            $table->string('banner_url');
            $table->enum('status',[-1,1,0])->comment('0-> new ,1-> active,-1->deactivate');
            $table->enum('banner_type',[Banner::BANNER_ADMIN,Banner::BANNER_USER]);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('sort_order');
            $table->integer('clicks')->default(0);
            $table->string('locale')->default('fa');
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
