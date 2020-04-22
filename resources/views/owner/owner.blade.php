@extends('layouts.master')
<title>Data Owner | Dirtless</title>

@section('content')
  
  <div class="row mt-lg-4">
    <div class="ml-lg-5">
      <h3>Data Owner</h3>
    </div>
    <div class="col-lg-6 mr-5">
                                    <form action ="/owner" method="GET" class="float-left col-sm-12">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control align-content-center col-sm-5" placeholder="Cari owner...">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary">Go</button>
                                        </span>
                                      </div>
                                    </form>
    </div>
        
    <div class="col ml-5">
        <a href="/owner/tambah" class="btn bayang borradius btn-sm btn-primary">Tambah Owner</a>
    </div>
  </div>
  

   <div class="row justify-content-md-center">
        

    <table class="table table-light table-hover table-striped col-md-11 tablee-fix" >
      <thead>
        <tr class="text-center">
          <th scope="col" class="tabhead">No</th>
          <th scope="col" class="tabhead">Nama</th>
          <th scope="col" class="tabhead">Username</th>
          <th scope="col" class="tabhead">Outlet</th>
          <th scope="col" class="tabhead">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = 1; ?>
        @foreach($owner as $k)
        <tr class="text-center">
          <td>{{$no++}}</td>
          <td>{{$k->nama}}</td>
          <td>{{$k->username}}</td>
          <td>{{$k->outlet->nama_outlet}}</td>
          <td>
            <a href="/owner/edit/{{$k->id}}" class="btn btn-sm btn-warning">Edit</a>
            <a onclick="return confirm('Yakin?')" href="/owner/hapus/{{$k->id}}" class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$owner->links()}}
    @if(Session::has('sukses'))
      <h5 style="color: #FDE672;text-align: center;">{{Session::get('sukses')}}</h5>
    @endif

  </div>
@endsection