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
        Schema::create('monthly_rents', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade'); // Foreign Key
            $table->date('month_year');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date')->nullable();
            $table->enum('payment_status', ['Paid', 'Unpaid', 'Late'])->default('Unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_rents');
    }
};
