<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogkategoriler extends Model
{
    use HasFactory;


    public function Blogicerikler()
    {
        return $this->hasMany(Blogicerik::class, 'kategori_id', 'id');
    }

    protected $guarded = [];
}
