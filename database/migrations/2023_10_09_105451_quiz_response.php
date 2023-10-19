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
        Schema::create('quiz_response', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('quiz_id');
            $table->foreignUuid('question_id');
            $table->foreignUuid('users_id');
            $table->string('response');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_response');
    }
};
