<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - CLOTHIS</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; font-family: Arial, Helvetica, sans-serif; background: #f7f7f7; color: #111; }
        .login { min-height: 100vh; display: grid; grid-template-columns: 1fr 1fr; }
        .sisi-kiri { display: flex; align-items: center; padding: 70px; background: #111; color: #fff; }
        .sisi-kiri div { max-width: 480px; }
        .brand { margin-bottom: 20px; font-size: 13px; font-weight: 700; letter-spacing: 2px; color: #bbb; }
        h1 { margin: 0; font-size: 44px; line-height: 1.1; }
        .sisi-kiri p { margin-top: 20px; color: #aaa; line-height: 1.7; font-size: 14px; }
        .sisi-kanan { display: flex; align-items: center; justify-content: center; padding: 30px; }
        .kotak { width: 100%; max-width: 420px; padding: 34px; background: #fff; border: 1px solid #e2e2e2; border-radius: 9px; }
        .kotak h2 { margin: 0; font-size: 25px; }
        .kotak .sub { margin: 7px 0 25px; color: #888; font-size: 13px; }
        .error { margin-bottom: 16px; padding: 11px 12px; border: 1px solid #edcccc; border-radius: 6px; background: #fff5f5; color: #a52b2b; font-size: 13px; }
        .field { margin-bottom: 16px; }
        label { display: block; margin-bottom: 7px; font-size: 12px; font-weight: 700; }
        input { width: 100%; padding: 11px 12px; border: 1px solid #d9d9d9; border-radius: 6px; outline: none; font-size: 13px; }
        input:focus { border-color: #777; box-shadow: 0 0 0 3px #eee; }
        button { width: 100%; padding: 12px; border: 0; border-radius: 6px; background: #111; color: #fff; font-size: 13px; font-weight: 700; cursor: pointer; }
        button:hover { background: #333; }
        .footer { margin-top: 22px; text-align: center; color: #aaa; font-size: 11px; }
        @media (max-width: 800px) { .login { grid-template-columns: 1fr; } .sisi-kiri { display: none; } .sisi-kanan { padding: 20px; } .kotak { padding: 28px 22px; } }
    </style>
</head>
<body>
<div class="login">
    <div class="sisi-kiri">
        <div>
            <div class="brand">CLOTHIS ADMIN</div>
            <h1>Kelola pesanan.<br>Bangun produk.<br>Jaga kualitas.</h1>
            <p>Panel admin untuk mengelola produk, pesanan, desain, pembayaran, dan akun admin.</p>
        </div>
    </div>
    <div class="sisi-kanan">
        <div class="kotak">
            <h2>Selamat datang</h2>
            <p class="sub">Masuk untuk mengakses dashboard admin.</p>
            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif
            <form action="{{ route('admin.login.process') }}" method="POST">
                @csrf
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="admin@clothis.test" required>
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Masukkan password" required>
                </div>
                <button type="submit">Masuk ke Dashboard</button>
            </form>
            <div class="footer">CLOTHIS · Admin Panel</div>
        </div>
    </div>
</div>
</body>
</html>
