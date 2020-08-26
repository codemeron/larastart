<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('designation', 50);
            $table->string('department', 50);
            $table->string('course', 100);
            $table->string('yearlevel', 4);
            $table->string('section', 3);
            $table->string('office', 100);
            $table->string('idnumber', 17)->unique();
            $table->string('firstname', 50);
            $table->string('middlename', 50);
            $table->string('lastname', 50);
            $table->string('extension', 3);
            $table->string('gender', 6);
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->string('contactnumber', 11);
            $table->string('purok', 50);
            $table->string('barangay', 50);
            $table->string('municipality', 50);
            $table->string('province', 50);
            $table->string('password');
            $table->string('role')->default('Faculty');
            $table->string('photo')->default('profile.png');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
