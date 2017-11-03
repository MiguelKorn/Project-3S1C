<?php

//use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_image', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->integer('image_id')->unsigned();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('project_image');
        Schema::enableForeignKeyConstraints();
    }
}
