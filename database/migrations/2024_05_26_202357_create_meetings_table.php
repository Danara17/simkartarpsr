<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('type', ['raker', 'rakor', 'ratin', 'racil']);
            $table->enum('status', [
                'Dijadwalkan',
                'Berlangsung',
                'Selesai',
                'Dibatalkan',
                'Ditunda',
                'Dijadwalkan Ulang',
                'Menunggu Persetujuan',
                'Draft',
                'Ditolak',
                'Dikonfirmasi'
            ])->comment('Status Pertemuan');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
