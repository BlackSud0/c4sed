<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUcolumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ucolumns', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->decimal('mass', 10, 3);
            $table->decimal('h', 10, 3);
            $table->decimal('b', 10, 3);
            $table->decimal('s', 10, 3);
            $table->decimal('t', 10, 3);
            $table->decimal('r', 10, 3);
            $table->decimal('d', 10, 3);
            $table->decimal('b/2t', 10, 3);
            $table->decimal('d/s', 10, 3);
            $table->decimal('Ix', 10, 3);
            $table->decimal('Iy', 10, 3);
            $table->decimal('rx', 10, 3);
            $table->decimal('ry', 10, 3);
            $table->decimal('Zx', 10, 3);
            $table->decimal('Zy', 10, 3);
            $table->decimal('Sx', 10, 3);
            $table->decimal('Sy', 10, 3);
            $table->decimal('u', 10, 3);
            $table->decimal('x', 10, 3);
            $table->decimal('Hw', 10, 3);
            $table->decimal('J', 10, 3);
            $table->decimal('A', 10, 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ucolumns');
    }
}
