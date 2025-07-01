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
                    <h3>Laporan Bulanan</h3>
                    <p class="text-subtitle text-muted">
                        Daftar transaksi berdasarkan bulan:
                        <strong>{{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</strong>
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Laporan Bulanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">

                    {{-- Filter Bulan --}}
                    <form method="GET" action="{{ route('admin.laporan.bulanan') }}" class="row g-3 mb-3">
                        <div class="col-auto">
                            <input type="month" name="bulan" class="form-control"
                                value="{{ request('bulan', $bulan) }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i> Tampilkan
                            </button>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('laporan.bulanan.pdf', ['bulan' => request('bulan', $bulan)]) }}"
                                class="btn btn-danger">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Cetak PDF
                            </a>
                        </div>
                    </form>

                    {{-- Table --}}
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalHarga = 0; @endphp
                            @foreach ($transaksis as $index => $item)
                                @if ($item->status_pembayaran === 'Lunas')
                                    @php $totalHarga += $item->total_harga; @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->pelanggan->nama }}</td>
                                        <td>{{ $item->layanan->nama_layanan }}</td>
                                        <td>{{ $item->jumlah }} kg</td>
                                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $item->status == 'Selesai' ? 'bg-success' : 'bg-warning' }}">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Lunas</span>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Total Semua</td>
                                <td class="fw-bold">Rp {{ number_format($totalHarga, 0, ',', '.') }}</td>
                                <td colspan="2"></td>
                            </tr>
                        </tfoot>
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
            $('#table1').DataTable({
                "paging": true,
                "searching": true,
                "info": false
            });
        });
    </script>
@endsection
