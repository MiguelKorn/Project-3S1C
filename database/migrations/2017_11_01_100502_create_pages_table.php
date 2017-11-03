<?php

//use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->unsigned();
            $table->string('name', 24);
            $table->string('logo');
            $table->timestamps();

            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts');
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
        Schema::dropIfExists('pages');
        Schema::enableForeignKeyConstraints();
    }
}
