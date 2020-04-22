@extends('layouts.master')
<title>Data Keranjang | Dirtless</title>

@section('content')
	
	<div class="row mt-lg-4">
		<div class="ml-lg-4 col-lg-5 mr-5" >
			<h3 style="margin-left: 6px;">Keranjang Pesanan</h3>
		</div>
		<div class="col">
			<form action="/posttransaksi" method="POST">
				@csrf
				<select class="custom-select col-lg-12" name="id_member" id="" required>
					<option selected disabled >Pilih Member</option>
					@foreach($member as $b)
						<option value="{{$b->id}}">{{$b->nama_member}}</option>
					@endforeach
				</select>
		</div>

		<div class="col">
			<input type="date" name="batas_waktu" class="custom-select col-form-label">
		</div>
				
		<div class="col">
				<button type="submit" class="btn btn-primary bayang borradius text-center ml-2" >Checkout</button>
			</form>
		</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-light table-hover table-striped col-md-11 tablee-fix" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col" class="tabhead">No</th>
	          <th scope="col" class="tabhead" width="10%">Gambar</th>
	          <th scope="col" class="tabhead" width="10%">Nama</th>
	          <th scope="col" class="tabhead">Jenis</th>
	          <th scope="col" class="tabhead">Harga</th>
	          <th scope="col" class="tabhead" width="10%">Jumlah</th>
	          <th scope="col" class="tabhead" width="10%">Keterangan</th>
	          <th scope="col" class="tabhead">Total Harga</th>
	          <th scope="col" class="tabhead">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		   @foreach($keranjang as $k)
				<tr class="text-center">
					<td>{{$no++}}</td>
					<td>
						<div class="foto">
							<img src="{{$k->paket->img}}">
						</div>
											
					</td>
					<td>{{$k->paket->nama_paket}}</td>
					<td>{{$k->paket->jenis}}</td>
					<td>Rp{{$k->paket->harga}},00</td>
					<td>{{$k->qty}}</td>
					<td>
						@if($k->keterangan == null)
						-
						@else
						{{$k->keterangan}}
						@endif
					</td>
					<td>Rp{{$total = $k->paket->harga*$k->qty}},00</td>
					{{-- <td>{{$k->status}}</td> --}}
					<td>
						<a href="/keranjang/edit/{{$k->id}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
						<a onclick="return confirm('Yakin?')" href="/keranjang/hapus/{{$k->id}}" class="btn btn-sm btn-primary"><i class="fas fa-trash"></i> Hapus</a>
					</td>
				</tr>
			@endforeach
		  </tbody>
		</table>
			@if(Session::has('isi'))
			<h5 style="color: #FDE672;text-align: center;">{{Session::get('isi')}}</h5>
			@elseif(Session::has('kosong'))
			<h5 style="color: #FDE672;text-align: center;">{{Session::get('kosong')}}</h5>
			@endif

	</div>
@endsection