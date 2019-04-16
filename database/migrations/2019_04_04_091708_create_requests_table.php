<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lead_id');
            $table->foreign('lead_id')
                ->references('id')
                ->on('leads')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->string('company_name');
            $table->string('email');
            $table->string('mobile');
            $table->longText('comments');
            $table->boolean('read_status')->default(true);
            $table->boolean('read_status_admin')->default(true);
            $table->boolean('status');
            $table->text('reply');
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
        Schema::dropIfExists('requests', function(Blueprint $table){

            $table->dropForeign('requests_lead_id_foreign');
            $table->dropForeign('requests_member_id_foreign');

        });
    }
}
