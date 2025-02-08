@extends('layouts/layBas')
@section('title', 'Admin Home')

@section('navbar')
<x-navbar-admin />
@endsection

@section('body')
Apakah anda yakin?
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn_primary">Log out</button>
</form>
@endsection
