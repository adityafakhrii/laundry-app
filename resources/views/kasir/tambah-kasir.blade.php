@extends('layouts.master')
<title>Tambah Kasir | Dirtless</title>

@section('content')
	<div class="row mt-lg-5 ml-lg-4">
		<div class="col-lg-10 mr-auto">
			<h3>Tambah Kasir</h3>
		</div>
	</div>

	<form action="/postkasir" method="POST">
		@csrf
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama kasir" required>
			</div>
		</div>
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
			</div>
			<div class="form-group col-lg">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan passsword" required>
			</div>
		</div>

		<input type="hidden" value="kasir" name="role">
		
		<div class="col">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/kasir" class="btn btn-warning">Batal</a>
		</div>

	</form>


@endsection