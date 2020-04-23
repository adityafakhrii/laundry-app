  
<title>Data Member | Laundry</title>

<?php $__env->startSection('content'); ?>
  
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
       <?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center">
                      <td><?php echo e($no++); ?></td>
                      <td><?php echo e($k->nama_member); ?></td>
                      <td><?php echo e($k->alamat); ?></td>
                      <td><?php echo e($k->jenis_kelamin); ?></td>
                      <td><?php echo e($k->tlp); ?></td>
                      <td>
                        <a href="/member/edit/<?php echo e($k->id); ?>" class="btn bayang btn-sm btn-primary"><i class="fas fa-user-edit"></i></a>
                        <a onclick="return confirm('Yakin?')" href="/member/hapus/<?php echo e($k->id); ?>" class="btn bayang btn-sm btn-primary"><i class="fas fa-user-times"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <?php if(Session::has('sukses')): ?>
      <h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('sukses')); ?></h5>
    <?php endif; ?>

  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/member/member.blade.php ENDPATH**/ ?>