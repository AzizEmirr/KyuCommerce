<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UrunMedya extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function urun()
    {
        return $this->belongsTo(Urunler::class, 'urun_id', 'id');
    }
}