@extends('layouts._server')

@section('title')
    Tambah gallery wisata
@stop

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Tambahkan foto wisata</h2>
            <p class="dashboard-subtitle">
                Foto wisata - {{$data->title}}
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
            <div class="row">
            @foreach ($data->gallery as $gallery)
            <div class="col-md-4">
                <div class="gallery-container">
                    <img src="{{ Storage::url($gallery->foto) }}" class="w-100">
                    <a href="{{route('gallery.delete',$gallery->id)}}" class="delete-gallery">
                        <img src="/backend/images/icon-delete.svg">
                    </a>
                </div>
            </div>
            @endforeach
            <div class="col-12">
                <form action="{{route('gallery.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @error('foto')
                    <span class="invalid-feedback">
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    </span>
                    @enderror
                    <input type="hidden" name="tour_id" value="{{ $data->id }}">
                    <input name="foto" type="file" id="file" style="display: none;" onchange="form.submit()">
                    @if($data->gallery->count() == 3)
                    <a class="btn btn-success btn-block mt-3" href="{{route('wisata.index')}}">
                        Selesai 
                    </a>
                    @else
                    <button class="btn btn-secondary btn-block mt-3" onclick="thisFileUpload()" type="button">
                        Add Photo
                    </button>
                    @endif
                </form>
            </div>
        </div>
        </div>
    </div>
</div>


<style>
  .gallery-container .delete-gallery{
     display: block;
  position: absolute;
  top: -10px;
  right: 0;
  }
</style>

@endsection

@push('scripts')
<script>
    function thisFileUpload() {
            document.getElementById("file").click();
        }
    </script>
@endpush

