@extends('admin.layout')
@section('title','Dashboard')
@section('heading','Dashboard')
@section('content')
<div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
    <div><p class="text-sm text-slate-500">Ringkasan aktivitas toko hari ini.</p><h2 class="mt-1 text-2xl font-bold text-slate-900">Overview</h2></div>
    <span class="rounded-full bg-indigo-50 px-4 py-2 text-xs font-semibold text-indigo-700">26 September 2026</span>
</div>
<div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
@foreach($stats as $stat)
<div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm"><div class="flex items-center justify-between"><p class="text-sm text-slate-500">{{ $stat['label'] }}</p><span class="rounded-xl bg-indigo-50 px-3 py-2 text-indigo-600">{{ ['box'=>'□','shopping'=>'▣','image'=>'▧','card'=>'▤'][$stat['icon']] }}</span></div><p class="mt-4 text-3xl font-bold text-slate-900">{{ $stat['value'] }}</p><p class="mt-1 text-xs text-slate-400">Data contoh untuk tampilan</p></div>
@endforeach
</div>
<div class="mt-6 grid gap-6 xl:grid-cols-3">
<div class="xl:col-span-2 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm"><div class="flex items-center justify-between"><h3 class="font-bold">Pesanan terbaru</h3><a href="{{ route('admin.orders.index') }}" class="text-sm font-semibold text-indigo-600">Lihat semua</a></div><div class="mt-5 overflow-x-auto"><table class="w-full text-left text-sm"><thead class="border-b text-xs uppercase text-slate-400"><tr><th class="pb-3">Kode</th><th class="pb-3">Customer</th><th class="pb-3">Total</th><th class="pb-3">Status</th></tr></thead><tbody class="divide-y"><tr><td class="py-4 font-semibold">ORD-001</td><td class="py-4">Budi Santoso</td><td class="py-4">Rp600.000</td><td class="py-4"><span class="badge badge-yellow">Menunggu</span></td></tr><tr><td class="py-4 font-semibold">ORD-002</td><td class="py-4">Sinta</td><td class="py-4">Rp340.000</td><td class="py-4"><span class="badge badge-blue">Diproses</span></td></tr><tr><td class="py-4 font-semibold">ORD-003</td><td class="py-4">Raka</td><td class="py-4">Rp450.000</td><td class="py-4"><span class="badge badge-green">Selesai</span></td></tr></tbody></table></div></div>
<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm"><h3 class="font-bold">Aksi cepat</h3><div class="mt-4 grid gap-3"><a href="{{ route('admin.products.create') }}" class="rounded-xl bg-indigo-600 px-4 py-3 text-center text-sm font-semibold text-white hover:bg-indigo-700">+ Tambah Produk</a><a href="{{ route('admin.orders.index') }}" class="rounded-xl border border-slate-200 px-4 py-3 text-center text-sm font-semibold hover:bg-slate-50">Kelola Pesanan</a><a href="{{ route('admin.designs.index') }}" class="rounded-xl border border-slate-200 px-4 py-3 text-center text-sm font-semibold hover:bg-slate-50">Review Desain</a></div></div>
</div>
@endsection
