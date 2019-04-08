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
            $table->string('image_path')->nullable();
            $table->boolean('status')->default(false);
            $table->bigInteger('last_modified_by')->nullable();
            $table->text('bio')->nullable();
            $table->enum('role',['customer', 'editor', 'admin'])->default('customer');
            $table->string('locale')->default('fa');
            $table->bigInteger('invited_by')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('company_details')->nullable();
            $table->text('address')->nullable();
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
            $table->timestamps();
            $table->string('pincode')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile')->nullable();
            $table->string('website')->nullable();
            $table->enum('login_type',['normal'])->default('normal');
            $table->dateTime('current_login')->nullable();
            $table->dateTime('last_login_date')->nullable();
            $table->string('ip_address')->nullable();
            $table->boolean('featured_company')->default(false);
            $table->text('token_key')->nullable();
            $table->text('meta_data')->nullable();
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
