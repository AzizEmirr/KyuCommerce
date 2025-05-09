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
        Schema::create('yorumlars', function (Blueprint $table) {
            $table->id();
            $table->string('adi')->nullable();
            $table->text('metin')->nullable();
            $table->boolean('durum')->default(0);
            $table->integer('sirano')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yorumlars');
    }
};
