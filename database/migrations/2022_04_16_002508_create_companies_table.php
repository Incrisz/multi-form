<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
             //company's information
             $table->string('c_name', 255);
             $table->string('c_address', 255);
             $table->string('c_email')->unique();
             $table->timestamp('c_email_verified_at')->nullable();
             $table->string('c_phone', 20);
             
             //personal's information
             $table->string('p_name', 255);
             $table->string('p_phone', 20);
             $table->string('p_email')->unique();
             $table->timestamp('p_email_verified_at')->nullable();
             $table->string('p_position', 255);
 
             //Login information
             $table->string('username', 255)->unique();
             $table->string('password');
 
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
        Schema::dropIfExists('companies');
    }
}
