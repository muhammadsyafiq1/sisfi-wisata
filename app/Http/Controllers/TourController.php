<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        if(Auth::user()->role == 'admin'){
            $data = Tour::with('gallery','category')->orderBy('id','DESC')->get(); 
        }else {
            $data = Tour::with('gallery','category')->where('user_id', $user)->get();
        }
        return view('pages.dashboard.wisata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('pages.dashboard.wisata.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wisata = new Tour;
        $wisata->title = $request->title;
        $wisata->biaya_masuk = $request->biaya_masuk;
        $wisata->deskripsi = $request->deskripsi;
        $wisata->biaya_parkir = $request->biaya_parkir;
        $wisata->kota = $request->kota;
        $wisata->alamat = $request->alamat;
        $wisata->makanan_khas = $request->makanan_khas;
        $wisata->featured = $request->featured;
        $wisata->category_id = $request->category_id;
        $wisata->nomor_hp = $request->nomor_hp;
        $wisata->status = 'inactive';
        $wisata->user_id = Auth::user()->id;
        $wisata->slug = \Str::slug($request->title);
        $wisata->save();

        return redirect(route('gallery.create',$wisata->id))->with('status','Harap Tambahkan Foto wisata.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $data = Tour::with('category','gallery')->find($id);
        return view('pages.dashboard.wisata.show', compact('data','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Tour::find($id);
        $data->title = $request->title;
        $data->biaya_masuk = $request->biaya_masuk;
        $data->biaya_parkir = $request->biaya_parkir;
        $data->deskripsi = $request->deskripsi;
        $data->category_id = $request->category_id;
        $data->nomor_hp = $request->nomor_hp;
        $data->kota = $request->kota;
        $data->alamat = $request->alamat;
        $data->makanan_khas = $request->makanan_khas;
        $data->featured = $request->featured;
        $data->user_id = Auth::user()->id;
        $data->slug = \Str::slug($request->title);
        $data->save();
        return redirect()->back()->with('status','berhasil edit wisata.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tour::find($id);
        $data->delete();
        return redirect(route('wisata.index'))->with('status','berhasil hapus wisata.');
    }

    public function aktif ($id)
    {
        $data = Tour::find($id);
        $data->status = 'aktif';
        $data->save();
        return redirect()->back()->with('status','wisata berhasil diaktifkan.');

    }

    public function tutup($id)
    {
        $data = Tour::find($id);
        $data->is_open = 0;
        $data->save();
        return redirect()->back()->with('status','wisata berhasil ditutup.');
    }

    public function buka($id)
    {
        $data = Tour::find($id);
        $data->is_open = 1;
        $data->save();
        return redirect()->back()->with('status','wisata berhasil dibuka.');
    }
}
