@extends('layouts._server')

@section('title')
    Manage pengguna
@stop

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Data pengguna</h2>
            <p class="dashboard-subtitle">
                Admin dapat melakukan pendaftaran untuk pengguna /  kedinasan.
            </p>
        </div>
        <!-- section content -->
        <div class="dashboard-content">
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
                <div class="col-md-5">
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="card-title">
                                Tambah pengguna
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" id="name"class="form-control" name="name" required >
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email"class="form-control" name="email" required>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="hp">hp</label>
                                        <input type="number" id="hp"class="form-control" name="hp" required>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role">role</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="masyarakat">Masyarakat</option>
                                            <option value="kedinasan">Kedinasan</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="confirm_password">Konfirmasi password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right">
                                    <button class=" btn-success px-4" type="submit">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="card-title">
                                Data pengguna
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table_id" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kontak</th>
                                        <th>role</th>
                                        <th>Created</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}} <br> {{$user->hp}} </td>
                                            <td>{{$user->role}} </td>
                                            <td>{{\Carbon\Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans()}}</td>
                                            <td>
                                                <form action="{{route('user.destroy',$user->id)}}" method="post">
                                                    @csrf @method('delete')
                                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-warning btn-circle">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger " onClick="return confirm('Yakin hapus user {{$user->name}} ? ')">
                                                        <i class="fa fa-trash"></i>
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