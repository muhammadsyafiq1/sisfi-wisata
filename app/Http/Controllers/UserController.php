<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role','!=','admin')->get();
        return view('pages.dashboard.user.index', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'hp' => ['required'],
        ]);

        User::create([
            'name' => $request->name,
            'hp' => $request->hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->back()->with('status','Pengguna berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('status','Pengguna berhasil dihapus');

    }
}
