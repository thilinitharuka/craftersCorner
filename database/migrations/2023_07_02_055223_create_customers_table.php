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
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming you link customers to users
                $table->string('firstName')->nullable()->default(null);;
                $table->string('lastName')->nullable()->default(null);;
                $table->string('address')->nullable()->default(null);;
                $table->string('city')->nullable()->default(null);;
                $table->string('zip_code')->nullable()->default(null);;
                $table->string('country')->nullable()->default(null);;
                $table->string('phone_number')->nullable()->default(null);;
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
