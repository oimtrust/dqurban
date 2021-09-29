@extends('layouts.auth')

@section('content')
<form class="card card-md" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="card-body">
      <h2 class="card-title text-center mb-4">Buat akun baru</h2>
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan nama">
        @error('nama')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email">
        @error('email')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan username">
        @error('username')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group input-group-flat">
          <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password"  autocomplete="off">
          <span class="input-group-text">
            <a href="#" class="link-secondary" onclick="showPassword()" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
            </a>
          </span>
        </div>
        @error('password')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Daftar</button>
      </div>
    </div>
</form>
@endsection

@section('javascript')
<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
</script>
@endsection
