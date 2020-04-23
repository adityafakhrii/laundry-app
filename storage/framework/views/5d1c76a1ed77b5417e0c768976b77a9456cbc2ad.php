<title>Edit Outlet | Laundry</title>

<?php $__env->startSection('content'); ?>
	<div class="row mt-lg-5 ml-lg-0">
		<div class="col-lg-10 mr-auto">
			<h3>Edit Outlet</h3>
		</div>
	</div>

	<form action="/updateoutlet/<?php echo e($outlet->id); ?>" method="POST">
		<?php echo csrf_field(); ?>
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="nama">Nama</label>
				<input type="text" name="nama_outlet" id="nama" class="form-control" placeholder="Masukkan nama outlet" value="<?php echo e($outlet->nama_outlet); ?>">
			</div>
			<div class="form-group col-lg">
				<label for="alamat">Alamat</label>
				<input type="textarea" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" value="<?php echo e($outlet->alamat); ?>">
			</div>
			<div class="form-group col-lg">
				<label for="tlp">No. Telfon</label>
				<input type="text" name="tlp" id="tlp" class="form-control" placeholder="Masukkan nomor telfon" value="<?php echo e($outlet->tlp); ?>">
			</div>
		</div>

		<div class="col">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/outlet" class="btn btn-warning">Batal</a>

		</div>

	</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/outlet/edit-outlet.blade.php ENDPATH**/ ?>