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
            $table->string('question');
            $table->string('answer');
            $table->string('question_fa');
            $table->string('answer_fa');
            $table->integer('yes');
            $table->integer('no');
            $table->tinyInteger('sort_order');
            $table->boolean('status');
            $table->text('meta_data');
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
