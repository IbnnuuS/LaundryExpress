<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Express</title>
    <link rel="shortcut icon" href="{{ asset('template/assets') }}/compiled/svg/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('template/assets') }}/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('template/assets') }}/compiled/css/app-dark.css">
    <link rel="stylesheet" href="{{ asset('template/assets') }}/compiled/css/iconly.css">
</head>

<body>
    <script src="{{ asset('template/assets') }}/static/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{ url('admin/dashboard') }}"><img
                                    src="{{ asset('template/assets') }}/compiled/svg/logo_baru.png" alt="Logo"
                                    style="width: 150px; height: auto;">
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        {{-- Dashboard --}}
                        <li class="sidebar-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            <a href="{{ url('/admin/dashboard') }}" class='sidebar-link'>
                                <i class="bi bi-speedometer2"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        {{-- Master Data --}}
                        <li
                            class="sidebar-item has-sub {{ request()->is('admin/pelanggan*') || request()->is('admin/layanan*') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-database-fill"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item {{ request()->is('admin/pelanggan*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/pelanggan') }}" class="submenu-link">
                                        <i class="bi bi-people-fill me-2"></i> Pelanggan
                                    </a>
                                </li>
                                <li class="submenu-item {{ request()->is('admin/layanan*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/layanan') }}" class="submenu-link">
                                        <i class="bi bi-bucket-fill me-2"></i> Layanan
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Transaksi --}}
                        <li
                            class="sidebar-item has-sub {{ request()->is('admin/transaksi*') || request()->is('admin/order-masuk*') || request()->is('admin/riwayat-order*') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-cart-check-fill"></i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item {{ request()->is('admin/transaksi*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/transaksi') }}" class="submenu-link">
                                        <i class="bi bi-cash-coin me-2"></i> Transaksi
                                    </a>
                                </li>
                                <li class="submenu-item {{ request()->is('admin/order-masuk*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/order-masuk') }}" class="submenu-link">
                                        <i class="bi bi-arrow-down-left-square-fill me-2"></i> Order Masuk
                                    </a>
                                </li>
                                <li class="submenu-item {{ request()->is('admin/riwayat-order*') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/riwayat-order') }}" class="submenu-link">
                                        <i class="bi bi-clock-history me-2"></i> Riwayat Order
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Pembayaran --}}
                        <li
                            class="sidebar-item has-sub {{ request()->routeIs('admin.belum-lunas') || request()->routeIs('admin.lunas') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-wallet2"></i>
                                <span>Pembayaran</span>
                            </a>
                            <ul class="submenu">
                                <li
                                    class="submenu-item {{ request()->routeIs('admin.belum-lunas') ? 'active' : '' }}">
                                    <a href="{{ route('admin.belum-lunas') }}" class="submenu-link">
                                        <i class="bi bi-exclamation-circle-fill me-2"></i> Belum Lunas
                                    </a>
                                </li>
                                <li class="submenu-item {{ request()->routeIs('admin.lunas') ? 'active' : '' }}">
                                    <a href="{{ route('admin.lunas') }}" class="submenu-link">
                                        <i class="bi bi-check-circle-fill me-2"></i> Lunas
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Laporan --}}
                        <li
                            class="sidebar-item has-sub {{ request()->is('admin/laporan/harian') || request()->is('admin/laporan/bulanan') ? 'active' : '' }}">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-clipboard-data-fill"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item {{ request()->is('admin/laporan/harian') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/laporan/harian') }}" class="submenu-link">
                                        <i class="bi bi-calendar-day-fill me-2"></i> Harian
                                    </a>
                                </li>
                                <li class="submenu-item {{ request()->is('admin/laporan/bulanan') ? 'active' : '' }}">
                                    <a href="{{ url('/admin/laporan/bulanan') }}" class="submenu-link">
                                        <i class="bi bi-calendar-range-fill me-2"></i> Bulanan
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Setting</li>

                        {{-- Logout --}}
                        <li class="sidebar-item">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="sidebar-link btn btn-link text-start p-0"
                                    style="text-decoration: none;">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('template/assets') }}/static/js/components/dark.js"></script>
    <script src="{{ asset('template/assets') }}/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('template/assets') }}/compiled/js/app.js"></script>
    <!-- Need: Apexcharts -->
    <script src="{{ asset('template/assets') }}/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('template/assets') }}/static/js/pages/dashboard.js"></script>
</body>

</html>
