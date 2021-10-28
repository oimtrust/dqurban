@extends('layouts.dashboard')

@section('title')
    Ubah Transaksi
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Ubah Transaksi
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
                <form method="POST" action="{{ route('income.update', $income->id) }}">
                    @csrf @method('PUT')
                    <div class="form-group mb-3">
                        <label class="form-label required">Nama Penabung</label>
                        <select type="text" class="form-select @error('nama_penabung') is-invalid @enderror"  id="nama_penabung" name="nama_penabung">
                            <option value="{{ $income->user_id }}">{{ $income->user->name }}</option>
                            @foreach ($users as $key => $user)
                                <option value="{{ $key }}">{{ $user }}</option>
                            @endforeach
                        </select>
                        @error('nama_penabung')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label required">Kategori</label>
                        <select type="text" class="form-select @error('kategori') is-invalid @enderror"  id="kategori" name="kategori">
                            <option value="{{ $income->category_id }}">{{ $income->category->name }}</option>
                            @foreach ($categories as $key => $category)
                                <option value="{{ $key }}">{{ $category }}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label required">Tanggal Menabung</label>
                        <div>
                            <input type="text" class="form-control @error('tanggal_menabung') is-invalid @enderror" id="tanggal_menabung" name="tanggal_menabung" value="{{ $income->income_date }}">
                            @error('tanggal_menabung')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label required">Jumlah</label>
                        <div>
                            <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"  value="{{ $income->amount }}" onkeyup="validNumber(this)">
                            @error('jumlah')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Catatan</label>
                        <div>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan">{{ $income->note }}</textarea>
                            @error('catatan')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
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
$(document).ready(function() {
    $('#nama_penabung').select2();
    $('#kategori').select2();
});

$('#tanggal_menabung').datepicker({
    format: 'yyyy-m-d',
    startDate: '-7d',
    todayHighlight: true
});
</script>
@endsection