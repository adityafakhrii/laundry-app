@extends('layouts.master')
<title>Data Transaksi | Dirtless</title>

@section('content')
	
	<div class="row mt-lg-4">
		<div class="ml-lg-5">
			<h3>Data Transaksi</h3>
		</div>
		@if(auth()->user()->role == 'owner')
		<div class="col">
			<a target="_blank" href="/data-transaksi/exportpdf" class="btn bayang borradius btn-sm btn-primary">Generate Laporan</a>
		</div>
		@endif

		@if(auth()->user()->role == 'admin')
		<div class="col">
			<a target="_blank" href="/transaksi/exportpdf" class="btn bayang borradius btn-sm btn-primary">Generate Laporan</a>
		</div>
		@endif

		@if(auth()->user()->role == 'kasir')
		<div class="col">
			<a target="_blank" href="/transaksi/exportpdf" class="btn bayang borradius btn-sm btn-primary">Generate Laporan</a>
		</div>
		@endif

		<div class="col">
                                    <form action ="/transaksi" method="GET" class="float-left ml-4">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control align-content-center col-sm-12 ml-5" placeholder="Cari invoice...">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary">Go</button>
                                        </span>
                                      </div>
                                    </form>
    	</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-light table-hover table-striped col-md-11 tablee">
		  <thead>
		    <tr class="text-center">
		      <th scope="col" class="tabhead">No</th>
		      <th scope="col" class="tabhead" width="13%">Kode Invoice</th>
		      <th scope="col" class="tabhead">Member</th>
		      <th scope="col" class="tabhead">Tanggal</th>
		      <th scope="col" class="tabhead">Batas Waktu</th>
		      <th scope="col" class="tabhead">Tanggal Bayar</th>
		      <th scope="col" class="tabhead">Biaya Tambahan</th>
		      <th scope="col" class="tabhead">Diskon</th>
		      <th scope="col" class="tabhead">Pajak</th>
		      <th scope="col" class="tabhead">Status</th>
		      @if(auth()->user()->role != 'owner')
		      <th scope="col" class="tabhead">Konfirmasi Status</th>
		      @endif
		      {{-- <th scope="col">Kasir</th> --}}
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    @foreach($transaksi as $k)
				<tr class="text-center">
					<td>{{$no++}}</td>
					<td>
						<div class="invoice">
							<div class="kode">{{$k->kode_invoice}}</div>
							<a href="/transaksi/detail/{{$k->id}}" class="lihat">Lihat Detail</a>
						</div>
						
					</td>
					<td>{{$k->member->nama_member}}</td>
					<td>{{$k->tgl}}</td>
					<td>{{$k->batas_waktu}}</td>
					<td>
					@if(auth()->user()->role != 'owner')
					
						@if($k->tgl_bayar == null)
                        <a href="/transaksi/detail/{{$k->id}}" class="btn btn-sm btn-primary">Bayar</a>
                        @else
                        {{$k->tgl_bayar}}
                        @endif
                    @elseif(auth()->user()->role == 'owner')
                    	@if($k->tgl_bayar == null)
							<div class="text-center">-</div>
                        @else
                        {{$k->tgl_bayar}}
                        @endif

					
					@endif

					</td>
					<td>
					@if(auth()->user()->role != 'owner')

						@if($k->dibayar == 'belum_dibayar' and $k->biaya_tambahan == null)
						<form style="display: inline-block;" action="/biaya_tambahan/{{$k->id}}" method="POST">
                            {{csrf_field()}}
                            <input type="number" class="form-control text-center" value="0" name="biaya_tambahan">
                        </form>
                        @elseif($k->dibayar == 'dibayar' and $k->biaya_tambahan == null)
						-
                        @elseif($k->dibayar == 'dibayar' and $k->biaya_tambahan == !null)
						Rp{{$k->biaya_tambahan}},00
						@elseif($k->dibayar == 'belum_dibayar' and $k->biaya_tambahan == !null)
						Rp{{$k->biaya_tambahan}},00
						@endif

                    @elseif(auth()->user()->role == 'owner')
						@if($k->tgl_bayar == null)
							<div class="text-center">-</div>
                        @else
                        {{$k->tgl_bayar}}
                        @endif
                    @endif
					</td>
					<td>
					@if(auth()->user()->role != 'owner')

						@if($k->dibayar == 'belum_dibayar' and $k->diskon == null)
						<form style="display: inline-block;" action="/diskon/{{$k->id}}" method="POST">
                            {{csrf_field()}}
                            <input type="number" class="form-control text-center" value="0" name="diskon">
                        </form>
                        @elseif($k->dibayar == 'dibayar' and $k->diskon == null)
						-
                        @elseif($k->dibayar == 'dibayar' and $k->diskon == !null)
						Rp{{$k->diskon}},00
						@elseif($k->dibayar == 'belum_dibayar' and $k->diskon == !null)
						Rp{{$k->diskon}},00
						@endif

					@elseif(auth()->user()->role == 'owner')
						@if($k->tgl_bayar == null)
							<div class="text-center">-</div>
                        @else
                        {{$k->tgl_bayar}}
                        @endif
                    @endif
					</td>
					<td>
					@if(auth()->user()->role != 'owner')

						@if($k->dibayar == 'belum_dibayar' and $k->pajak == null)
						<form style="display: inline-block;" action="/pajak/{{$k->id}}" method="POST">
                            {{csrf_field()}}
                            <input type="number" class="form-control text-center" value="0" name="pajak">
                        </form>
                        @elseif($k->dibayar == 'dibayar' and $k->pajak == null)
						-
                        @elseif($k->dibayar == 'dibayar' and $k->pajak == !null)
						Rp{{$k->pajak}},00
						@elseif($k->dibayar == 'belum_dibayar' and $k->pajak == !null)
						Rp{{$k->pajak}},00
						@endif

					@elseif(auth()->user()->role == 'owner')
						@if($k->tgl_bayar == null)
							<div class="text-center">-</div>
                        @else
                        {{$k->tgl_bayar}}
                        @endif
                    @endif
					</td>
					<td>
						{{$k->status}}
					</td>
					{{-- <td>
						@if($k->dibayar == 'belum_dibayar')
							belum
						@else
						{{$k->dibayar}}
						@endif
					</td> --}}
		      		@if(auth()->user()->role != 'owner')
					<td>
						@if($k->status == 'baru')
						<form style="display: inline-block;" action="/proses/{{$k->id}}" method="POST">
                        {{csrf_field()}}        
                          <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda Yakin ?')">
                            Proses
                          </button>
                        </form>
						@elseif($k->status == 'proses')
						<form style="display: inline-block;" action="/konfirmasi/selesai/{{$k->id}}" method="POST">
                        {{csrf_field()}}        
                          <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda Yakin ?')">
                            Selesai
                          </button>
                        </form>
                        @elseif($k->status == 'selesai' && $k->dibayar == 'dibayar')
						<form style="display: inline-block;" action="/konfirmasi/diambil/{{$k->id}}" method="POST">
                        {{csrf_field()}}        
                          <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda Yakin ?')">
                            Diambil
                          </button>
                        </form>
                        @elseif($k->status == 'diambil')
						<button disabled class="btn bayang borradius btn-sm btn-secondary">Sudah Diambil !</button>
                        @elseif($k->status == 'selesai' && $k->dibayar == 'belum_dibayar')
						Bayar Dulu
						@endif
					</td>
					@endif
				</tr>
			@endforeach
		  </tbody>
		</table>
		{{$transaksi->links()}}
		@if(Session::has('sukses'))
	      <h5 style="color: #FDE672;text-align: center;">{{Session::get('sukses')}}</h5>
	    @endif
	    @if(Session::has('bayar'))
	      <h5 style="color: #FDE672;text-align: center;">{{Session::get('bayar')}}</h5>
	    @endif

	</div>
@endsection