@extends('layouts.master')
<title>Dashboard | Dirtless</title>

@section('content')
		<h2 class="text-center mt-lg-3">Selamat Datang {{auth()->user()->nama}}</h2>

@endsection