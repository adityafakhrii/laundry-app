<title>Data Kasir | Laundry</title>

<?php $__env->startSection('content'); ?>
	
	<div class="row mt-lg-5 ml-lg-4">
		<div class="col-lg-10 mr-auto">
			<h2>Data Kasir</h2>
		</div>
		<div class="col">
			<a href="/tambah-kasir" class="btn btn-primary">Tambah Kasir</a>
		</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-hover col-md-11">
		  <thead>
		    <tr>
		      <th scope="col">No</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Username</th>
		      <th scope="col">Outlet</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    <?php $__currentLoopData = $kasir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($no++); ?></td>
					<td><?php echo e($k->nama); ?></td>
					<td><?php echo e($k->username); ?></td>
					<td><?php echo e($k->outlet->nama_outlet); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </tbody>
		</table>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/kasir.blade.php ENDPATH**/ ?>