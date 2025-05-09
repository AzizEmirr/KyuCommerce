<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function updateMode(Request $request)
    {
        $user = Auth::user();
        $user->mode = $request->input('mode');
        $user->save();

        return redirect()->back()->with('status', 'Mode updated successfully!');
    }
}
