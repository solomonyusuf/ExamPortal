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
        Schema::create('quiz_question', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('quiz_id');
            $table->text('title');
            $table->string('correct');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->integer('point')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_question');
    }
};
