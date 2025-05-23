<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Altkategoriler extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function iliskikategori()
    {
        return $this->belongsTo(Kategoriler::class, 'kategori_id', 'id');
    }

    public function urunler()
    {
        return $this->hasMany(Urunler::class, 'altkategori_id', 'id');
    }
}
