@extends('layouts._server')

@section('title')
    Tambah kategori
@stop

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Create new category</h2>
            <p class="dashboard-subtitle">
                Create tour category
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
            <form action="{{route('kategori.store')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama kategori</label>
                                    <input type="text" id="nama_kategori"class="form-control" name="nama_kategori" required >
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Keterangan">Keterangan (opsional) </label>
                                    <input type="text" id="Keterangan"class="form-control" name="keterangan">
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button class="btn-block btn-success px-4" type="submit">
                                    Save now
                                </button>
                                <a href="{{route('kategori.index')}}" class=" mt-3 text-center btn-block btn-secondary px-4" type="submit">
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