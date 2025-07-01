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
                    <h3>Transaksi</h3>
                    <p class="text-subtitle text-muted">Daftar transaksi laundry yang telah dilakukan.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm mb-3">
                        <i class="bi bi-plus-circle"></i> Tambah Transaksi
                    </a>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Jumlah (kg/item)</th>
                                <th>Total Harga</th>
                                <th>Tanggal Masuk</th>
                                <th>Status</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksis as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->pelanggan->nama }}</td>
                                    <td>{{ $item->layanan->nama_layanan }}</td>
                                    <td>{{ $item->jumlah }} kg</td>
                                    <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}</td>
                                    <td>
                                        <span
                                            class="badge
                                            {{ $item->status == 'Selesai' ? 'bg-success' : ($item->status == 'Proses' ? 'bg-warning' : 'bg-secondary') }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($item->status_pembayaran == 'Lunas')
                                            <span class="badge bg-success">Lunas</span>
                                        @else
                                            <form action="{{ route('transaksi.markLunas', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-sm btn-outline-primary"
                                                    onclick="return confirm('Tandai transaksi ini sebagai LUNAS?')">Tandai
                                                    Lunas</button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('transaksi.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus transaksi ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
    </script>
@endsection
