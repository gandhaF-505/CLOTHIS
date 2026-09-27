@extends('admin.layout')

@section('title', 'Tambah Admin')
@section('heading', 'Tambah Admin')

@section('content')

<div class="deskripsi">
    Tambahkan akun admin baru.
</div>

@if($errors->any())

    <div style="margin-top:20px; padding:12px 16px; background:#fdecec; color:#9b1c1c; border-radius:8px;">

        @foreach($errors->all() as $error)

            <div>
                {{ $error }}
            </div>

        @endforeach

    </div>

@endif

<div class="panel" style="margin-top:20px;">

    <form
        action="{{ route('admin.admins.action') }}"
        method="POST"
    >

        @csrf

        <input
            type="hidden"
            name="action"
            value="create"
        >

        <div class="form-grid">

            <div class="field">

                <label>
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="input"
                    required
                >

            </div>

            <div class="field">

                <label>
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="input"
                    required
                >

            </div>

            <div class="field">

                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="input"
                    required
                >

            </div>

        </div>

        <div style="margin-top:25px; display:flex; gap:10px;">

            <button
                type="submit"
                class="tombol"
            >
                Simpan Admin
            </button>

            <a
                href="/admin/admins"
                class="tombol tombol-putih"
            >
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection
