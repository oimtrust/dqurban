@extends('layouts.dashboard')

@section('title')
    Data Pengeluaran
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Data Pengeluaran
        </h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
          <a href="{{ route('expense.create') }}" class="btn btn-primary">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Buat Pengeluaran
          </a>
        </div>
      </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-xl">
    <div class="row row-cards">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Transaksi Pengeluaran</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th class="w-1">No.
                      </th>
                      <th>Uang Keluar</th>
                      <th>Kategori</th>
                      <th>Tanggal Transaksi</th>
                      <th>Catatan</th>
                      <th>Dicatat Oleh</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($expenses as $expense)
                          <tr>
                            <td><span class="text-muted">{{ ++$item }}</span></td>
                            <td>Rp. {{ number_format($expense->amount, 2) }}</td>
                            <td>{{ $expense->category->name }}</td>
                            <td>{{ date('d M Y', strtotime($expense->expense_date)) }}</td>
                            <td>{{ $expense->note ?? 'Tidak ada catatan' }}</td>
                            <td>{{ $expense->createdBy->name }}</td>
                            <td class="text-end">
                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                    <a href="{{ route('expense.edit', $expense->id) }}" class="btn btn-success btn-icon" aria-label="Ubah" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                        <line x1="16" y1="5" x2="19" y2="8"></line>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                          </tr>

                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Menampilkan <span>{{ $expenses->count() }}</span> data pengeluaran</p>
                <ul class="pagination m-0 ms-auto">
                    {{ $expenses->links() }}
                </ul>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection