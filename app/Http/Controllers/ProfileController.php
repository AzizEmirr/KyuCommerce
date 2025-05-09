<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $isPasswordUpdated = false;

        // Check if the password is updated
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
            $isPasswordUpdated = true;
        }

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->file('resim')) {
            $oldImagePath = public_path('uploads/admin/' . $user->resim);
            if ($user->resim && File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $resim = $request->file('resim');
            $extension = $resim->getClientOriginalExtension();
            $resimadi = uniqid() . '.' . $extension;
            $resim->move(public_path('uploads/admin'), $resimadi);
            $user->resim = $resimadi;
        }

        $user->save();

        $mesaj = [
            'bildirim' => 'Güncelleme Başarılı',
            'alert-type' => 'success',
        ];

        if ($isPasswordUpdated) {
            $mesaj['bildirim'] = 'Şifreniz başarıyla değiştirildi.';
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated')->with($mesaj);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $mesaj = [
            'bildirim' => 'Hesap kalıcı olarak silindi.',
            'alert-type' => 'warning',
        ];

        return Redirect::to('/login')->with($mesaj);
    }
}
