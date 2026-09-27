<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') · CLOTHIS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">
<div class="min-h-screen lg:flex">
    <aside class="w-full shrink-0 bg-slate-950 text-white lg:fixed lg:inset-y-0 lg:left-0 lg:w-64">
        <div class="flex h-16 items-center justify-between border-b border-white/10 px-6">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold tracking-wide">CLOTHIS<span class="text-indigo-400">.</span></a>
            <span class="rounded-full bg-indigo-500/15 px-2.5 py-1 text-xs font-medium text-indigo-300">ADMIN</span>
        </div>
        <nav class="space-y-1 p-4">
            @php $links = [
                ['route'=>'admin.dashboard','label'=>'Dashboard','icon'=>'dashboard'],
                ['route'=>'admin.products.index','label'=>'Kelola Produk','icon'=>'box'],
                ['route'=>'admin.orders.index','label'=>'Kelola Pesanan','icon'=>'shopping'],
                ['route'=>'admin.designs.index','label'=>'Approval Desain','icon'=>'image'],
                ['route'=>'admin.payments.index','label'=>'Pembayaran','icon'=>'card'],
                ['route'=>'admin.admins.index','label'=>'Kelola Admin','icon'=>'users'],
            ]; @endphp
            @foreach($links as $link)
                <a href="{{ route($link['route']) }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition {{ request()->routeIs($link['route'].'*') || request()->routeIs($link['route']) ? 'bg-white text-slate-900 shadow-sm' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                    <span class="text-lg">{{ ['dashboard'=>'⌂','box'=>'□','shopping'=>'▣','image'=>'▧','card'=>'▤','users'=>'♙'][$link['icon']] }}</span>
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="absolute bottom-0 hidden w-full border-t border-white/10 p-4 lg:block">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-slate-300 hover:bg-red-500/10 hover:text-red-300">↪ <span>Logout</span></button>
            </form>
        </div>
    </aside>

    <main class="min-w-0 flex-1 lg:ml-64">
        <header class="sticky top-0 z-10 flex h-16 items-center justify-between border-b border-slate-200 bg-white/90 px-5 backdrop-blur sm:px-8">
            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">CLOTHIS Admin</p>
                <h1 class="font-semibold text-slate-900">@yield('heading', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-3">
                <div class="hidden text-right sm:block">
                    <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-slate-500">Administrator</p>
                </div>
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 font-bold text-indigo-700">A</div>
            </div>
        </header>

        @if(session('success'))
            <div class="mx-5 mt-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 sm:mx-8">{{ session('success') }}</div>
        @endif

        <div class="p-5 sm:p-8">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
