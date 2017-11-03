<?php

//use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tab', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->integer('tab_id')->unsigned();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('tab_id')->references('id')->on('tabs');
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
        Schema::dropIfExists('project_tab');
        Schema::enableForeignKeyConstraints();
    }
}
