@extends('layouts.app')

@section('content')
    <a href="{{ route('members.index') }}" style="display: inline-block; margin-bottom: 15px;">← Kembali ke daftar</a>

    <h1>Detail Anggota</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>NIM</th>
            <td>{{ $member->nim }}</td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $member->nama }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $member->email }}</td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td>{{ $member->nomor_telepon }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst($member->status) }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $member->alamat ?? '-' }}</td>
        </tr>
    </table>
@endsection