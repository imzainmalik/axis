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
        Schema::create('tasks', function (Blueprint $table) {
            $table->string('subject');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('frequency')->nullable();
            $table->integer('days_until_due')->nullable();
            $table->boolean('repeat_forever')->default(false);
            $table->boolean('recurring')->default(false);
            $table->date('due_date')->nullable();
            $table->string('status')->default('Not Started');
            $table->string('priority')->nullable();
            $table->json('assignees')->nullable();
            $table->boolean('notify_assignees')->default(false);
            $table->string('related_to_type')->nullable();
            $table->integer('prperty_id');
            $table->timestamps();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
