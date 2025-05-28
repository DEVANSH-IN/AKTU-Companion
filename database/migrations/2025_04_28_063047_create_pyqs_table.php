<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pyqs', function (Blueprint $table) {
            $table->id();
            $table->enum('course',['B.Tech']);
            $table->integer('course_year');
            $table->string('subject');
            $table->integer('examination_year');
            $table->string('location');
            $table->string('public_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pyqs');
    }
};
