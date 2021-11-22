@extends('layouts._server')

@section('title')
    Dashboard wisata
@stop

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        @if(Auth::user()->role == 'admin')
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Wisata Saya</h2>
            <p class="dashboard-subtitle">
            Admin dapat melakukan Hapus dan edit status wisata.

            </p>
        </div>
        @else
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Semua Wisata</h2>
            <p class="dashboard-subtitle">
                Tambahkan wisata daerah kampar agar lebih dikenal.
            </p>
        </div>
        @endif
        <!-- section content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('wisata.create')}}" class="btn btn-success">
                        Tambahkan wisata
                    </a>
                </div>
            </div>
            @if(Auth::user()->role != 'admin')
                @if(session('status'))
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="alert alert-success text-center">
                            {{session('status')}}
                        </div>
                    </div>
                </div>
                @endif
                <div class="row mt-4">
                    @foreach($data as $d)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <a href="{{route('wisata.show',$d->id)}}" class="card card-dashboard-product d-block">
                                <div class="gallery-containerr">
                                    <div class="card-body">
                                        <img src="{{Storage::url($d->gallery->first()->foto ?? '')}}" class="w-100 mb-2">
                                        <div class="product-title">{{$d->title}}</div>
                                        <div class="product-subtitle">{{$d->category->nama_kategori}}</div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <small class="text-{{$d->status == 'aktif' ? 'success' : 'danger'}}" >{{$d->status}}</small>
                                            </div>
                                            <div class="">
                                                <small class="badge badge-info" >{{$d->is_open == 1 ? 'BUKA' : 'TUTUP'}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
            <div class="row">
                <div class="col-12">
                    @if(session('status'))
                        <div class="alert alert-success text-center">
                            {{session('status')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="card-title">
                                Data seluruh wisata
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_id" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Pendaftar</th>
                                        <th>Kota</th>
                                        <th></th>
                                        <th>Alamat</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td><img src="{{Storage::url($d->gallery->first()->foto)}}" alt="" style="width: 100px;"></td>
                                            <td style="font-weight:bold;">{{$d->title ?? 'not found'}} <br> <small class="text-muted" style="font-size:12px;">{{$d->category->nama_kategori ?? 'not found'}}</small> <br> <small style="font-size: 10px;"> Oleh : {{$d->user->role}}</small>   </td>
                                            <td class="text-{{$d->status == 'aktif' ? 'success' : 'danger'}}" >{{$d->status ?? 'not found'}}</td>
                                            <td>{{$d->user->name ?? 'not found'}} <br> {{$d->user->hp ?? 'not found'}} </td>
                                            <td>{{$d->kot ?? 'not found'}}</td>
                                            <td class="text-{{$d->is_open  == 1 ? 'success' : 'danger'}}">{{$d->is_open == 1 ? 'Buka' : 'Tutup'}}</td>
                                            <td>{{$d->alamat ?? 'not found'}}</td>
                                            <td>
                                                <form action="{{route('wisata.destroy',$d->id)}}" method="post">
                                                    @csrf @method('delete')
                                                        @if($d->status == 'inactive')
                                                        <a href="{{route('tour.aktif',$d->id)}}" class="btn btn-sm btn-warning">
                                                            Ubah Aktif
                                                        </a>
                                                        @endif
                                                        <button class="btn btn-sm btn-danger btn-circle" onClick="return confirm('Yakin hapus kategori {{$d->nama_kategori}} ? ')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@stop