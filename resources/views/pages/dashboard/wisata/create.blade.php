@extends('layouts._server')

@section('title')
    Create tour
@stop

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Buat wisata baru</h2>
            <p class="dashboard-subtitle">
                Tambahkan wisata milikimu agar lebih dikenal
            </p>
            @if(session('status'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success text-center">
                        {{session('status')}}
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- section content -->
        <div class="dashboard-content">
            <form action="{{route('wisata.store')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="title">Title wisata</label>
                                    <input required name="title" type="text" id="title"class="form-control" name="title">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="biaya_masuk">Biaya masuk</label>
                                    <input required type="number" id="biaya_masuk"class="form-control" name="biaya_masuk">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="biaya_parkir">Biaya parkir</label>
                                    <select required name="biaya_parkir" id="" class="form-control">
                                        <option selected disabled >--Pilih--</option>
                                        <option value="1">Ada</option>
                                        <option value="0">Gratis</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label>Kategori</label>
                                    <select name="category_id" id="kategori" class="form-control required">
                                        <option value="selected" disabled>Pilih kategori</option>
                                        @foreach($data as $d)
                                            <option value="{{$d->id}}">{{$d->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="deskripsi">deskripsi</label>
                                    <textarea name="deskripsi" required class="form-control" name="deskirpsi" id="" cols="" rows=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nomor_hp">Kontak wisata</label>
                                    <input type="number" class="form-control" name="nomor_hp" required>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kota">Kota wisata </label>
                                    <textarea name="kota" id="" cols="1" rows="1" class="form-control " required></textarea>
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="alamat">Alamat wisata (Lengkap) </label>
                                    <textarea name="alamat" id="" cols="1" rows="1" class="form-control " required></textarea>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="makanan_khas">Makanan khas </label>
                                    <textarea name="makanan_khas" id="" cols="1" rows="1" class="form-control " required></textarea>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="featured">Budaya khas </label>
                                    <textarea name="featured" id="" cols="1" rows="1" class="form-control " required></textarea>
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
</div>
@stop