@extends('layouts.master')
<title>Tambah Owner | Dirtless</title>

@section('content')
	<div class="row mt-lg-5 ml-lg-4">
		<div class="col-lg-10 mr-auto">
			<h3>Tambah Owner</h3>
		</div>
	</div>

	<form action="/postowner" method="POST">
		@csrf
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama owner" required>
			</div>
			<div class="form-group col-lg">
				<label for="outlet">Outlet</label>
				<select name="id_outlet" id="outlet" class="form-control">
						<option disabled selected>Pilih Outlet</option>
					@foreach($outlet as $o)
						<option value="{{$o->id}}">{{$o->nama_outlet}}</option>
					@endforeach
				</select>	
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

		<input type="hidden" value="owner" name="role">
		
		<div class="col">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/owner" class="btn btn-warning">Batal</a>
		</div>

	</form>


@endsection