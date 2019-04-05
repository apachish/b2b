<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')
                ->references('id')
                ->on('memberships')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('plan_name');
            $table->integer('post_products')->default(0);
            $table->integer('posted_in_category')->default(0);
            $table->integer('category_allowed')->default(0);
            $table->integer('allowed_products')->default(0);
            $table->integer('no_of_enquiry')->default(0);
            $table->integer('duration');
            $table->string('price');
            $table->string('member_type');
            $table->dateTime('exp_date');
            $table->dateTime('activation_date');
            $table->enum('payment_status',[0,1,2,3,4])->default(0);//0=pending,1=paid,2=delete,3=cancel,4=returned
            $table->string('payment_mode');
            $table->string('upgrade_status');
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
        Schema::dropIfExists('orders', function(Blueprint $table){

            $table->dropForeign('orders_plan_id_foreign');
            $table->dropForeign('orders_member_id_foreign');

        });
    }
}
