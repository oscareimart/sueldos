<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryrangeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_ranges', function (Blueprint $table) {
            $table->id();
            $table->integer('from')->default(0);
            $table->integer('to')->default(0);
            $table->integer('percentage_value')->default(0);
            // $table->enum('category',['BA','ANS'])->default('BA');
            $table->string('category');
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
        Schema::dropIfExists('salary_ranges');
    }
}
