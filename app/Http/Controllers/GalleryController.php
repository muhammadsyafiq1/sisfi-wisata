<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function createGallery ($id)
    {
        $data = Tour::find($id);
        return view('pages.dashboard.gallery.create', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('galleries','public');
        Gallery::create($data);
        return redirect()->back()->with('status','Gallery berhasil daitambahkan');
    }

    public function delete ($id)
    {
        $data = Gallery::find($id);
        $data->delete();
        return redirect()->back()->with('status','Gallery berhasil dihapus');
    }
}
