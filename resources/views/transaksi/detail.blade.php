@extends('layouts.master')
<title>Detail Transaksi | Dirtless</title>

@section('content')
	
	<div class="row mt-lg-2">
		<div class="ml-lg-5 mr-4">
			<h3>Detail Transaksi</h3>
		</div>
		<div class="col">
			
		</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-light table-hover col-md-11 tablee table-fix" style="width: 1200px">
		  <thead>
		    <tr class="text-center">
		      <th scope="col" class="tabhead">No</th>
		      <th scope="col" class="tabhead">Kode Invoice</th>
		      <th scope="col" class="tabhead">Member</th>
		      <th scope="col" class="tabhead">Nama Paket</th>
		      <th scope="col" class="tabhead">Harga</th>
		      <th scope="col" class="tabhead">Jumlah</th>
		      <th scope="col" class="tabhead">Ket.</th>
		      <th scope="col" class="tabhead" width="20%">Total Harga</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    @foreach($transaksis as $transaksi)
				<tr class="text-center">			
					<td>{{$no++}}</td>
					<td>{{$transaksi->transaksi->kode_invoice}}</td>
					<td>{{$transaksi->transaksi->member->nama_member}}</td>
					<td>{{$transaksi->paket->nama_paket}}</td>
					<td>Rp{{$transaksi->paket->harga}}</td>
					<td>{{$transaksi->qty}}</td>
					@if($transaksi->keterangan == null)
					<td>-</td>
					@else
					<td>{{$transaksi->keterangan}}</td>
					@endif
					<td>
						Rp{{($transaksi->paket->harga*$transaksi->qty)}},00
					</td>
				</tr>
			@endforeach
				<tr>
					<td colspan="7"><b>Biaya Tambahan</b></td>
					@if($trans->biaya_tambahan == null)
					<td class="text-center">-</td>
					@else
					<td class="text-center">Rp{{$trans->biaya_tambahan}},00</td>
					@endif
				</tr>
				<tr>
					<td colspan="7"><b>Pajak</b></td>
					@if($trans->pajak == null)
					<td class="text-center">-</td>
					@else
					<td class="text-center">Rp{{$trans->pajak}},00</td>
					@endif
				</tr>
				<tr>
					<td colspan="7"><b>Diskon</b></td>
					@if($trans->diskon == null)
					<td class="text-center">-</td>
					@else
					<td class="text-center">Rp{{$trans->diskon}},00</td>
					@endif
				</tr>
				<tr class="table-active">
					<td colspan="7"><b>Total Pembayaran</b></td>
					<td class="text-center">
						<?php 
							$harga = 0;
							foreach ($transaksis as $transaksi) {
								$harga = $harga + ($transaksi->paket->harga*$transaksi->qty);
							}
						?>
						<span style="font-weight: bold;">Rp{{$harga + ($trans->biaya_tambahan + $trans->pajak - $trans->diskon)}},00</span>
					</td>
				</tr>
				<tr>
					<td colspan="7"></td>
					<td>
						<div class="row" style="margin:  auto;">

							@if($trans->dibayar == 'belum_dibayar')
								@if(auth()->user()->role != 'owner')
				    		<form action="/transaksi/dibayar/{{$trans->id}}" method="POST">
	                        {{csrf_field()}}   
	                          <button type="submit" class="btn btn-sm btn-primary ml-3" onclick="return confirm('Anda Yakin ?')">
	                                      	<i class="fas fa-money-bill-wave-alt"></i> Bayar
	                          </button>
	                		</form>
	                			@else
	                			<a href="/data-transaksi" class="btn btn-sm btn-primary ml-2"><i class="fas fa-chevron-left"></i> Kembali</a>
	                			@endif
	                		<a href="/transaksi" class="btn btn-sm btn-primary ml-2"><i class="fas fa-chevron-left"></i> Kembali</a>	
			           		@endif

							@if($trans->dibayar == 'dibayar')
	                		<a href="/transaksi" class="btn btn-sm btn-primary" style="margin-left: 57px;"><i class="fas fa-chevron-left"></i> Kembali</a>	
			           		@endif

						</div>
					</td>
				</tr>
		  </tbody>
		</table>
		<div class="col">
			
            
		</div>
	</div>
	
@endsection