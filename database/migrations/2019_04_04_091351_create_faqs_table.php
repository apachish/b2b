<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id');
            $table->foreign('parent_id')
                ->references('id')
                ->on('category_faq')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('question',1000);
            $table->text('answer');
            $table->enum('locale',['fa','en'])->default('fa');
            $table->integer('yes')->default(0);
            $table->integer('no')->default(0);
            $table->tinyInteger('sort_order')->default(0);
            $table->boolean('status')->default(false);
            $table->text('meta_data')->nullable();
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
        Schema::dropIfExists('faqs', function(Blueprint $table){

            $table->dropForeign('faqs_parent_id_foreign');

        });
    }
}
