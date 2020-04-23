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
                                    <form action ="/data-transaksi" method="GET" class="float-left ml-4">
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
							<a href="/data-transaksi/detail/{{$k->id}}" class="lihat">Lihat Detail</a>
						</div>
						
					</td>
					<td>{{$k->member->nama_member}}</td>
					<td>{{$k->tgl}}</td>
					<td>{{$k->batas_waktu}}</td>
					<td>
					
                    	@if($k->tgl_bayar == null)
							<div class="text-center">-</div>
                        @else
                        {{$k->tgl_bayar}}
                        @endif


					</td>
					<td>

						@if($k->biaya_tambahan == null)
						
						-
                        @elseif($k->biaya_tambahan == !null)
						Rp{{$k->biaya_tambahan}},00
						@endif

                    
					</td>
					<td>
					

						@if($k->diskon == null)
						
						-
                        @elseif($k->diskon == !null)
						Rp{{$k->diskon}},00
						@endif
					</td>
					<td>
					

						@if($k->pajak == null)
						-
                        @elseif($k->pajak == !null)
						Rp{{$k->pajak}},00
						@endif

					
					</td>
					<td>
						{{$k->status}}
					</td>
					
				</tr>
			@endforeach
		  </tbody>
		</table>
		{{$transaksi->links()}}
		

	</div>
@endsection