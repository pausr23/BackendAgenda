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
        Schema::create('registered_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courses_activities_id')->constrained();
            $table->foreignId('categories_activities_id')->constrained();
            $table->foreignId('status_activities_id')->constrained();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->date('scheduled_at');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered_activities');
    }
};
