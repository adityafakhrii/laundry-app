<title>Data Owner | Laundry</title>

<?php $__env->startSection('content'); ?>
  
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
        <?php $__currentLoopData = $owner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="text-center">
          <td><?php echo e($no++); ?></td>
          <td><?php echo e($k->nama); ?></td>
          <td><?php echo e($k->username); ?></td>
          <td><?php echo e($k->outlet->nama_outlet); ?></td>
          <td>
            <a href="/owner/edit/<?php echo e($k->id); ?>" class="btn btn-sm btn-warning">Edit</a>
            <a onclick="return confirm('Yakin?')" href="/owner/hapus/<?php echo e($k->id); ?>" class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <?php echo e($owner->links()); ?>

    <?php if(Session::has('sukses')): ?>
      <h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('sukses')); ?></h5>
    <?php endif; ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/owner/owner.blade.php ENDPATH**/ ?>