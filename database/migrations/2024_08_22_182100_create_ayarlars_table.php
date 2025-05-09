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
        Schema::create('ayarlars', function (Blueprint $table) {
            $table->id();
            $table->string('telefon')->nullable();
            $table->string('mail')->nullable();
            $table->string('adres')->nullable();
            $table->string('aciklama')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('discord')->nullable();
            $table->string('harita')->nullable();
            $table->string('youtube')->nullable();
            $table->string('snowflake', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayarlars');
    }
};
