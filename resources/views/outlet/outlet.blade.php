@extends('layouts.master')
<title>Data Outlet | Dirtless</title>

@section('content')
  
  <div class="row mt-lg-4">
    <div class="ml-lg-5">
      <h3>Data Outlet</h3>
    </div>
    <div class="col-lg-6 mr-5">
                                    <form action ="/outlet" method="GET" class="float-left col-sm-12">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control align-content-center col-sm-5" placeholder="Cari outlet...">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary">Go</button>
                                        </span>
                                      </div>
                                    </form>
    </div>
        
    <div class="col ml-5">
        <a href="/outlet/tambah" class="btn bayang borradius btn-sm btn-primary">Tambah Outlet</a>
    </div>
  </div>
  

   <div class="row justify-content-md-center">
        

    <table class="table table-light table-hover table-striped col-md-11 tablee-fix" >
      <thead>
        <tr class="text-center">
          <th scope="col" class="tabhead">No</th>
          <th scope="col" class="tabhead">Nama Outlet</th>
          <th scope="col" class="tabhead">Alamat</th>
          <th scope="col" class="tabhead">No. Telepon</th>
          <th scope="col" class="tabhead">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = 1; ?>
       		@foreach($outlet as $k)
				<tr class="text-center">
					<td>{{$no++}}</td>
					<td>{{$k->nama_outlet}}</td>
					<td>{{$k->alamat}}</td>
					<td>{{$k->tlp}}</td>
					<td>
						<a href="/outlet/edit/{{$k->id}}" class="btn bayang btn-sm btn-primary"><i class="fas fa-edit"></i></a>
						<a onclick="return confirm('Yakin?')" href="/outlet/hapus/{{$k->id}}" class="btn bayang btn-sm btn-primary"><i class="fas fa-trash"></i></a>
					</td>
				</tr>
			@endforeach
      </tbody>
    </table>
    {{$outlet->links()}}
    @if(Session::has('sukses'))
      <h5 style="color: #FDE672;text-align: center;">{{Session::get('sukses')}}</h5>
    @endif

  </div>
@endsection