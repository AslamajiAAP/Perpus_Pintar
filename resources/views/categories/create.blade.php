@extends('layouts.app')

@section('content')
    <a href="{{ route('categories.index') }}" style="display: inline-block; margin-bottom: 15px;">← Kembali ke daftar</a>

    <h1>Form Tambah Kategori</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama_kategori">Nama Kategori:</label><br>
            <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}">
            @error('nama_kategori')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="deskripsi">Deskripsi:</label><br>
            <textarea id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit">Simpan Kategori</button>
    </form>
@endsection