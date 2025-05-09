<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogicerik extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Kategoriler()
    {
        return $this->belongsTo(Blogkategoriler::class, 'kategori_id', 'id');
    }
    
}
