<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin · CLOTHIS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950">
<div class="grid min-h-screen lg:grid-cols-2">
    <div class="hidden items-center justify-center bg-linear-to-br from-indigo-700 via-indigo-800 to-slate-950 p-12 lg:flex">
        <div class="max-w-md text-white">
            <p class="mb-4 text-sm font-semibold uppercase tracking-[0.3em] text-indigo-200">CLOTHIS</p>
            <h1 class="text-5xl font-bold leading-tight">Kelola pesanan.<br>Bangun produk.<br>Jaga kualitas.</h1>
            <p class="mt-6 text-indigo-100">Panel admin untuk mengelola produk, pesanan, desain, pembayaran, dan akun admin.</p>
        </div>
    </div>
    <div class="flex items-center justify-center bg-slate-50 p-6">
        <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-xl shadow-slate-200/60 sm:p-10">
            <div class="mb-8">
                <p class="text-sm font-bold tracking-wide text-indigo-600">CLOTHIS ADMIN</p>
                <h2 class="mt-2 text-3xl font-bold text-slate-900">Selamat datang 👋</h2>
                <p class="mt-2 text-sm text-slate-500">Masuk untuk mengakses dashboard admin.</p>
            </div>
            @if($errors->any())
                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">{{ $errors->first() }}</div>
            @endif
            <form action="{{ route('admin.login.process') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="admin@clothis.test" required class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10">
                </div>
                <div>
                    <label class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10">
                </div>
                <button type="submit" class="w-full rounded-xl bg-indigo-600 px-4 py-3.5 font-semibold text-white shadow-lg shadow-indigo-600/20 transition hover:bg-indigo-700">Masuk ke Dashboard</button>
            </form>
            <p class="mt-6 text-center text-xs text-slate-400">CLOTHIS · Admin Panel</p>
        </div>
    </div>
</div>
</body>
</html>
