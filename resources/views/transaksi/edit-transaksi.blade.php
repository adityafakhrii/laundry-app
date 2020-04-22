@extends('layouts.master')
<title>Edit Transaksi | Dirtless</title>

@section('content')
	<div class="row mt-lg-5 ml-lg-0">
		<div class="col-lg-10 mr-auto">
			<h3>Edit Transaksi</h3>
		</div>
	</div>

	<form action="/updatetransaksi/{{$transaksi->id}}" method="POST">
		@csrf
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="kode_invoice">Kode Invoice</label>
				<input type="text" name="kode_invoice" id="kode_invoice" class="form-control" placeholder="Masukkan jumlah paket" value="{{$transaksi->kode_invoice}}" disabled>
			</div>
			<div class="form-group col-lg">
				<label for="nama_member">Nama Member</label>
				<input type="text" name="nama_member" id="nama_member" class="form-control" placeholder="Masukkan jumlah paket" value="{{$transaksi->member->nama_member}}" disabled>
			</div>
		</div>
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="batas_waktu">Batas Waktu</label>
				<input type="date" name="batas_waktu" id="batas_waktu" class="form-control" placeholder="Masukkan jumlah paket" value="{{$transaksi->batas_waktu}}">
			</div>
			<div class="form-group col-lg">
				<label for="updated_at">Tanggal Bayar</label>
				<input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$transaksi->updated_at}}">
			</div>
		</div>
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="biaya_tambahan">Biaya Tambahan</label>
				<input type="text" name="biaya_tambahan" id="biaya_tambahan" class="form-control" placeholder="(opsional)" value="{{$transaksi->biaya_tambahan}}">
			</div>
			<div class="form-group col-lg">
				<label for="diskon">Diskon</label>
				<input type="text" name="diskon" id="diskon" class="form-control" placeholder="Masukkan diskon" value="{{$transaksi->diskon}}">
			</div>
		</div>

		<div class="col">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/transaksi" class="btn btn-warning">Batal</a>

		</div>

	</form>


@endsection