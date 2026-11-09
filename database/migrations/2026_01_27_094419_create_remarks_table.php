<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('remarks', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama
        $table->string('description')->nullable(); // Keterangan (Teman SD, dll)
        $table->text('remark'); // Ucapan/Doa
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remarks');
    }
};
