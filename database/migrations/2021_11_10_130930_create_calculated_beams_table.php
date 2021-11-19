<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatedBeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculated_beams', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('beam_type');
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('L', 10, 2);
            $table->decimal('DL', 10, 2);
            $table->decimal('LL', 10, 2);
            $table->decimal('WL', 10, 2)->nullable();
            $table->integer('grade')->default(43);
            $table->string('buckling')->default(false);
            $table->string('status')->nullable();
            $table->string('company_name')->nullable();
            $table->string('project_name')->nullable();
            $table->string('subject')->nullable();
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
        Schema::dropIfExists('calculated_beams');
    }
}
