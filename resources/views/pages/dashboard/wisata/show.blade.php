@extends('layouts._server')

@section('title')
    {{$data->title}}
@stop

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">{{$data->title}}</h2>
            <p class="dashboard-subtitle">
                Detail wisata
            </p>
        </div>
        <!-- section content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('wisata.update',$data->id)}}" method="post">
                    @csrf @method('put')
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="title">Title wisata</label>
                                        <input value="{{old('title') ? old('title') : $data->title }}" required name="title" type="text" id="title"class="form-control" name="title">
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="biaya_masuk">Biaya masuk</label>
                                        <input value="{{old('biaya_masuk') ? old('biaya_masuk') : $data->biaya_masuk }}" required type="number" id="biaya_masuk"class="form-control" name="biaya_masuk">
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="biaya_parkir">Biaya parkir</label>
                                        <select required name="biaya_parkir" id="" class="form-control">
                                            <option selected disabled >--Pilih--</option>
                                            <option value="1" {{$data->biaya_parkir == 1 ? 'selected' : ''}} >Ada</option>
                                            <option value="0" {{$data->biaya_parkir == 0 ? 'selected' : ''}}>Gratis</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" >
                                        <label>Kategori</label>
                                        <select name="category_id" id="kategori" class="form-control required">
                                            <option value="selected" disabled>Pilih kategori</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $data->category_id ? 'selected' : ''}} >{{$category->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="deskripsi">deskripsi</label>
                                        <textarea name="deskripsi" required class="form-control" name="deskirpsi" id="" cols="" rows="">{{old('deksirpsi') ? old('deskripsi') : $data->deskripsi}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nomor_hp">Kontak wisata</label>
                                        <input value="{{old('nomor_hp') ? old('nomor_hp') : $data->nomor_hp }}" type="number" class="form-control" name="nomor_hp" required>
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kota">Kota wisata </label>
                                        <textarea name="kota" id="" cols="1" rows="1" class="form-control " required>{{old('kota') ? old('kota') : $data->kota}}</textarea>
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="alamat">Alamat wisata (Lengkap) </label>
                                        <textarea name="alamat" id="" cols="1" rows="1" class="form-control " required>{{old('alamat') ? old('alamat') : $data->alamat}}</textarea>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="makanan_khas">Makanan khas </label>
                                        <textarea name="makanan_khas" id="" cols="1" rows="1" class="form-control " required>{{old('makanan_khas') ? old('makanan_khas') : $data->makanan_khas}}</textarea>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="featured">Budaya khas </label>
                                        <textarea name="featured" id="" cols="1" rows="1" class="form-control " required>{{old('featured') ? old('featured') : $data->featured}}</textarea>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button class="btn-block btn-success px-4" type="submit">
                                        Save now
                                    </button>
                                    <a href="{{route('wisata.index')}}" class="btn-block btn-secondary px-4 mt-2 text-center" type="submit">
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if(session('status'))
                            <div class="alert alert-success text-center">
                                {{session('status')}}
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                @foreach($data->gallery as $gallery)
                                <div class="col-md-4">
                                    <div class="gallery-container">
                                        <img src="{{Storage::url($gallery->foto)}}" class="w-100">
                                        <a href="{{route('gallery.delete',$gallery->id)}}" class="delete-gallery">
                                            <img src="/backend/images/icon-delete.svg">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-12">
                                    <input type="file" id="file" style="display: none;" multiple>
                                    <button class="btn btn-secondary btn-block mt-3" onclick="thisFileUpload()">
                                        Add Photo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop