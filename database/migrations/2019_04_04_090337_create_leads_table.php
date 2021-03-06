<?php

use App\Lead;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->enum('ad_type',['sell','buy']);
            $table->integer('no_of_visits')->default(0);
            $table->string('product_friendly_url');
            $table->string('description');
            $table->text('detail_description');
            $table->enum('status',Lead::typeStatus('key'))->default(0)->comment('0-> new ,1-> active,-1->deactivate');
            $table->enum('approval_status', Lead::typeApprovalStatus('key'))->default(1);
            $table->boolean('push_request')->default(false);
            $table->integer('sort_order')->default(0);
            $table->dateTime('publish_at')->nullable();
            $table->text('meta_data')->nullable();
            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('locale')->default('fa');
            $table->text('meta_keywords')->nullable();
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
        Schema::dropIfExists('leads', function(Blueprint $table){

            $table->dropForeign('leads_user_id_foreign');
            $table->dropForeign('products_city_id_foreign');
        });
    }
}
