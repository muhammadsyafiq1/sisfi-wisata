@extends('layouts._server')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">
                Wisata terbaru
            </p>
        </div>
        <!-- section content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dahboard-card-title">
                                Pengguna
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{$user}} 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dahboard-card-title">
                                Wisata
                            </div>
                            <div class="dashboard-card-subtitle">
                                {{$data}} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">
                        Wisata baru didaftarkan
                    </h5>
                    @foreach($tours as $tour)
                        @if(Auth::user()->role  == 'admin' )
                        <a href="{{route('wisata.show',$tour->id)}}" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{Storage::url($tour->gallery->first()->foto)}}" class="w-100">
                                </div>
                                <div class="col-md-4">
                                    {{$tour->title}}
                                </div>
                                <div class="col-md-3">
                                    {{$tour->kota}}
                                </div>
                                <div class="col-md-3">
                                {{\Carbon\Carbon::createFromTimeStamp(strtotime($tour->created_at))->diffForHumans()}}
                                </div>
                                <div class="col-md-1 d-none d-md-block">
                                    <!-- <a href="{{route('wisata.show',$tour->id)}}"> -->

                                        <img src="/backend/images/dashboard-arrow-right.svg">
                                    <!-- </a> -->
                                </div>
                            </div>
                        </div>
                    </a>
                    @else
                    <a href="" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{Storage::url($tour->gallery->first()->foto)}}" class="w-100">
                                </div>
                                <div class="col-md-4">
                                    {{$tour->title}}
                                </div>
                                <div class="col-md-3">
                                    {{$tour->kota}}
                                </div>
                                <div class="col-md-3">
                                {{\Carbon\Carbon::createFromTimeStamp(strtotime($tour->created_at))->diffForHumans()}}
                                </div>
                                <div class="col-md-1 d-none d-md-block">
                                    <!-- <a href="{{route('wisata.show',$tour->id)}}"> -->

                                        <!-- <img src="/backend/images/dashboard-arrow-right.svg"> -->
                                    <!-- </a> -->
                                </div>
                            </div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection