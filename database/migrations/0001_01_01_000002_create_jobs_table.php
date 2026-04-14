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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Job ki position (e.g. PHP Developer)
            $table->string('category'); // Job category
            $table->string('company_name')->nullable(); // Company ka naam
            $table->string('location'); // Job location
            $table->string('salary')->nullable(); // Salary range
            $table->text('description'); // Job requirements aur detail
            $table->string('job_type')->default('Full-time'); // Full-time, Part-time, Remote
            $table->integer('status')->default(1); // 1 = Active, 0 = Inactive
            $table->timestamps(); // created_at aur updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
