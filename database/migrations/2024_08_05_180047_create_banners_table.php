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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('baslik')->nullable();
            $table->string('ust_baslik')->nullable();
            $table->string('aciklama')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->boolean('durum')->default(0);
            $table->integer('sirano')->nullable()->default(1);
            $table->string('resim')->nullable();
            $table->string('arkaplan')->nullable();
            $table->string('yaziresim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
