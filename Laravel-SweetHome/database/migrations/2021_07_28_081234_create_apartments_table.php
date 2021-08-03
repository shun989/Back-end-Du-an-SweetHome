<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price', 11, 2);
            $table->text('description');
            $table->integer('bathroomNumber')->nullable();
            $table->integer('bedroomNumber')->nullable();
            $table->string('photo');
            $table->text('address');
<<<<<<< HEAD
//            $table->unsignedBigInteger('category_id');
//            $table->unsignedBigInteger('wards_id');
//            $table->unsignedBigInteger('user_id');
=======
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('wards_id');
            $table->unsignedBigInteger('user_id');
>>>>>>> b33cddfc89923c718417d0913086fd44117a1a6a
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('status_id')
                ->nullable()
                ->constrained('status')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('ward_id')
                ->nullable()
                ->constrained('wards')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('apartments');
    }
}
