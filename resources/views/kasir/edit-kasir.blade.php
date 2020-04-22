@extends('layouts.master')
<title>Edit Kasir | Dirtless</title>

@section('content')
	<div class="row mt-lg-5 ml-lg-0">
		<div class="col-lg-10 mr-auto">
			<h3>Edit Kasir</h3>
		</div>
	</div>

	<form action="/updatekasir/{{$kasir->id}}" method="POST">
		@csrf
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="nama">Nama</label>
				<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama kasir" value="{{$kasir->nama}}">
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
				<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" value="{{$kasir->username}}">
			</div>
		</div>

		<input type="hidden" value="kasir" name="role">
		
		<div class="col">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/kasir" class="btn btn-warning">Batal</a>
			
		</div>

	</form>


@endsection