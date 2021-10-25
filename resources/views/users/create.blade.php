@extends('layouts.dashboard')

@section('title')
    Tambah Anggota
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Tambah Anggota
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
                <h3 class="card-title">Lengkapi data secara valid</h3>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-group mb-3 ">
                        <label class="form-label required">Nama</label>
                        <div>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"  placeholder="Masukkan nama">
                            @error('nama')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Email <small>(Opsional ya min)</small></label>
                        <div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Masukkan email">
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @if (Auth::user()->roles()->where('slug', 'admin')->first())    
                    <div class="form-group mb-3 ">
                        <label class="form-label">Username</label>
                        <div>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"  placeholder="Masukkan username">
                            @error('username')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="form-group mb-3 ">
                        <label class="form-label required">No. Telp.</label>
                        <div>
                            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"  placeholder="Masukkan nomor telp" onkeyup="validNumber(this)">
                            @error('no_telp')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    @if (Auth::user()->roles()->where('slug', 'admin')->first()) 
                    <div class="form-group mb-3 ">
                        <label class="form-label">Password</label>
                        <div >
                        <input type="password" class="form-control" name="password" value="rahasia123">
                        <small class="form-hint">
                            Password <i>default</i> pengguna adalah <code>rahasia123</code>
                        </small>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label class="form-label">Hak Akses</label>
                        <select type="text" class="form-select"  id="role" name="role" value="">
                            <option value="">Pilih Hak Akses</option>
                            @foreach ($roles as $key => $role)
                                <option value="{{ $key }}">{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
function validNumber(num)
{
    if(!/^[0-9.]+$/.test(num.value))
    {
        num.value = num.value.substring(0, num.value.length-1000);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.Choices && (new Choices(el = document.getElementById('role'), {
        classNames: {
            containerInner: el.className,
            input: 'form-control',
            inputCloned: 'form-control-sm',
            listDropdown: 'dropdown-menu',
            itemChoice: 'dropdown-item',
            activeState: 'show',
            selectedState: 'active',
        },
        shouldSort: false,
        searchEnabled: false,
    }));
});
</script>
@endsection