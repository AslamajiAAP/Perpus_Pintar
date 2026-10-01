@extends('layouts.app')

@section('content')
    <a href="{{ route('books.index') }}" style="display: inline-block; margin-bottom: 15px;">← Kembali ke daftar</a>

    <h1>Form Tambah Buku</h1>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label for="judul">Judul Buku:</label><br>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}">
            @error('judul')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="penulis">Penulis:</label><br>
            <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}">
            @error('penulis')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <div>
            <label for="penerbit">Penerbit:</label><br>
            <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}">
            @error('penerbit')
                <div style="color: red; font-size: 12px;">{{ $message }}</div>
            @enderror
        </div>
        <br>

        <button type="submit">Simpan Buku</button>
    </form>
@endsection