@extends('layouts.superadmin')

@section('title', 'Kelola Pengajuan')

@section('content')
    @include('admin.pengajuan.index', ['pengajuan' => $pengajuan])
@endsection
