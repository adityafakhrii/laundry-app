<title>Data Paket | Laundry</title>

<?php $__env->startSection('content'); ?>
  
  <div class="row mt-lg-4">
    <div class="ml-lg-5 mr-5">
      <h3>Data Paket Laundry</h3>
    </div>
    <div class="col ml-1">
        <?php if(auth()->user()->role == 'admin'): ?>
            <a href="/paket/tambah" class="btn bayang borradius btn-sm btn-primary">Tambah Paket</a>
        <?php endif; ?>
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
       <?php $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="text-center">
										<td><?php echo e($no++); ?></td>
										<td>
											<img src="<?php echo e($k->img); ?>">
										</td>
										<td><?php echo e($k->nama_paket); ?></td>
										<td><?php echo e($k->jenis); ?></td>
										<td>Rp<?php echo e($k->harga); ?>,00</td>
										<?php if(auth()->user()->role == 'kasir'): ?>
										<form action="<?php echo e(action('KeranjangController@store',$k->id)); ?>" method="POST">
											<td>
												<?php echo csrf_field(); ?>
							                    <input class="text-center form-control btn-sm" type="number" name="qty" required value="1">
											</td>
											<td>
												<input class="text-center form-control btn-sm" type="text" name="keterangan" placeholder="(opsional)">
											</td>
											<td>
							                    <input type="hidden" name="id_paket" value="<?php echo e($k->id); ?>">
							                    <input type="hidden" name="id_user" value="<?php echo e(auth()->user()->id); ?>">
							                    <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i> Pesan </button>
												
											</td>

										</form>
										<?php endif; ?>
										<?php if(auth()->user()->role == 'admin'): ?>
										<form action="<?php echo e(action('KeranjangController@store',$k->id)); ?>" method="POST">
											<td>
												<?php echo csrf_field(); ?>
			                                        <input class="form-control btn-sm align-content-center col-sm-12 text-center" type="number" name="qty" required value="1">
											</td>
											<td>
												<input class="form-control btn-sm align-content-center col-sm-12 text-center" type="text" name="keterangan" placeholder="(opsional)">
											</td>
											<td>
												<a href="/paket/edit/<?php echo e($k->id); ?>"  class="btn bayang btn-sm btn-primary"><i class="fas fa-edit"></i></a>
												<a href="/paket/hapus/<?php echo e($k->id); ?>" onclick="return confirm('Yakin?')" href="/member/hapus/<?php echo e($k->id); ?>" class="btn bayang btn-sm btn-primary"><i class="fas fa-trash"></i></a>

							                    <input type="hidden" name="id_paket" value="<?php echo e($k->id); ?>">
							                    <input type="hidden" name="id_user" value="<?php echo e(auth()->user()->id); ?>">
							                    <button style="cursor: pointer;" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-cart-plus"></i>  </button>
											</td>

										</form>
										<?php endif; ?>
										
										
									</tr>       
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <?php echo e($paket->links()); ?>

	<?php if(Session::has('keranjang')): ?>
		<h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('keranjang')); ?></h5>
	<?php endif; ?>
	<?php if(Session::has('sukses')): ?>
		<h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('sukses')); ?></h5>
	<?php endif; ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/paket/paket.blade.php ENDPATH**/ ?>