<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type',['main_page','category','product','article','page','url','sitemap','member','testimonials','help','newsletter','advertisement','contact_us','company']);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')
                ->references('id')
                ->on('category_menus')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('base_url')->nullable();
            $table->string('page_url')->nullable();
            $table->string('title');
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_data')->nullable();
            $table->tinyInteger('order_menu')->default(0);
            $table->boolean('status')->default(false);
            $table->string('locale');
            $table->string('class')->nullable();

            $table->enum('permission',['admin','guest','customer'])->default('guest');
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
        Schema::dropIfExists('menus', function(Blueprint $table){
            $table->dropForeign('menus_parent_id_foreign');
        });
    }
}
