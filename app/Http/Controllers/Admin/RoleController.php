<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function IzinListe()
    {
        $izinler = Permission::all();
        return view('admin.rol.izin_liste', compact('izinler'));
    }
    //FONKSİYON BİTTİ

    public function IzinEkle()
    {
        return view('admin.rol.izin_ekle');
    }
    //FONKSİYON BİTTİ

    #İZİN EKLEME FORMU
    public function IzinEkleForm(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'grup_adi' => 'required',
            ],
            [
                'name.required' => 'İzin adı zorunludur.',
                'grup_adi.required' => 'grup adı zorunludur.',
            ],
        );

        $izin = Permission::create([
            'name' => $request->name,
            'grup_adi' => $request->grup_adi,
        ]);

        $mesaj = [
            'bildirim' => 'İzin ekleme başarılı.',
            'alert-type' => 'success',
        ];

        return Redirect()->back()->with($mesaj);
    }
    //İZİN EKLEME FORMU BİTTİ

    public function IzinDuzenle($id)
    {
        $izinler = Permission::FindOrFail($id);
        return view('admin.rol.izin_duzenle', compact('izinler'));
    }
    //FONKSİYON BİTTİ

    #İZİN GÜNCELLEME FORMU
    public function IzinGuncelle(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'grup_adi' => 'required',
            ],
            [
                'name.required' => 'İzin adı zorunludur.',
                'grup_adi.required' => 'Grup adı zorunludur.',
            ],
        );

        $izin_id = $request->id;

        Permission::findOrFail($izin_id)->update([
            'name' => $request->name,
            'grup_adi' => $request->grup_adi,
        ]);

        $mesaj = [
            'bildirim' => 'İzin güncelleme başarılı.',
            'alert-type' => 'success',
        ];

        return redirect()->route('izin.liste')->with($mesaj);
    }
    //İZİN GÜNCELLEME FORMU BİTTİ

    #İZİN SİLME FORMU
    public function IzinSil($id)
    {
        Permission::findOrFail($id)->delete();

        $mesaj = [
            'bildirim' => 'İzin Başarıyla Silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }
    //İZİN SİLME FORMU BİTTİ

    /*         ROLLER            */

    public function RolListe()
    {
        $rol = Role::all();
        return view('admin.rol.rol_liste', compact('rol'));
    }
    //FONKSİYON BİTTİ

    public function RolEkle()
    {
        return view('admin.rol.rol_ekle');
    }
    //FONKSİYON BİTTİ

    #ROL EKLEME FORMU
    public function RolEkleForm(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Rol adı zorunludur.',
            ],
        );

        $rol = Role::create([
            'name' => $request->name,
        ]);

        $mesaj = [
            'bildirim' => 'Rol ekleme başarılı.',
            'alert-type' => 'success',
        ];

        return Redirect()->route('rol.liste')->with($mesaj);
    }
    //ROL EKLEME FORMU BİTTİ

    public function RolDuzenle($id)
    {
        $rol = Role::FindOrFail($id);
        return view('admin.rol.rol_duzenle', compact('rol'));
    }
    //FONKSİYON BİTTİ

    #İZİN GÜNCELLEME FORMU
    public function RolGuncelle(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'İzin adı zorunludur.',
            ],
        );

        $rol_id = $request->id;

        Role::findOrFail($rol_id)->update([
            'name' => $request->name,
            'grup_adi' => $request->grup_adi,
        ]);

        $mesaj = [
            'bildirim' => 'Rol güncelleme başarılı.',
            'alert-type' => 'success',
        ];

        return redirect()->route('rol.liste')->with($mesaj);
    }
    //İZİN GÜNCELLEME FORMU BİTTİ

    #ROL SİLME FORMU
    public function RolSil($id)
    {
        Role::findOrFail($id)->delete();

        $mesaj = [
            'bildirim' => 'Rol Başarıyla Silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }
    //ROL SİLME FORMU BİTTİ

    /*         ROLLER  İZİNLERİ           */

    public function RolYetki()
    {
        $roller = Role::all();
        $izinler = Permission::all();
        $izin_gruplar = User::IzinGruplar();
        return view('admin.rol.rol_yetki', compact('roller', 'izinler', 'izin_gruplar'));
    }
    //FONKSİYON BİTTİ

    public function RolYetkiForm(Request $request)
    {
        $data = [];
        $yetkiler = $request->yetki ?? [];

        if (is_array($yetkiler)) {
            foreach ($yetkiler as $key => $item) {
                $role_id = $request->rol_id;
                $permission_id = $item;

                $exists = DB::table('role_has_permissions')->where('role_id', $role_id)->where('permission_id', $permission_id)->exists();

                if (!$exists) {
                    $data['role_id'] = $role_id;
                    $data['permission_id'] = $permission_id;

                    DB::table('role_has_permissions')->insert($data);
                }
            }
        }

        $mesaj = [
            'bildirim' => 'Role yetki başarıyla verildi.',
            'alert-type' => 'success',
        ];

        return redirect()->route('rol.yetki.liste')->with($mesaj);
    }
    //FORM BİTTİ
    public function RolYetkiListe()
    {
        $rol = Role::all();
        return view('admin.rol.rol_yetki_liste', compact('rol'));
    }
    //FONKSİYON BİTTİ

    public function RolYetkiDuzenle($id)
    {
        $rol = Role::findOrFail($id);
        $yetkiler = Permission::all();
        $izin_gruplar = User::IzinGruplar();

        return view('admin.rol.rol_yetki_duzenle', compact('rol', 'yetkiler', 'izin_gruplar'));
    }
    //FONKSİYON BİTTİ

    public function RolYetkiGuncelle(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'yetki' => 'array|nullable',
            'yetki.*' => 'integer|exists:permissions,id',
        ]);

        $rol = Role::findOrFail($id);

        $rol->name = $validated['name'];
        $rol->save();

        if (isset($validated['yetki'])) {
            $rol->permissions()->sync($validated['yetki']);
        } else {
            $rol->permissions()->sync([]);
        }

        if (isset($validated['yetki'])) {
            foreach ($validated['yetki'] as $permissionId) {
                DB::table('model_has_permissions')->updateOrInsert(['model_id' => $rol->id, 'model_type' => Role::class, 'permission_id' => $permissionId]);
            }
        }

        $mesaj = [
            'bildirim' => 'Rol yetkisi başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return redirect()->route('rol.liste')->with($mesaj);
    }

    //FORM BİTTİ

    public function RolYetkiSil($id)
    {
        $rol = Role::findOrFail($id);
        if (!is_null($rol)) {
            $rol->delete();
        }
        $mesaj = [
            'bildirim' => 'Rol yetkisi başarıyla silindi.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($mesaj);
    }
    //FORM BİTTİ

    public function KullaniciListe()
    {
        $kullanici_liste = User::where('rol', 'admin')->latest()->get();

        return view('admin.kullanicilar.kullanici_liste', compact('kullanici_liste'));
    }
    //FONKSİYON BİTTİ
    public function KullaniciEkle()
    {
        $roller = Role::all();
        return view('admin.kullanicilar.kullanici_ekle', compact('roller'));
    }
    //FONKSİYON BİTTİ

    public function KullaniciEkleForm(Request $request)
    {
        // İstek verilerini doğrulama
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'rol' => 'required|integer|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Yeni kullanıcı oluşturma
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol = 'admin';
        $user->mode = '1';
        $user->save();

        // Rol atama
        if ($request->rol) {
            $role = Role::find($request->rol);
            if ($role) {
                $user->assignRole($role);
            } else {
                return redirect()
                    ->route('kullanici.liste')
                    ->with([
                        'bildirim' => 'Belirtilen rol mevcut değil.',
                        'alert-type' => 'error',
                    ]);
            }
        }

        // Başarı mesajı
        $mesaj = [
            'bildirim' => 'Kullanıcı başarıyla eklendi.',
            'alert-type' => 'success',
        ];

        return redirect()->route('kullanici.liste')->with($mesaj);
    }
    //FORM BİTTİ

    public function KullaniciDuzenle($id)
    {
        $user = User::findOrFail($id);
        $roller = Role::all();
        return view('admin.kullanicilar.kullanici_duzenle', compact('user', 'roller'));
    }
    //FONKSİYON BİTTİ

    public function KullaniciGuncelleForm(Request $request, $id)
    {
        // İstek verilerini doğrulama
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'rol' => 'required|integer|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Kullanıcıyı bul ve güncelle
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Şifre güncellenmek istenirse (Opsiyonel)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Rol atama
        if ($request->rol) {
            $role = Role::find($request->rol);
            if ($role) {
                $user->syncRoles([$role->id]);
            } else {
                return redirect()
                    ->route('kullanici.liste')
                    ->with([
                        'bildirim' => 'Belirtilen rol mevcut değil.',
                        'alert-type' => 'error',
                    ]);
            }
        }

        // Başarı mesajı
        $mesaj = [
            'bildirim' => 'Kullanıcı başarıyla güncellendi.',
            'alert-type' => 'success',
        ];

        return redirect()->route('kullanici.liste')->with($mesaj);
    }

    public function KullaniciSil($id)
    {
        // Kullanıcıyı bul ve sil
        $user = User::find($id);
    
        if ($user) {
            $user->delete(); // Kullanıcıyı veritabanından sil
            $mesaj = [
                'bildirim' => 'Kullanıcı başarıyla silindi.',
                'alert-type' => 'success',
            ];
        } else {
            $mesaj = [
                'bildirim' => 'Kullanıcı bulunamadı.',
                'alert-type' => 'error',
            ];
        }
    
        return redirect()->back()->with($mesaj);
    }
    
}
