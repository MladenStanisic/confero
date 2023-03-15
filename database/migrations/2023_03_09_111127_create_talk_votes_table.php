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
        Schema::create('talk_votes', function (Blueprint $table) {
            $table->id();
            $table->enum('vote', ['up', 'down']);
            $table->foreignId('talk_id')->constrained()->onDelete('cascade');
            $table->foreignId('attendee_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['attendee_id', 'talk_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talk_votes');
    }
};
