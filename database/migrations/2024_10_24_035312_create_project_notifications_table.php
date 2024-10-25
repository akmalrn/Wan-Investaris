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
        Schema::create('project_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_member_id');
            $table->foreign('team_member_id')->references('id')->on('team_member')->onDelete('cascade');
            $table->timestamps();

            $table->string('message')->nullable(); // Pesan notifikasi
            $table->boolean('is_read')->default(false); // Status apakah sudah dibaca
            $table->string('type')->nullable(); // Jenis notifikasi
            $table->unsignedBigInteger('created_by')->nullable(); // ID yang membuat notifikasi
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');

            // Optionally add leader_id
            $table->unsignedBigInteger('leader_id')->nullable();
            $table->foreign('leader_id')->references('id')->on('employees')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_notifications');
    }
};
