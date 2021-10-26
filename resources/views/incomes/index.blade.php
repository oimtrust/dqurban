@extends('layouts.dashboard')

@section('title')
    Data Tabungan
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Data Tabungan
        </h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
          <a href="#" class="btn btn-primary">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Tambah Pemasukan
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
                <h3 class="card-title">Tabungan</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th class="w-1">No.
                      </th>
                      <th>Nama Penabung</th>
                      <th>Kategori</th>
                      <th>Uang Masuk</th>
                      <th>Tanggal Ditabung</th>
                      <th>Tanggal Dibuat</th>
                      <th>Dicatat Oleh</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($incomes as $income)
                          <tr>
                            <td><span class="text-muted">{{ ++$item }}</span></td>
                            <td>{{ $income->user->name }}</td>
                            <td>{{ $income->category->name }}</td>
                            <td>{{ $income->amount }}</td>
                            <td>{{ date('d M Y h:i:s', strtotime($income->income_date)) }}</td>
                            <td>{{ date('d M Y h:i:s', strtotime($income->created_at)) }}</td>
                            <td>{{ $income->createdBy->name }}</td>
                            <td class="text-end">
                                  <div class="btn-list flex-nowrap">
                                    <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                      <a href="{{ route('income.show', $income->id) }}" class="btn btn-info w-100 btn-icon" aria-label="Lihat" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eyeglass" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M8 4h-2l-3 10"></path>
                                              <path d="M16 4h2l3 10"></path>
                                              <line x1="10" y1="16" x2="14" y2="16"></line>
                                              <path d="M21 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                              <path d="M10 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                          </svg>
                                        </a>
                                  </div>
 
                                  <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                      <a href="{{ route('income.edit', $income->id) }}" class="btn btn-success w-100 btn-icon" aria-label="Ubah" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                            <line x1="16" y1="5" x2="19" y2="8"></line>
                                         </svg>
                                      </a>
                                  </div>    
                                
                                </div>
                            </td>
                          </tr>

                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Menampilkan <span>{{ $incomes->count() }}</span> data tabungan (uang yang masuk)</p>
                <ul class="pagination m-0 ms-auto">
                    {{ $incomes->links() }}
                </ul>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection