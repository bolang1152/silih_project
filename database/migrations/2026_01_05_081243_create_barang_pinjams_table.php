<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barangpinjams', function (Blueprint $table) {
            // Opsi A: id string, akan diisi UUID oleh Model (booted creating)
            $table->string('id', 36)->primary();

            // FK ke barangs (barangs.id = string seperti "B2")
            $table->string('barangs_id');
            $table->foreign('barangs_id')
                ->references('id')
                ->on('barangs')
                ->cascadeOnDelete();

            // FK ke users (users.id defaultnya bigint)
            $table->foreignId('users_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->date('tanggal_pinjam');
            $table->date('tanggal_pengembalian')->nullable();

            $table->string('kategori_pinjam');
            $table->string('tujuan_pinjam');
            $table->text('keterangan_pinjam')->nullable();

            $table->string('dokumen_pendukung')->nullable();

            // Samakan dengan value yang kamu pakai di form & flow
            $table->enum('status_pinjam', [
                'diajukan',
                'disetujui',
                'ditolak',
                'dipinjam',
                'dikembalikan',
            ])->default('diajukan');

            $table->timestamps();

            // Optional: index bantu query
            $table->index(['users_id', 'status_pinjam']);
            $table->index(['barangs_id', 'status_pinjam']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangpinjams');
    }
};
