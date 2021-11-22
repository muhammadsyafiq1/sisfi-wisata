<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tour;

class DashboardController extends Controller
{
    public function index()
    {
        $tours = Tour::with('gallery')->where('status','aktif')->take(5)->get(); 
        $user = User::where('role', '!=', 'admin')->count();
        $data = Tour::where('status','=','aktif')->count();
        return view('pages.dashboard.index', compact('user','data','tours'));
    }
}
