<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailGonder;

class Mesaj extends Model
{
    use HasFactory;
    public $fillable = ['adi', 'email', 'telefon', 'konu','text'];

    public static function boot()
    {
        parent::boot();

        static::created(function ($bilgi) {
            $adminEmail = 'azizcnk34@gmail.com';
            Mail::to($adminEmail)->send(new MailGonder($bilgi));
        });
    }
}
