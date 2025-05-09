<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriler extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function altKategoriler()
    {
        return $this->hasMany(Altkategoriler::class, 'kategori_id', 'id');
    }
}
