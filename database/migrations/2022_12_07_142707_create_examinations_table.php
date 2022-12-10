<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name')->unique(); 
            $table->unsignedBigInteger('exam_type_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->date('starting_date'); 
            $table->date('ending_date');
            $table->tinyInteger('status')->default('0')->comment('1==active 0==not active');
            $table->mediumText('description')->nullable();
            $table->timestamps();
            $table->foreign('exam_type_id')->references('id')->on('exam_types')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinations');
    }
};
