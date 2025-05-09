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
        Schema::create('urunlers', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->integer('altkategori_id')->nullable();
            $table->string('baslik');
            $table->string('url');
            $table->string('tag')->nullable();
            $table->string('anahtar')->nullable();
            $table->string('aciklama')->nullable();
            $table->text('metin');
            $table->string('resim')->nullable();
            $table->boolean('durum')->default(1);
            $table->integer('sirano')->default(1);
            $table->decimal('fiyat', 10, 2);
            $table->integer('kontenjan')->nullable();
            $table->string('stok')->nullable();
            $table->string('link')->nullable();
            $table->date('baslangic_tarihi')->nullable();
            $table->date('bitis_tarihi')->nullable();
            $table->string('kalkis_noktasi')->nullable();
            $table->string('gidilecek_yerler')->nullable();
            $table->integer('sure')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urunlers');
    }
};
