<?php

//use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 50);
            $table->string('middlename', 50)->nullable();
            $table->string('lastname', 50);
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email', 100);
            $table->timestamp('dateofbirth')->nullable();
            $table->string('placeofbirth')->nullable();
            $table->string('nationality')->nullable();
            $table->integer('address_id')->nullable()->unsigned();
            $table->boolean('deletable')->default(true);

            $table->unique(['phone', 'mobile', 'email']);

            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');
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
        Schema::dropIfExists('contacts');
        Schema::enableForeignKeyConstraints();
    }
}
