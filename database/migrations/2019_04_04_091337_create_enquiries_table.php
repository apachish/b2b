<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type',['1', '2', '3', '4']);//1=Enquiries,2=bug report,3=advertisement,4=requst call
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('subject')->nullable();
            $table->string('email');
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile');
            $table->string('fax_number')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean('status');
            $table->boolean('reply_status');
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
        Schema::dropIfExists('enquiries', function(Blueprint $table){

            $table->dropForeign('enquiries_member_id_foreign');
            $table->dropForeign('enquiries_country_id_foreign');
            $table->dropForeign('enquiries_state_id_foreign');
            $table->dropForeign('enquiries_city_id_foreign');
        });
    }
}
