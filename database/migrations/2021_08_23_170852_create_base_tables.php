<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('company_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('contact_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('company_type_id')->unsigned();
            $table->foreign('company_type_id')
                ->references('id')
                ->on('company_types');
            $table->integer('company_status_id')->unsigned();
            $table->foreign('company_status_id')
                ->references('id')
                ->on('company_statuses');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->integer('contact_role_id')->unsigned();
            $table->foreign('contact_role_id')
                ->references('id')
                ->on('contact_roles');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('company_types');
        Schema::dropIfExists('company_statuses');
        Schema::dropIfExists('contact_roles');
    }
}