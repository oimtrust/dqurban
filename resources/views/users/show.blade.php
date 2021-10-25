@extends('layouts.dashboard')

@section('title')
    Detail Anggota
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Detail Anggota
        </h2>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Berikut detail anggota</h3>
              </div>
              <div class="card-body">
                <form >
                    <div class="form-group mb-3 ">
                        <label class="form-label">Nama</label>
                        <div>
                            <input type="text" class="form-control" name="nama"  value="{{ $user->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Email</label>
                        <div>
                            <input type="email" class="form-control" name="email"  value="{{ $user->email }}" readonly>
                        </div>
                    </div>
                    @if (Auth::user()->roles()->where('slug', 'admin')->first())    
                    <div class="form-group mb-3 ">
                        <label class="form-label">Username</label>
                        <div>
                            <input type="text" class="form-control" name="username" {{ $user->username }} readonly>
                        </div>
                    </div>
                    @endif
                    <div class="form-group mb-3 ">
                        <label class="form-label">No. Telp.</label>
                        <div>
                            <input type="text" class="form-control" name="no_telp"  value="{{ $user->phone }}" readonly>
                        </div>
                    </div>
                    <div class="form-footer">
                        <a href="{{ route('user.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection