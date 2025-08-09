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
        Schema::create('generated_images', function (Blueprint $table) {
            $table->id(); // Primary key, auto increment
            $table->unsignedBigInteger('user_id')->nullable(); // Link to users table if exists
            $table->string('original_sketch_path')->comment('Path to uploaded sketch file');
            $table->string('generated_image_path')->comment('Path to AI generated image');
            $table->text('description')->nullable()->comment('User provided description');
            $table->text('prompt_used')->nullable()->comment('AI prompt used for generation');
            $table->enum('generation_status', ['pending', 'completed', 'failed'])
                ->default('pending')
                ->comment('Status of image generation');
            $table->integer('file_size')->nullable()->comment('File size in bytes');
            $table->integer('image_width')->nullable()->comment('Image width in pixels');
            $table->integer('image_height')->nullable()->comment('Image height in pixels');
            $table->integer('generation_time')->nullable()->comment('Generation time in seconds');
            $table->string('ip_address', 45)->nullable()->comment('User IP address');
            $table->timestamps(); // created_at and updated_at

            // Add indexes for better performance
            $table->index('user_id');
            $table->index('generation_status');
            $table->index('created_at');
            $table->index(['generation_status', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_images');
    }
};
