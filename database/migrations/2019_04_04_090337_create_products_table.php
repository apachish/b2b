<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->enum('ad_type',['sell','buy']);
            $table->integer('no_of_visits');
            $table->string('product_friendly_url');
            $table->string('description');
            $table->text('detail_description');
            $table->string('featured_product');//0=No,1=Home,2=Category,3=SubCategory,4=SubSubCatgeory
            $table->boolean('status')->default(false);
            $table->boolean('new_status')->default(true);
            $table->tinyInteger('approval_status');
            $table->boolean('push_request')->default(false);
            $table->tinyInteger('sort_order');
            $table->dateTime('publish_date');
            $table->text('meta_data');
            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('locale');
            $table->text('meta_keywords');
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
        Schema::dropIfExists('products', function(Blueprint $table){

            $table->dropForeign('products_user_id_foreign');
            $table->dropForeign('products_city_id_foreign');
        });
    }
}
