<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('portal_id');
            $table->foreign('portal_id')
                ->references('id')
                ->on('portals')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('image_path');
            $table->boolean('status');
            $table->bigInteger('last_modified_by');
            $table->text('bio');
            $table->enum('role',['customer', 'editor', 'admin']);
            $table->string('locale');
            $table->bigInteger('invited_by');
            $table->string('company_name');
            $table->string('company_logo');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('company_details');
            $table->text('address');
            $table->unsignedBigInteger('country_id');

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('state_id');

            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
            $table->string('pincode');
            $table->string('phone_number');
            $table->string('mobile');
            $table->string('website');
            $table->enum('login_type',['normal']);
            $table->dateTime('current_login');
            $table->dateTime('last_login_date');
            $table->string('ip_address');
            $table->boolean('featured_company');
            $table->text('token_key');
            $table->text('meta_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users', function(Blueprint $table){
            $table->dropForeign('users_portal_id_foreign');
            $table->dropForeign('users_category_id_foreign');
            $table->dropForeign('users_country_id_foreign');
            $table->dropForeign('users_state_id_foreign');
            $table->dropForeign('users_city_id_foreign');
        });
    }
}
