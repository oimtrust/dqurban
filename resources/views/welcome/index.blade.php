@extends('layouts.app')

@section('content')
<div class="container-xl d-flex flex-column justify-content-center">
  <div class="empty">
    <div class="empty-img"><img src="{{ asset('tabler/static/undraw_printing_invoices_5r4r.svg') }}"   alt="">
    </div>
    <p class="empty-title">Saldo: Rp. {{ number_format($total, 2) }}</p>
    <p class="empty-subtitle text-muted">
      Total saldo dihitung dari total tabungan nasabah dikurangi biaya pengeluaran
    </p>
  </div>
</div>
@endsection
