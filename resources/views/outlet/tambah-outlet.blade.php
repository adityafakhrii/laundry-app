@extends('layouts.master')
<title>Tambah Outlet | Dirtless</title>

@section('content')
	<div class="row mt-lg-5 ml-lg-4">
		<div class="col-lg-10 mr-auto">
			<h3>Tambah Outlet</h3>
		</div>
	</div>

	<form action="/postoutlet" method="POST">
		@csrf
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="nama">Nama</label>
				<input type="text" name="nama_outlet" id="nama" class="form-control" placeholder="Masukkan nama outlet" required>
			</div>
			<div class="form-group col-lg">
				<label for="alamat">Alamat</label>
				<input type="textarea" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" required>
			</div>
			<div class="form-group col-lg">
				<label for="tlp">No. Telfon</label>
				<input type="text" name="tlp" id="tlp" class="form-control" placeholder="Masukkan nomor telfon" required>
			</div>
		</div>
		
		<div class="col">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/outlet" class="btn btn-warning">Batal</a>

		</div>

	</form>


@endsection