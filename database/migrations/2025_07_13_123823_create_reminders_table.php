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
        Schema::create('reminders', function (Blueprint $table) {
            $table->uuid('reminder_id')->primary();
            $table->uuid('task_id');
            $table->foreign('task_id')->references('task_id')->on('tasks')->onDelete('cascade');
            $table->dateTime('remind_at');
            $table->string('note', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
