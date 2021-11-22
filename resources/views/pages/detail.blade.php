<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <!-- xzoom -->
    <link rel="stylesheet" href="/frontend/assets/libraries/xzoom/xzoom.css">
    <!--Font awesome-->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;1,400;1,500&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="/frontend/assets/libraries/bootstrap/css/bootstrap.css">
    <!--my css-->
    <link rel="stylesheet" href="/frontend/assets/styles/main.css">
</head>
<body>

    <!--navigasi-->
    <div class="container">
        <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a href="#" class="navbar-brand">
                <img src="/frontend/assets/images/logos/logo.png" alt="logo">
            </a>
            <button 
                class="navbar-toggler navbar-toggler-right" 
                type="button" 
                data-toggle="collapse" 
                data-target="#navb"
            />
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2">
                        <a href="#" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#" class="nav-link">Wisata</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="{{route('dashboard')}}" class="nav-link">Dashboard</a>
                    </li>
                </ul>

                <!--mobile button-->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0">
                        Masuk
                    </button>
                </form>

                <!--desktop button-->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                        Masuk
                    </button>
                </form>

            </div>
        </nav>
    </div>

    <section class="section-details-header"></section>
    <section class="section-details-content">
        <div class="container">
            <div class="row">
                <div class="col p-0">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                Wisata
                            </li>
                            <li class="breadcrumb-item active">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-0">
                    <div class="card card-details">
                        <h1>{{$data->title}}</h1>
                        <p>
                            {{$data->negara}}, {{$data->kota}}
                        </p>
                        <!-- zoom -->
                        @if ($data->gallery->count())
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ Storage::url($data->gallery->first()->foto) }}"
                                style="height: 380px;"
                                    class="xzoom" 
                                    id="xzoom-default"
                                    xoriginal="{{ Storage::url($data->gallery->first()->foto) }}"
                                >
                            </div>
                            <!-- thumbails -->
                            <div class="xzoom-thumbs">
                                @foreach ($data->gallery as $gallery)
                                    <a href="{{ Storage::url($gallery->foto) }}">
                                    <img src="{{ Storage::url($gallery->foto) }}" 
                                        class="xzoom-gallery" 
                                        width="128px;" 
                                        height="128px;"
                                        xpreview="{{ Storage::url($gallery->foto) }}">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <h2>Tentang wisata</h2>
                            <p>
                                {{$data->deskripsi}}
                            </p>
                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="/frontend/assets/images/logos/ic_event.png" 
                                        alt="featured" 
                                        class="features-image">
                                    <div class="description">
                                        <h3>Kategori</h3>
                                        <p>{{$data->category->nama_kategori}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="/frontend/assets/images/logos/ic_language.png" 
                                        alt="featured" 
                                        class="features-image">
                                    <div class="description">
                                        <h3>Bahasa</h3>
                                        <p>Bahasa indonesia</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="/frontend/assets/images/logos/ic_foods.png" 
                                        alt="featured" 
                                        class="features-image">
                                    <div class="description">
                                        <h3>Makanan</h3>
                                        <p>{{$data->makanan_khas}}</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-details card-right" style="border-radius: 0;">
                        <h2>Members are going</h2>
                        <div class="members my-2">
                            <img src="/frontend/assets/images/logos/member-1.png"class="member-image mr-1">
                            <img src="/frontend/assets/images/logos/member-2.png"class="member-image mr-1">
                            <img src="/frontend/assets/images/logos/member-3.png"class="member-image mr-1">
                            <img src="/frontend/assets/images/logos/member-4.png"class="member-image mr-1">
                            <img src="/frontend/assets/images/logos/member-5.png"class="member-image mr-1">
                        </div>
                        <hr>
                        <h2>Trip information</h2>
                        <table class="trip-information">
                            <tr>
                                <th width="50%">Diresmikan</th>
                                <td width="50%" class="text-right">
                                {{\Carbon\Carbon::createFromTimeStamp(strtotime($data->created_at))->diffForHumans()}}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Biaya masuk</th>
                                <td width="50%" class="text-right">
                                    Rp. {{number_format($data->biaya_masuk)}}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Parkir</th>
                                <td width="50%" class="text-right">
                                    {{$data->biaya_parkir == 1 ? 'Berbayar' : 'Gratis'}}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Status</th>
                                <td width="50%" class="text-right">
                                    {{$data->is_open == 1 ? 'Buka' : 'tutup'}}
                                </td>
                            </tr>
                            <tr>
                                <th width="50%">Pemilik</th>
                                <td width="50%" class="text-right">
                                    {{$data->user->name}}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="join-container">
                        <a href="#" class="btn btn-block btn-join-now mt-3 py-2">
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="section-footer mt-5 mb-4 border-top">
        <div class="container pt-5 pb-5">
            <div class="row jsutify-content-center">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <h5>FEATURES</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Reviews</a></li>
                                <li><a href="#">Community</a></li>
                                <li><a href="#">Social media kit</a></li>
                                <li><a href="#">Affiliate</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>ACCOUNT</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Refund</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Reward</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>COMPANY</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Carrer</a></li>
                                <li><a href="#">Help center</a></li>
                                <li><a href="#">Meida</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3">
                            <h5>GET CONNECTED</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">Riau bangkinang</a></li>
                                <li><a href="#">Indonesia</a></li>
                                <li><a href="#">081268312221</a></li>
                                <li><a href="#">syafiq@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row border-top justify-content-center 
                align-items-center pt-4">
                <div class="col-auto text-gray-500 
                    font-weight-light">
                    2020 Copyright Nomads - All rights reserved 
                    - Made in bangkinang
                </div>
            </div>
        </div>
    </footer>

    <script src="/frontend/assets/libraries/jquery//jquery-3.5.1.min.js"></script>
    <script src="/frontend/assets/libraries/bootstrap/js/bootstrap.js"></script>
    <script src="/frontend/assets/libraries/retina/retina.min.js"></script>
    <script src="/frontend/assets/libraries/xzoom/xzoom.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                xoffset: 15
            });
        });
    </script>
</body>
</html>