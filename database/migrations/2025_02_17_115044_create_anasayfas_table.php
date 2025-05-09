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
        Schema::create('anasayfas', function (Blueprint $table) {
            $table->id();
            $table->boolean('headerdurum')->default(1);
            $table->boolean('bannerdurum')->default(1);
            $table->boolean('kategoridurum')->default(1);
            $table->boolean('discorddurum')->default(1);
            $table->string('dcarkaplanresim')->nullable();
            $table->string('dcyoutubevideo')->nullable();
            $table->string('dcbaslik')->nullable();
            $table->string('dcbuton')->nullable();
            $table->string('dcaciklama')->nullable();
            $table->boolean('urundurum')->default(1);
            $table->boolean('referansdurum')->default(1);
            $table->boolean('sosyaldurum')->default(1);
            $table->boolean('footerdurum')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anasayfas');
    }
};
