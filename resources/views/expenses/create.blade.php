@extends('layouts.dashboard')

@section('title')
    Buat Pengeluaran
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Buat Pengeluaran
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
                <form method="POST" action="{{ route('expense.store') }}">
                    @csrf
                    <div class="form-group mb-3 ">
                        <label class="form-label required">Jumlah</label>
                        <div>
                            <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"  placeholder="Masukkan jumlah uang yang ditabung" onkeyup="validNumber(this)">
                            @error('jumlah')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label required">Kategori</label>
                        <select type="text" class="form-select @error('kategori') is-invalid @enderror"  id="kategori" name="kategori">
                            <option value="">Pilih Kategori</option>
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
                        <label class="form-label required">Tanggal Transaksi</label>
                        <div>
                            <input type="text" class="form-control @error('tanggal_transaksi') is-invalid @enderror" id="tanggal_transaksi" name="tanggal_transaksi" placeholder="Masukkan tanggal transaksi kejadian">
                            @error('tanggal_transaksi')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Catatan</label>
                        <div>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" name="catatan"  placeholder="Masukkan catatan bila ada"></textarea>
                            @error('catatan')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
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
$(document).ready(function() {
    $('#kategori').select2();
});

$('#tanggal_transaksi').datepicker({
    format: 'yyyy-m-d',
    todayHighlight: true
});
</script>
@endsection