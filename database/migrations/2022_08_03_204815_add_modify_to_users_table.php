<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModifyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name','first_name');
            $table->renameColumn('email','last_name');
            $table->dropColumn('password');

            $table->string('image')->nullable();
            $table->string('mobile');
            $table->enum('gender',['Male','Female']);
            $table->enum('status',['Single','Married']);
            $table->date('date_of_birth');
            $table->foreignId('country_id');
            $table->foreign('country_id')->on('countries')->references('id')->cascadeOnDelete();
            $table->morphs('actor');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
