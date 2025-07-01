@extends('admin.master')
@section('content')
    <header class="mb-3">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Transaksi Belum Lunas</h3>
                    <p class="text-subtitle text-muted">Daftar transaksi yang belum dibayar lunas.</p>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Jumlah</th>
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
                                        <span class="badge {{ $item->status == 'Selesai' ? 'bg-success' : 'bg-warning' }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td><span class="badge bg-danger">Belum Lunas</span></td>
                                    <td>
                                        <form action="{{ route('transaksi.markLunas', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-sm btn-outline-primary"
                                                onclick="return confirm('Tandai transaksi ini sebagai LUNAS?')">Tandai
                                                Lunas</button>
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
