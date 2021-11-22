@extends('layouts._server')

@section('title')
    Kategori wisata
@stop

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Kategori wisata</h2>
            <p class="dashboard-subtitle">
                Tambahkan kategori untuk wisata milik anda.
            </p>
        </div>
        <!-- section content -->
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('kategori.create')}}" class="btn btn-success">
                        Tambah kategori
                    </a>
                </div>
            </div>
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
                                Kategori wisata
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_id" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Keterangan Kategori</th>
                                        <th>Created</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{$d->nama_kategori}}</td>
                                            <td>{{$d->Keterangan ?? 'Tidak ada keterangan'}}</td>
                                            <td>{{date('D / m / Y ',strtotime($d->created_at))}}</td>
                                            <td>
                                                <form action="{{route('kategori.destroy',$d->id)}}" method="post">
                                                    @csrf @method('delete')
                                                    <a href="{{route('kategori.edit',$d->id)}}" class="btn btn-sm btn-warning">
                                                        Edit
                                                    </a>
                                                    <button class="btn btn-sm btn-danger" onClick="return confirm('Yakin hapus kategori {{$d->nama_kategori}} ? ')">
                                                        Hapus
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
        </div>
    </div>
</div>
@stop