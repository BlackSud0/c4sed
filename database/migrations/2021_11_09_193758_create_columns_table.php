<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->decimal('mass', 10, 2);
            $table->decimal('h', 10, 1);
            $table->decimal('b', 10, 2);
            $table->decimal('s', 10, 2);
            $table->decimal('t', 10, 2);
            $table->decimal('r', 10, 2);
            $table->decimal('d', 10, 2);
            $table->decimal('b2t', 10, 2);  // b/2t
            $table->decimal('ds', 10, 2);   // d/s
            $table->decimal('Ix', 10, 1);
            $table->decimal('Iy', 10, 1);
            $table->decimal('rx', 10, 2);
            $table->decimal('ry', 10, 2);
            $table->decimal('Zx', 10, 1);
            $table->decimal('Zy', 10, 1);
            $table->decimal('Sx', 10, 1);
            $table->decimal('Sy', 10, 1);
            $table->decimal('u', 10, 2);
            $table->decimal('x', 10, 2);
            $table->decimal('Hw', 10, 2);
            $table->decimal('J', 10, 2);
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
        Schema::dropIfExists('columns');
    }
}
