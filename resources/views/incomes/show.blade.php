@extends('layouts.dashboard')

@section('title')
    Detail Transaksi
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Detail Transaksi
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
                <h3 class="card-title">Data transaksi tabungan yang dilakukan anggota</h3>
              </div>
              <div class="card-body">
                <form>
                    <div class="form-group mb-3">
                        <label class="form-label">Nama Penabung</label>
                        <input type="text" class="form-control" readonly value="{{ $income->user->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control" readonly value="{{ $income->category->name }}">
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Tanggal Menabung</label>
                        <input type="text" class="form-control" readonly value="{{ $income->income_date }}">
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Jumlah</label>
                        <input type="text" class="form-control" readonly  value="Rp. {{ number_format($income->amount, 2) }}">
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="form-label">Catatan</label>
                        <textarea class="form-control" readonly name="catatan">{{ $income->note }}</textarea>
                    </div>
                    <div class="form-footer">
                        <a href="{{ route('income.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
