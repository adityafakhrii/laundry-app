<title>Data Kasir | Laundry</title>

<?php $__env->startSection('content'); ?>
  
  <div class="row mt-lg-4">
    <div class="ml-lg-5">
      <h3>Data Kasir</h3>
    </div>
    <div class="col-lg-7 mr-5">
                                    <form action ="/kasir" method="GET" class="float-left col-sm-12">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control align-content-center col-sm-5" placeholder="Cari kasir...">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary">Go</button>
                                        </span>
                                      </div>
                                    </form>
    </div>
        
    <div class="col ml-5">
        <a href="/kasir/tambah" class="btn bayang borradius btn-sm btn-primary">Tambah Kasir</a>
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
       <?php $__currentLoopData = $kasir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center">
                      <td><?php echo e($no++); ?></td>
                      <td><?php echo e($k->nama); ?></td>
                      <td><?php echo e($k->username); ?></td>
                      <td><?php echo e($k->outlet->nama_outlet); ?></td>
                      <td>
                        <a href="/kasir/edit/<?php echo e($k->id); ?>" class="btn bayang btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
                        <a onclick="return confirm('Yakin?')" href="/kasir/hapus/<?php echo e($k->id); ?>" class="btn bayang btn-sm btn-primary"><i class="fas fa-user-times"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <?php echo e($kasir->links()); ?>

    <?php if(Session::has('sukses')): ?>
      <h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('sukses')); ?></h5>
    <?php endif; ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/kasir/kasir.blade.php ENDPATH**/ ?>