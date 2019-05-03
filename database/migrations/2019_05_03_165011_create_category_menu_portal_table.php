<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryMenuPortalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_menu_portal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_menu_id');
            $table->foreign('category_menu_id')
                ->references('id')
                ->on('category_menus')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('portal_id');
            $table->foreign('portal_id')
                ->references('id')
                ->on('portals')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_menu_portal', function(Blueprint $table){

            $table->dropForeign('category_menu_portal_category_menu_id_foreign');
            $table->dropForeign('category_menu_portal_portal_id_foreign');
        });
    }
}
