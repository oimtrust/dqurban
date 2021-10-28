@extends('layouts.dashboard')

@section('title')
    Daftar Kategori
@endsection

@section('page-title')
<div class="page-header d-print-none">
    <div class="row align-items-center">
      <div class="col">
        <h2 class="page-title">
          Daftar Kategori
        </h2>
      </div>
      <div class="col-auto ms-auto d-print-none">
        <div class="d-flex">
          <a href="{{ route('user.create') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-category">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
            Tambah Kategori
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
                <h3 class="card-title">Kategori</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead>
                    <tr>
                      <th class="w-1">No.
                      </th>
                      <th>Judul</th>
                      <th>Slug</th>
                      <th>Tipe</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $category)
                          <tr>
                            <td><span class="text-muted">{{ ++$item }}</span></td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if ($category->type === 'income')
                                    <span class="badge bg-green">Pemasukan</span>
                                @else
                                    <span class="badge bg-red">Pengeluaran</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-list flex-nowrap">
                                  <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                      <a href="#" class="btn btn-success w-100 btn-icon" aria-label="Ubah" data-bs-toggle="modal" data-bs-target="#edit-{{ $category->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                                            <line x1="16" y1="5" x2="19" y2="8"></line>
                                         </svg>
                                      </a>
                                  </div>    
                                  
                                  <div class="col-6 col-sm-4 col-md-2 col-xl-auto mb-3">
                                      <a href="#" class="btn btn-danger w-100 btn-icon" aria-label="Hapus" data-bs-toggle="modal" data-bs-target="#delete-{{ $category->id }}">
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
                                </div>
                            </td>
                          </tr>

                          <!--Modal Edit-->
                            <div class="modal modal-blur fade" id="edit-{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('category.update', $category->id) }}">
                                            @csrf @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <div class="col">
                                                        <label class="form-label required">Nama Kategori</label>
                                                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" value="{{ $category->name }}"/>
                                                        @error('nama_kategori')
                                                        <div class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="col">
                                                        <label class="form-label required">Tipe</label>
                                                        <select class="form-control @error('tipe') is-invalid @enderror" name="tipe">
                                                            <option value="{{ $category->type }}" selected>
                                                                @if ($category->type === 'income')
                                                                    Pemasukan
                                                                @else
                                                                    Pengeluaran
                                                                @endif
                                                            </option>
                                                            <option value="income">Pemasukan</option>
                                                            <option value="expense">Pengeluaran</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          <!--Delete Modal-->
                          <div class="modal modal-blur fade" id="delete-{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-body">
                                  <div class="modal-title">Apakah anda yakin?</div>
                                  <div>Jika anda melanjutkan, kategori <b>{{ $category->name }}</b> akan hilang.</div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Batal</button>
                                  <form method="POST" action="{{ route('category.destroy', $category->id) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Yakin dong!</button>
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
                <p class="m-0 text-muted">Menampilkan <span>{{ $categories->count() }}</span> kategori</p>
                <ul class="pagination m-0 ms-auto">
                    {{ $categories->links() }}
                </ul>
              </div>
            </div>
          </div>
    </div>
</div>

<!--Modal Add-->
<div class="modal modal-blur fade" id="add-category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('category.store') }}">
              @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Buat kategori baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="col">
                            <label class="form-label required">Nama Kategori</label>
                            <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori"/>
                            @error('nama_kategori')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col">
                            <label class="form-label required">Tipe</label>
                            <select type="text" class="form-select @error('tipe') is-invalid @enderror"  id="tipe" name="tipe">
                                <option value="">Pilih Tipe</option>
                                <option value="income">Pemasukan</option>
                                <option value="expense">Pengeluaran</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.Choices && (new Choices(el = document.getElementById('tipe'), {
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