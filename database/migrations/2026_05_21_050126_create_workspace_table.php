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
    Schema::create('workspace', function (Blueprint $table) {
        $table->id('id_workspace'); // Primary Key kustom kelompokmu
        $table->string('nama_tugas'); // Nama aktivitas atau tugas workspace
        $table->text('deskripsi')->nullable(); // Detail catatan/tugas
        $table->string('status')->default('Pending'); // Status tugas (Pending, Selesai)
        $table->timestamps(); // Otomatis membuat kolom created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace');
    }
};
