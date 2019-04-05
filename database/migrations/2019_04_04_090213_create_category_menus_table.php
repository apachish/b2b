<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_data')->nullable();
            $table->boolean('status');
            $table->string('locale');
            $table->string('type_menu')->nullable();
            $table->enum('position',['main_menu','footer_1','footer_2','footer_3','footer_4','footer_5','footer_6','footer_7','footer_8','header_1','header_2','header_3','network']);
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
        Schema::dropIfExists('category_menus');
    }
}
