<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works_image', function (Blueprint $table) {
            $table->bigIncrements('work_id');
            $table->bigInteger('id');
        });
		DB::statement("ALTER TABLE `works_image` ADD `cover_image` LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works_image');
    }
}
