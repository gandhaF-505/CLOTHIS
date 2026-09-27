@extends('admin.layout')

@section('title', 'Edit Admin')
@section('heading', 'Edit Admin')

@section('content')

<div class="deskripsi">
    Ubah data admin.
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
            value="edit"
        >

        <input
            type="hidden"
            name="admin_id"
            value="{{ $admin->id }}"
        >

        <div class="form-grid">

            <div class="field">

                <label>
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $admin->name) }}"
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
                    value="{{ old('email', $admin->email) }}"
                    class="input"
                    required
                >

            </div>

            <div class="field">

                <label>
                    Password Baru
                </label>

                <input
                    type="password"
                    name="password"
                    class="input"
                >

                <small style="display:block; margin-top:6px; color:#777;">
                    Kosongkan jika password tidak ingin diubah.
                </small>

            </div>

        </div>

        <div style="margin-top:25px; display:flex; gap:10px;">

            <button
                type="submit"
                class="tombol"
            >
                Simpan Perubahan
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
