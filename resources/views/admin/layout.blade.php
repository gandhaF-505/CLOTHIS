<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - CLOTHIS</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; background: #f7f7f7; color: #111; font-family: Arial, Helvetica, sans-serif; }
        a { color: inherit; text-decoration: none; }
        button, input, select, textarea { font: inherit; }
        .admin-wrap { min-height: 100vh; }
        .samping { position: fixed; inset: 0 auto 0 0; width: 230px; background: #111; color: #fff; padding: 22px 16px; overflow-y: auto; }
        .logo { display: block; padding: 0 12px 22px; font-size: 21px; font-weight: 800; letter-spacing: .5px; border-bottom: 1px solid #2b2b2b; }
        .logo span { color: #aaa; }
        .menu-title { margin: 24px 12px 8px; color: #888; font-size: 11px; font-weight: 700; letter-spacing: 1.2px; text-transform: uppercase; }
        .menu a { display: flex; align-items: center; gap: 10px; padding: 11px 12px; margin-bottom: 4px; border-radius: 7px; color: #bbb; font-size: 14px; }
        .menu a:hover { background: #202020; color: #fff; }
        .menu a.aktif { background: #fff; color: #111; font-weight: 700; }
        .menu-icon { width: 18px; text-align: center; font-size: 14px; }
        .logout { position: absolute; left: 16px; right: 16px; bottom: 18px; }
        .logout button { width: 100%; border: 1px solid #333; background: transparent; color: #bbb; padding: 10px 12px; border-radius: 7px; cursor: pointer; text-align: left; }
        .logout button:hover { background: #241414; color: #ffb0b0; border-color: #4a2929; }
        .utama { min-height: 100vh; margin-left: 230px; }
        .atas { height: 72px; display: flex; align-items: center; justify-content: space-between; padding: 0 34px; background: #fff; border-bottom: 1px solid #e5e5e5; }
        .atas h1 { margin: 0; font-size: 21px; }
        .atas p { margin: 5px 0 0; color: #888; font-size: 12px; }
        .admin-user { display: flex; align-items: center; gap: 10px; font-size: 13px; }
        .avatar { width: 34px; height: 34px; display: grid; place-items: center; border-radius: 50%; background: #111; color: #fff; font-size: 12px; font-weight: 700; }
        .konten { padding: 30px 34px 40px; }
        .baris { display: flex; align-items: center; justify-content: space-between; gap: 15px; flex-wrap: wrap; }
        .tombol { display: inline-flex; align-items: center; justify-content: center; gap: 7px; border: 1px solid #111; background: #111; color: #fff; padding: 10px 15px; border-radius: 6px; font-size: 13px; font-weight: 700; cursor: pointer; }
        .tombol:hover { background: #333; }
        .tombol-putih { background: #fff; color: #111; border-color: #ddd; }
        .tombol-putih:hover { background: #f2f2f2; }
        .tombol-merah { background: #fff; color: #c33; border-color: #e7c7c7; }
        .tombol-merah:hover { background: #fff5f5; }
        .deskripsi { margin: 6px 0 0; color: #777; font-size: 13px; }
        .kartu-grid { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 15px; margin-top: 24px; }
        .kartu { background: #fff; border: 1px solid #e2e2e2; border-radius: 8px; padding: 18px; }
        .kartu-label { color: #888; font-size: 12px; }
        .kartu-angka { margin-top: 9px; font-size: 27px; font-weight: 800; }
        .kartu-icon { float: right; width: 34px; height: 34px; display: grid; place-items: center; border: 1px solid #ddd; border-radius: 7px; color: #555; }
        .grid-utama { display: grid; grid-template-columns: minmax(0, 2fr) minmax(260px, 1fr); gap: 18px; margin-top: 18px; }
        .panel { background: #fff; border: 1px solid #e2e2e2; border-radius: 8px; padding: 20px; }
        .panel h2, .panel h3 { margin: 0; font-size: 15px; }
        .panel-head { display: flex; justify-content: space-between; align-items: center; gap: 12px; margin-bottom: 16px; }
        .link { color: #555; font-size: 12px; font-weight: 700; }
        .link:hover { color: #111; text-decoration: underline; }
        .tabel-box { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 650px; }
        th { padding: 12px 10px; background: #fafafa; border-bottom: 1px solid #ddd; color: #777; font-size: 11px; text-transform: uppercase; letter-spacing: .5px; text-align: left; }
        td { padding: 13px 10px; border-bottom: 1px solid #eee; font-size: 13px; vertical-align: middle; }
        tbody tr:hover { background: #fafafa; }
        .kanan { text-align: right; }
        .badge { display: inline-block; padding: 5px 8px; border-radius: 20px; font-size: 11px; font-weight: 700; }
        .badge-hitam { background: #111; color: #fff; }
        .badge-abu { background: #eee; color: #555; }
        .badge-kuning { background: #fff5cc; color: #8a6900; }
        .badge-hijau { background: #e7f6eb; color: #22743b; }
        .badge-merah { background: #fdeaea; color: #a52b2b; }
        .badge-biru { background: #e8f0ff; color: #285aa5; }
        .aksi { display: flex; gap: 8px; flex-wrap: wrap; }
        .aksi a, .aksi button { border: 0; background: none; padding: 0; color: #333; font-size: 12px; font-weight: 700; cursor: pointer; }
        .aksi a:hover, .aksi button:hover { text-decoration: underline; }
        .kosong { padding: 45px 20px; text-align: center; color: #888; }
        .kosong strong { display: block; margin-bottom: 5px; color: #333; font-size: 14px; }
        .form-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 17px; }
        .field-full { grid-column: 1 / -1; }
        .field label { display: block; margin-bottom: 7px; font-size: 12px; font-weight: 700; }
        .input { width: 100%; border: 1px solid #d9d9d9; background: #fff; padding: 10px 11px; border-radius: 6px; outline: none; font-size: 13px; }
        .input:focus { border-color: #777; box-shadow: 0 0 0 3px #eee; }
        .notifikasi { margin-bottom: 18px; padding: 11px 13px; border: 1px solid #cce8d3; background: #effaf2; color: #236b35; border-radius: 7px; font-size: 13px; }
        .filter { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 16px; }
        .filter .input { width: auto; min-width: 180px; }
        .aksi-cepat { display: grid; gap: 9px; margin-top: 14px; }
        .aksi-cepat a { display: block; padding: 11px 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 13px; font-weight: 700; }
        .aksi-cepat a:hover { background: #f5f5f5; }
        .timeline { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-top: 18px; }
        .timeline div { padding: 13px 8px; background: #f4f4f4; border-radius: 6px; text-align: center; font-size: 12px; color: #777; }
        .timeline .aktif { background: #111; color: #fff; font-weight: 700; }
        @media (max-width: 1000px) { .kartu-grid { grid-template-columns: repeat(2, 1fr); } .grid-utama { grid-template-columns: 1fr; } }
        @media (max-width: 760px) { .samping { position: static; width: 100%; padding: 15px; } .utama { margin-left: 0; } .logo { padding-bottom: 15px; } .menu-title { margin-top: 15px; } .logout { position: static; margin-top: 10px; } .atas { padding: 0 18px; } .konten { padding: 22px 18px 30px; } .form-grid { grid-template-columns: 1fr; } .field-full { grid-column: auto; } }
        @media (max-width: 520px) { .kartu-grid { grid-template-columns: 1fr; } .admin-user span { display: none; } .atas h1 { font-size: 18px; } }
    </style>
</head>
<body>
<div class="admin-wrap">
    <aside class="samping">
        <a href="{{ route('admin.dashboard') }}" class="logo">CLOTHIS<span>.</span></a>
        <div class="menu-title">Menu Admin</div>
        <nav class="menu">
            @php
                $links = [
                    ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '⌂'],
                    ['route' => 'admin.products.index', 'label' => 'Kelola Produk', 'icon' => '□'],
                    ['route' => 'admin.orders.index', 'label' => 'Kelola Pesanan', 'icon' => '▣'],
                    ['route' => 'admin.designs.index', 'label' => 'Approval Desain', 'icon' => '▧'],
                    ['route' => 'admin.payments.index', 'label' => 'Pembayaran', 'icon' => '▤'],
                    ['route' => 'admin.admins.index', 'label' => 'Kelola Admin', 'icon' => '♙'],
                ];
            @endphp
            @foreach($links as $link)
                <a href="{{ route($link['route']) }}" class="{{ request()->routeIs($link['route']) || request()->routeIs($link['route'].'*') ? 'aktif' : '' }}">
                    <span class="menu-icon">{{ $link['icon'] }}</span>{{ $link['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="logout">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit">↪ &nbsp;Logout</button>
            </form>
        </div>
    </aside>

    <main class="utama">
        <header class="atas">
            <div>
                <h1>@yield('heading', 'Dashboard')</h1>
                <p>Panel pengelolaan aplikasi CLOTHIS</p>
            </div>
            <div class="admin-user">
                <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                <div class="avatar">A</div>
            </div>
        </header>

        <section class="konten">
            @if(session('success'))
                <div class="notifikasi">{{ session('success') }}</div>
            @endif
            @yield('content')
        </section>
    </main>
</div>
</body>
</html>
