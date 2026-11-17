@extends('layouts.Admin')

@section('title', 'Tambah Data Barang')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">TAMBAH DATA BARANG INVENTARIS</h1>
        <p class="mb-4">Silahkan isi formulir di bawah ini untuk menambah data barang.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Barang</h6>
                <a href="{{ route('barang.index') }}">
                    <i class="fas fa-arrow-left fa-sm text-white-50"></i>
                    Kembali
                </a>
            </div>

            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang <span class="text-danger">*</span></label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror"
                                    value="{{ old('kode_barang') }}" placeholder="Contoh: INV_001" required>
                            </div>

                            <div class="form-group">
                                <label for="nama_barang">Nama Barang <span class="text-danger">*</span></label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value="{{ old('nama_barang') }}" placeholder="Contoh: Meja" required>
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori Barang <span class="text-danger">*</span></label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="">-- Pilih kategori --</option>
                                    <option value="Elektronik" {{ old('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik</option>
                                    <option value="Komputer & Jaringan" {{ old('kategori') == 'Komputer & Jaringan' ? 'selected' : '' }}>Komputer & Jaringan</option>
                                    <option value="Furnitur" {{ old('kategori') == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                                    <option value="ATK" {{ old('kategori') == 'ATK' ? 'selected' : '' }}>ATK</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kondisi">Kondisi Barang <span class="text-danger">*</span></label>
                                <select name="kondisi" id="kondisi" class="form-control" required>
                                    <option value="">-- Pilih kondisi --</option>
                                    <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="rusak ringan" {{ old('kondisi') == 'rusak ringan' ? 'selected' : '' }}>Rusak ringan</option>
                                    <option value="rusak berat" {{ old('kondisi') == 'rusak berat' ? 'selected' : '' }}>Rusak berat</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label for="jumlah">Jumlah Barang <span class="text-danger">*</span></label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror"
                                        value="{{ old('jumlah') }}" min="0" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="lokasi">Lokasi Barang <span class="text-danger">*</span></label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
                                        value="{{ old('lokasi') }}" placeholder="Contoh: Lab Komputer" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="tanggal_masuk">Tanggal Masuk <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                                        value="{{ old('tanggal_masuk', date('Y-m-d')) }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i>
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endpush

