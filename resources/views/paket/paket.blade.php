@extends('layouts.master')
<title>Data Paket | Dirtless</title>

@section('content')
  
  <div class="row mt-lg-4">
    <div class="ml-lg-5 mr-5">
      <h3>Data Paket Laundry</h3>
    </div>
    <div class="col ml-1">
        @if(auth()->user()->role == 'admin')
            <a href="/paket/tambah" class="btn bayang borradius btn-sm btn-primary">Tambah Paket</a>
        @endif
    </div>
    <div class="col col-lg-5 ml-4">
                                    <form action ="/paket" method="GET" class="float-left col-sm-11">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control align-content-center  ml-5" placeholder="Cari Paket...">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary">Go</button>
                                        </span>
                                      </div>
                                    </form>
    </div>
        
  </div>
  

   <div class="row justify-content-md-center">
        

    <table class="table table-light table-hover table-striped col-md-11 tablee-fix" >
      <thead>
        <tr class="text-center">
          <th scope="col" class="tabhead">No</th>
          <th scope="col" class="tabhead" width="10%">Gambar</th>
          <th scope="col" class="tabhead" width="15%">Nama</th>
          <th scope="col" class="tabhead">Jenis</th>
          <th scope="col" class="tabhead">Harga</th>
          <th scope="col" class="tabhead" width="10%">Jumlah</th>
          <th scope="col" class="tabhead" width="20%">Keterangan</th>
          <th scope="col" class="tabhead">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = 1; ?>
       @foreach($paket as $k)
									<tr class="text-center">
										<td>{{$no++}}</td>
										<td>
											<img src="{{$k->img}}">
										</td>
										<td>{{$k->nama_paket}}</td>
										<td>{{$k->jenis}}</td>
										<td>Rp{{$k->harga}},00</td>
										@if(auth()->user()->role == 'kasir')
										<form action="{{action('KeranjangController@store',$k->id)}}" method="POST">
											<td>
												@csrf
							                    <input class="text-center form-control btn-sm" type="number" name="qty" required value="1">
											</td>
											<td>
												<input class="text-center form-control btn-sm" type="text" name="keterangan" placeholder="(opsional)">
											</td>
											<td>
							                    <input type="hidden" name="id_paket" value="{{$k->id}}">
							                    <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
							                    <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i> Pesan </button>
												
											</td>

										</form>
										@endif
										@if(auth()->user()->role == 'admin')
										<form action="{{action('KeranjangController@store',$k->id)}}" method="POST">
											<td>
												@csrf
			                                        <input class="form-control btn-sm align-content-center col-sm-12 text-center" type="number" name="qty" required value="1">
											</td>
											<td>
												<input class="form-control btn-sm align-content-center col-sm-12 text-center" type="text" name="keterangan" placeholder="(opsional)">
											</td>
											<td>
												<a href="/paket/edit/{{$k->id}}"  class="btn bayang btn-sm btn-primary"><i class="fas fa-edit"></i></a>
												<a href="/paket/hapus/{{$k->id}}" onclick="return confirm('Yakin?')" href="/member/hapus/{{$k->id}}" class="btn bayang btn-sm btn-primary"><i class="fas fa-trash"></i></a>

							                    <input type="hidden" name="id_paket" value="{{$k->id}}">
							                    <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
							                    <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>  </button>
											</td>

										</form>
										@endif
										
										
									</tr>       
        @endforeach
      </tbody>
    </table>
    {{$paket->links()}}
	@if(Session::has('keranjang'))
		<h5 style="color: #FDE672;text-align: center;">{{Session::get('keranjang')}}</h5>
	@endif
	@if(Session::has('sukses'))
		<h5 style="color: #FDE672;text-align: center;">{{Session::get('sukses')}}</h5>
	@endif

  </div>
@endsection