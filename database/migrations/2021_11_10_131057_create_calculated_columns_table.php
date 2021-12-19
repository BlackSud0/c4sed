<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatedColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculated_columns', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('column_type');
            $table->string('element_type');
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('L', 10, 2);
            $table->decimal('DL', 10, 2)->nullable();
            $table->decimal('LL', 10, 2)->nullable();
            $table->decimal('WL', 10, 2)->nullable();
            $table->integer('grade')->default(43);
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
        Schema::dropIfExists('calculated_columns');
    }
}
