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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to the user who did the training
            $table->string('session_name'); // Name of the training session
            $table->text('vocal_quality_feedback')->nullable(); // Feedback on vocal quality
            $table->text('gesture_feedback')->nullable(); // Feedback on hand gestures
            $table->text('expression_feedback')->nullable(); // Feedback on facial expressions
            $table->integer('vocal_quality_score')->nullable(); // Numeric score for vocal quality
            $table->integer('gesture_score')->nullable(); // Numeric score for hand gestures
            $table->integer('expression_score')->nullable(); // Numeric score for facial expressions
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
