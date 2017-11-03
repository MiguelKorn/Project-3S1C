<?php

//use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->char('locale', 2);

            $table->string('name');
            $table->text('description');

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');
        });

        Schema::create('experience_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experience_id')->unsigned();
            $table->char('locale', 2);

            $table->string('description');

            $table->foreign('experience_id')
                ->references('id')
                ->on('experiences')
                ->onDelete('cascade');
        });

        Schema::create('group_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->char('locale', 2);

            $table->string('name');

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
        });

        Schema::create('instruction_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instruction_id')->unsigned();
            $table->char('locale', 2);

            $table->string('title');
            $table->string('description');

            $table->foreign('instruction_id')
                ->references('id')
                ->on('instructions')
                ->onDelete('cascade');
        });

        Schema::create('project_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->char('locale', 2);

            $table->string('title');
            $table->string('description');

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
        });

        Schema::create('tab_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tab_id')->unsigned();
            $table->char('locale', 2);

            $table->string('name');
            $table->string('title')->nullable();
            $table->string('text')->nullable();

            $table->foreign('tab_id')
                ->references('id')
                ->on('tabs')
                ->onDelete('cascade');
        });

        Schema::create('type_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->char('locale', 2);

            $table->string('name');

            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('cascade');
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
        Schema::dropIfExists('client_translations');
        Schema::dropIfExists('experience_translations');
        Schema::dropIfExists('instruction_translations');
        Schema::dropIfExists('page_translations');
        Schema::dropIfExists('project_translations');
        Schema::dropIfExists('type_translations');
        Schema::enableForeignKeyConstraints();
    }
}
