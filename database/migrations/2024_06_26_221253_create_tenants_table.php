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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_added_by');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image');
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('lease_start_date');
            $table->date('lease_end_date');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade'); // Foreign Key
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade'); // Foreign Key

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
