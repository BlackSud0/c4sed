<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEanglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eangles', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->integer('H');
            $table->integer('B');
            $table->integer('t');
            $table->decimal('mass', 10, 2);
            $table->decimal('r1', 10, 1);
            $table->decimal('r2', 10, 1);
            $table->decimal('Cx', 10, 2);
            $table->decimal('Cy', 10, 2);
            $table->decimal('Ix', 10, 2);
            $table->decimal('Iy', 10, 2);
            $table->decimal('Iu', 10, 2);
            $table->decimal('Iv', 10, 2);
            $table->decimal('rx', 10, 2);
            $table->decimal('ry', 10, 2);
            $table->decimal('ru', 10, 2);
            $table->decimal('rv', 10, 2);
            $table->decimal('Sx', 10, 2);
            $table->decimal('Sy', 10, 2);
            $table->decimal('A', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eangles');
    }
}
