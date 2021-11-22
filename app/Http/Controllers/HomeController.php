<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $partners = User::where('role','!=','admin')->count();
        $wisata = Tour::where('status','aktif')->count();
        $tours = Tour::with('gallery')->paginate(24);
        $country = DB::table('tours')
            ->distinct('negara')
            ->count();
        // $testimonials = Testimonial::with(['user','travelpackage'])->where('content','!=', NULL)
        //     ->inRandomOrder()
        //     ->take(3)
        //     ->get();
        return view('pages.index' , compact('tours','partners','wisata','country'));
    }

    public function detail($id)
    {
        $data = Tour::with('gallery','category','user')->where('slug', $id)->firstOrFail();
        return view('pages.detail', compact('data'));
    }
}
