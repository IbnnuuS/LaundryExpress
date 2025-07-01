@extends('admin.master')
@section('content')
    <header class="mb-3">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Transaksi</h3>
                    <p class="text-subtitle text-muted">Ubah data transaksi yang sudah tercatat.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.transaksi') }}">Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Form Edit Transaksi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="pelanggan_id">Nama Pelanggan</label>
                            <select name="pelanggan_id" id="pelanggan_id" class="form-select" required>
                                @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->id }}"
                                        {{ $transaksi->pelanggan_id == $pelanggan->id ? 'selected' : '' }}>
                                        {{ $pelanggan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="layanan_id">Layanan</label>
                            <select name="layanan_id" id="layanan_id" class="form-select" required>
                                @foreach ($layanans as $layanan)
                                    <option value="{{ $layanan->id }}"
                                        {{ $transaksi->layanan_id == $layanan->id ? 'selected' : '' }}>
                                        {{ $layanan->nama_layanan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah (kg/item)</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control"
                                value="{{ $transaksi->jumlah }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="total_harga">Total Harga</label>
                            <input type="number" name="total_harga" id="total_harga" class="form-control"
                                value="{{ $transaksi->total_harga }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
                                value="{{ $transaksi->tanggal_masuk }}" required>
                        </div>

                        <option value="Belum Lunas" {{ $transaksi->status_pembayaran == 'Belum Lunas' ? 'selected' : '' }}>
                            Belum Lunas</option>
                        <option value="Lunas" {{ $transaksi->status_pembayaran == 'Lunas' ? 'selected' : '' }}>Lunas
                        </option>


                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="Proses" {{ $transaksi->status == 'Proses' ? 'selected' : '' }}>Proses
                                </option>
                                <option value="Selesai" {{ $transaksi->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Update
                        </button>
                        <a href="{{ route('admin.transaksi') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
