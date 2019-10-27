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
			$table->string('account');
			$table->string('password');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('department')->nullable();
			$table->integer('grade')->nullable();
			$table->enum('gender', ['male', 'female', 'secret'])->default('secret')->nullable();
            $table->string('phone')->nullable();
			$table->string('line_id')->nullable();
			//$table->Binary('propic')->nullable();
			$table->integer('score')->nullable();
			$table->timestamps();
        });
		
		DB::statement("ALTER TABLE `users` ADD `propic`  MEDIUMBLOB");
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
