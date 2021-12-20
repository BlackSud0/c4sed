<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatedEanglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculated_eangles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('eangle_type');
            $table->string('connection_type'); // Bolted or Welded
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('D', 10, 2)->nullable(); // Bolt hole diameter, when use bolted connection
            $table->decimal('DL', 10, 2)->nullable();
            $table->decimal('LL', 10, 2)->nullable();
            $table->decimal('WL', 10, 2)->nullable();
            $table->integer('grade')->default(43);
            $table->boolean('connected_to_both_sides')->default(false); // Double angles connected to both sides of a gusset
            $table->string('status')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('project_name')->nullable();
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
        Schema::dropIfExists('calculated_eangles');
    }
}
