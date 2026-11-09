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
        Schema::create('site_contents', function (Blueprint $table) {
            $table->id();

            // Couple
            $table->string('groom_name');
            $table->string('groom_parents');
            $table->string('bride_name');
            $table->string('bride_parents');
            $table->string('groom_photo')->nullable();
            $table->string('bride_photo')->nullable();

            // Hero
            $table->string('wedding_date'); // free-text, e.g. "Sabtu, 12 April 2025"
            $table->string('hero_image_mobile')->nullable();
            $table->string('hero_image_desktop')->nullable();

            // Intro
            $table->text('intro_text');

            // Event / Save the Date
            $table->string('akad_date');
            $table->string('akad_time');
            $table->string('akad_venue_label');
            $table->string('akad_address');
            $table->string('resepsi_date');
            $table->string('resepsi_time');
            $table->string('resepsi_venue_label');
            $table->string('resepsi_address');
            $table->text('maps_embed_url')->nullable();
            $table->string('maps_link_url')->nullable();

            // Gift
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bank_account_owner');
            $table->string('gift_address');
            $table->string('gift_address_owner');

            // Verse
            $table->text('verse_text');
            $table->string('verse_reference');

            // Footer
            $table->string('footer_greeting');
            $table->string('footer_bg_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_contents');
    }
};
