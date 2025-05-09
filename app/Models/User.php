<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    protected $fillable = ['name', 'email', 'resim', 'password', 'mode'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'email', 'rol', 'password']);
    }

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function IzinGruplar()
    {
        $izin_gruplar = DB::table('permissions')->select('grup_adi')->groupBy('grup_adi')->get();
        return $izin_gruplar;
    }
    public static function YetkiGruplar($grup_adi)
    {
        $yetki = DB::table('permissions')->select('name', 'id')->where('grup_adi', $grup_adi)->get();
        return $yetki;
    }

    public static function RolYetkileri($rol, $yetkigrup)
    {
        foreach ($yetkigrup as $yetkiler) {
            if (!$rol->hasPermissionTo($yetkiler->name)) {
                return false;
            }
        }
        return true;
    }
}
