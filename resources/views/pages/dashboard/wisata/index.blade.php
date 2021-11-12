@extends('layouts._server')

@section('title')
    Dashboard wisata
@stop

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Wisata Saya</h2>
            <p class="dashboard-subtitle">
                Tambahkan wisata anda agar lebih dikenal.
            </p>
        </div>
        <!-- section content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('wisata.create')}}" class="btn btn-success">
                        Tambahkan wisata
                    </a>
                </div>
            </div>
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
                                    <small class="text-{{$d->status == 'active' ? 'success' : 'danger'}}" >{{$d->status}}</small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop