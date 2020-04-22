  @extends('layouts.master')
<title>Data Member | Dirtless</title>

@section('content')
  
  <div class="row mt-lg-4">
    <div class="ml-lg-5">
      <h3>Data Member</h3>
    </div>
    <div class="col-lg-5 mr-3 ">
        <a href="/member/tambah" class="btn bayang borradius btn-sm btn-primary">Tambah Member</a>
    </div>
    <div class="col">
                                    <form action ="/member" method="GET" class="float-left col-sm-11">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control align-content-center " placeholder="Cari member...">
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
          <th scope="col" class="tabhead">Nama</th>
          <th scope="col" class="tabhead">Alamat</th>
          <th scope="col" class="tabhead">Jenis Kelamin</th>
          <th scope="col" class="tabhead">No. Telfon</th>
          <th scope="col" class="tabhead">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = 1; ?>
       @foreach($member as $k)
                    <tr class="text-center">
                      <td>{{$no++}}</td>
                      <td>{{$k->nama_member}}</td>
                      <td>{{$k->alamat}}</td>
                      <td>{{$k->jenis_kelamin}}</td>
                      <td>{{$k->tlp}}</td>
                      <td>
                        <a href="/member/edit/{{$k->id}}" class="btn bayang btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
                        <a onclick="return confirm('Yakin?')" href="/member/hapus/{{$k->id}}" class="btn bayang btn-sm btn-primary"><i class="fas fa-user-times"></i></a>
                      </td>
                    </tr>
                  @endforeach
      </tbody>
    </table>
    @if(Session::has('sukses'))
      <h5 style="color: #FDE672;text-align: center;">{{Session::get('sukses')}}</h5>
    @endif

  </div>
@endsection