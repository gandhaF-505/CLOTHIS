

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - CLOTHIS</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f7f7f7;
            color: #111;
            font-family: Arial, sans-serif;
        }

        .admin {
            min-height: 100vh;
            display: flex;
        }

        .samping {
            width: 176px;
            background: #fafafa;
            border-right: 1px solid #ddd;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .logo {
            height: 68px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            border-bottom: 1px solid #ddd;
            font-size: 20px;
            font-weight: 700;
        }

        .menu {
            padding: 15px 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 11px;
            margin-bottom: 3px;
            color: #444;
            text-decoration: none;
            font-size: 12px;
        }

        .menu a:hover,
        .menu a.aktif {
            background: #080808;
            color: white;
        }

        .menu a span {
            width: 17px;
            text-align: center;
        }

        .bawah-menu {
            position: absolute;
            left: 10px;
            right: 10px;
            bottom: 15px;
        }

        .pesanan-baru {
            display: block;
            background: #080808;
            color: white;
            text-align: center;
            text-decoration: none;
            padding: 11px 5px;
            font-size: 11px;
            margin-bottom: 15px;
        }

        .utama {
            margin-left: 176px;
            width: calc(100% - 176px);
        }

        .atas {
            height: 51px;
            background: #fff;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 0 25px;
            gap: 20px;
        }

        .ikon {
            font-size: 16px;
        }

        .isi {
            padding: 25px 40px 50px;
            max-width: 1150px;
        }

        .sambutan h1 {
            font-size: 29px;
            margin: 0 0 8px;
            font-weight: 700;
        }

        .sambutan p {
            margin: 0;
            color: #555;
            font-size: 12px;
            line-height: 1.7;
            max-width: 650px;
        }

        .kotak {
            border: 1px solid #d7d7d7;
            background: #fff;
        }

        .statistik {
            margin-top: 20px;
        }

        .statistik .kotak {
            height: 114px;
            padding: 15px;
        }

        .statistik small {
            display: block;
            font-size: 8px;
            letter-spacing: 2px;
            color: #555;
            margin-bottom: 15px;
        }

        .statistik strong {
            display: block;
            font-size: 21px;
            margin-bottom: 7px;
        }

        .statistik p {
            margin: 0;
            font-size: 9px;
            color: #555;
        }

        .merah {
            color: #c40000 !important;
        }

        .tengah {
            margin-top: 20px;
        }

        .grafik {
            height: 245px;
            padding: 15px;
        }

        .judul-kotak {
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 13px;
        }

        .grafik-area {
            height: 190px;
            background: #f3f3f3;
            border: 1px solid #ddd;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: end;
            padding: 10px 15px;
            gap: 0;
        }

        .batang {
            width: 58px;
            background: #c8c8c8;
            margin-right: 0;
        }

        .satu {
            height: 45px;
        }

        .dua {
            height: 70px;
        }

        .tiga {
            height: 105px;
        }

        .empat {
            height: 135px;
        }

        .lima {
            height: 160px;
        }

        .hitam {
            height: 130px;
            background: #080808;
        }

        .oranye {
            height: 160px;
            background: #ad3d00;
        }

        .cepat {
            padding: 15px;
            min-height: 245px;
        }

        .tombol {
            display: block;
            width: 100%;
            border: 1px solid #111;
            background: white;
            color: #111;
            text-decoration: none;
            text-align: center;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 11px;
        }

        .tombol:hover {
            background: #111;
            color: white;
        }

        .tombol-hitam {
            background: #080808;
            color: white;
        }

        .sistem {
            background: #f3f3f3;
            border: 1px solid #d5d5d5;
            padding: 12px;
            margin-top: 14px;
            font-size: 9px;
        }

        .sistem strong {
            display: block;
            font-size: 8px;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .bulat {
            color: #00a76f;
            margin-right: 5px;
        }

        .aktivitas {
            margin-top: 40px;
            padding: 15px;
        }

        .aktivitas-atas {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 12px;
            margin-bottom: 10px;
        }

        .aktivitas-atas strong {
            font-size: 11px;
        }

        .semua {
            color: #111;
            font-size: 9px;
            text-decoration: underline;
        }

        .pesanan {
            background: #f3f3f3;
            border: 1px solid #ddd;
            min-height: 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 7px 10px;
            margin-bottom: 7px;
        }

        .pesanan-kiri {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nomor {
            width: 25px;
            height: 25px;
            background: #111;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
        }

        .pesanan-info strong {
            display: block;
            font-size: 10px;
        }

        .pesanan-info span {
            font-size: 8px;
            color: #666;
        }

        .pesanan-kanan {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .status {
            text-align: right;
            font-size: 8px;
        }

        .status small {
            display: block;
            letter-spacing: 1px;
            margin-bottom: 3px;
        }

        .badge {
            font-size: 7px;
            padding: 4px 7px;
            border-radius: 0;
            font-weight: 500;
        }

        .kuning {
            background: #f4c84c;
            color: #111;
        }

        .hijau {
            background: #00b878;
            color: white;
        }

        .abu {
            background: #d2d2d2;
            color: #333;
        }

        @media (max-width: 900px) {
            .samping {
                width: 70px;
            }

            .logo {
                justify-content: center;
                padding: 0;
                font-size: 0;
            }

            .logo:after {
                content: "C";
                font-size: 20px;
            }

            .menu a {
                justify-content: center;
                padding: 12px 5px;
            }

            .menu a span {
                font-size: 16px;
            }

            .menu a {
                font-size: 0;
            }

            .pesanan-baru {
                font-size: 0;
            }

            .pesanan-baru:before {
                content: "+";
                font-size: 18px;
            }

            .utama {
                margin-left: 70px;
                width: calc(100% - 70px);
            }

            .isi {
                padding: 25px 20px;
            }
        }

        @media (max-width: 700px) {
            .statistik .col-md-3 {
                margin-bottom: 10px;
            }

            .grafik {
                margin-bottom: 15px;
            }

            .pesanan-kanan {
                gap: 5px;
            }
        }
    </style>
</head>

<body>

<div class="admin">

    <aside class="samping">

        <div class="logo">
            Clотhis
        </div>

        <div class="menu">

            <a href="{{ route('admin.dashboard') }}" class="aktif">
                <span>▦</span>
                Dashboard
            </a>

            <a href="#">
                <span>▤</span>
                Pesanan
            </a>

            <a href="{{ route('products.index') }}">
                <span>♧</span>
                Produk
            </a>

            <a href="#">
                <span>♙</span>
                Stok
            </a>

            <a href="#">
                <span>▣</span>
                Pembayaran
            </a>

            <a href="#">
                <span>✎</span>
                Desain
            </a>

            <a href="#">
                <span>▥</span>
                Laporan
            </a>

        </div>

        <div class="bawah-menu">

            <a href="#" class="pesanan-baru">
                + &nbsp; Pesanan Cetak Baru
            </a>

            <div class="menu">
                <a href="#">
                    <span>⚙</span>
                    Pengaturan
                </a>

                <a href="#">
                    <span>?</span>
                    Bantuan
                </a>
            </div>

        </div>

    </aside>

    <main class="utama">

        <header class="atas">
            <span class="ikon">♧</span>
            <span class="ikon">◉</span>
        </header>

        <div class="isi">

            <div class="sambutan">
                <h1>Selamat datang kembali, Admin User</h1>

                <p>
                    Berikut adalah status operasional bengkel cetak saat ini.
                    Pendapatan stabil, tapi pantau persediaan tinta dengan cermat.
                </p>
            </div>

            <div class="row g-3 statistik">

                <div class="col-md-3">
                    <div class="kotak">
                        <small>TOTAL<br>PENDAPATAN</small>

                        <strong>
                            Rp {{ number_format($totalPendapatan / 1000000, 1, '.', '') }}M
                        </strong>

                        <p>↗ Pendapatan pesanan disetujui</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="kotak">
                        <small>PESANAN AKTIF</small>

                        <strong>{{ $pesananAktif }}</strong>

                        <p>Menunggu konfirmasi</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="kotak">
                        <small class="merah">PERINGATAN STOK<br>RENDAH</small>

                        <strong>{{ $stokRendah }}</strong>

                        <p class="merah">Produk dengan stok ≤ 5</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="kotak">
                        <small>DESAIN MENUNGGU<br>PERSETUJUAN</small>

                        <strong>{{ $desainMenunggu }}</strong>

                        <p>Menunggu konfirmasi</p>
                    </div>
                </div>

            </div>

            <div class="row g-3 tengah">

                <div class="col-lg-8">

                    <div class="kotak grafik">

                        <div class="judul-kotak">
                            Tren Pendapatan
                        </div>

                        <div class="grafik-area">
                            <div class="batang satu"></div>
                            <div class="batang dua"></div>
                            <div class="batang tiga"></div>
                            <div class="batang empat"></div>
                            <div class="batang hitam"></div>
                            <div class="batang lima"></div>
                            <div class="batang oranye"></div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="kotak cepat">

                        <div class="judul-kotak">
                            Aksi Cepat
                        </div>

                        <a href="{{ route('orders.index') }}" class="tombol tombol-hitam">
                            ⊕ &nbsp; Pesanan Baru
                        </a>

                        <a href="{{ route('products.create') }}" class="tombol">
                            ♧ &nbsp; Tambah Produk
                        </a>

                        <a href="#" class="tombol">
                            ▣ &nbsp; Buat Laporan
                        </a>

                        <div class="sistem">
                            <strong>STATUS SISTEM</strong>
                            <span class="bulat">●</span>
                            Semua mesin beroperasi normal
                        </div>

                    </div>

                </div>

            </div>

            <div class="kotak aktivitas">

                <div class="aktivitas-atas">
                    <strong>Aktivitas Produksi Terbaru</strong>

                    <a href="{{ route('orders.index') }}" class="semua">
                        LIHAT SEMUA
                    </a>
                </div>

                @forelse ($orders as $order)

                    <div class="pesanan">

                        <div class="pesanan-kiri">

                            <div class="nomor">
                                #{{ $order->id }}
                            </div>

                            <div class="pesanan-info">

                                <strong>
                                    {{ $order->product->name }}
                                </strong>

                                <span>
                                    {{ $order->quantity }} unit
                                    · {{ $order->model }}
                                    · {{ $order->color }}
                                </span>

                            </div>

                        </div>

                        <div class="pesanan-kanan">

                            <div class="status">

                                <small>STATUS</small>

                                @if ($order->status == 'Menunggu Konfirmasi')

                                    <span class="badge kuning">
                                        MENUNGGU
                                    </span>

                                @elseif ($order->status == 'Disetujui')

                                    <span class="badge hijau">
                                        DISETUJUI
                                    </span>

                                @else

                                    <span class="badge abu">
                                        {{ strtoupper($order->status) }}
                                    </span>

                                @endif

                            </div>

                            <span>›</span>

                        </div>

                    </div>

                @empty

                    <div class="pesanan">
                        <span>Belum ada aktivitas pesanan.</span>
                    </div>

                @endforelse

            </div>

        </div>

    </main>

</div>

</body>
</html>

