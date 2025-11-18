<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // applicant
            $table->string('resume_link', 255);
            $table->string('message', 255)->nullable();
            $table->string('status', 50)->default('Pending'); // Pending, Approved, Rejected
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
