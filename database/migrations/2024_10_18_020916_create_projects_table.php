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
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('client_id')->constrained('clients');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['unprocessed', 'ongoing', 'completed', 'cancelled']);
            $table->decimal('budget', 65, 2);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
