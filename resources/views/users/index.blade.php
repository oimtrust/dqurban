@extends('layouts.dashboard')

@section('title')
    Daftar Pengguna
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Daftar Pengguna
        </h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
          <a href="{{ route('user.create') }}" class="btn btn-primary">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Tambah Pengguna
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
                <h3 class="card-title">Pengguna</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th class="w-1">No.
                      </th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Whatsapp</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                          <tr>
                            <td><span class="text-muted">{{ ++$item }}</span></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email ?? 'Email belum punya' }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->phone }}</td>
                            <td class="text-end">
                                  <div class="btn-list flex-nowrap">
                                    <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                      <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-icon" aria-label="Lihat" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
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

                                  @if ($user->username != 'oimtrust')    
                                  <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                      <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-icon" aria-label="Ubah" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                            <line x1="16" y1="5" x2="19" y2="8"></line>
                                         </svg>
                                      </a>
                                  </div>    
                                  
                                  <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                      <a href="#" class="btn btn-danger btn-icon" aria-label="Hapus" data-bs-toggle="modal" data-bs-target="#delete-{{ $user->id }}">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <line x1="4" y1="7" x2="20" y2="7"></line>
                                              <line x1="10" y1="11" x2="10" y2="17"></line>
                                              <line x1="14" y1="11" x2="14" y2="17"></line>
                                              <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                              <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                           </svg>
                                      </a>
                                  </div>
                                  @endif
                                </div>
                            </td>
                          </tr>

                          <div class="modal modal-blur fade" id="delete-{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <div class="modal-title">Apakah anda yakin?</div>
                                  <div>Jika anda melanjutkan, data pengguna bernama <b>{{ $user->name }}</b> akan hilang.</div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</button>
                                  <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yakin, hapus aja nih orang</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                      @endforeach
                  </tbody>
                </table>
              </div>
              <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Menampilkan <span>{{ $users->count() }}</span> anggota</p>
                <ul class="pagination m-0 ms-auto">
                    {{ $users->links() }}
                </ul>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection