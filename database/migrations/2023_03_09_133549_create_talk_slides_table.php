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
        Schema::create('talk_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('speaker');
            $table->foreign('speaker')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('talk_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['speaker', 'talk_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talk_slides');
    }
};
