@extends('layouts.auth')

@section('content')
<form class="card card-md" method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf
    <div class="card-body">
      <h2 class="card-title text-center mb-4">Masuk ke akun anda</h2>
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username">
        @error('username')
            <div class="invalid-feedback" role="alert">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-2">
        <label class="form-label">Password</label>
        <div class="input-group input-group-flat">
          <input type="password" id="password" name="password" required class="form-control @error('password') is-invalid @enderror"  placeholder="Masukkan password"  autocomplete="off">
          <span class="input-group-text">
            <a href="#" onclick="showPassword()" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
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
      <div class="mb-2">
        <label class="form-check">
          <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
          <span class="form-check-label" for="remember">Ingat saya di perangkat ini</span>
        </label>
      </div>
      <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Masuk</button>
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
