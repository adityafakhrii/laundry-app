<title>Edit Keranjang | Laundry</title>

<?php $__env->startSection('content'); ?>
	<div class="row mt-lg-5 ml-lg-0">
		<div class="col-lg-10 mr-auto">
			<h3>Edit Keranjang</h3>
		</div>
	</div>

	<form action="/updatekeranjang/<?php echo e($keranjang->id); ?>" method="POST">
		<?php echo csrf_field(); ?>
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="nama_paket">Nama Paket</label>
				<input type="text" name="nama_paket" id="nama_paket" class="form-control" placeholder="Masukkan jumlah paket" value="<?php echo e($keranjang->paket->nama_paket); ?>" disabled>
			</div>
			<div class="form-group col-lg">
				<label for="jenis">Jenis Paket</label>
				<input type="text" name="jenis" id="jenis" class="form-control" placeholder="Masukkan jumlah paket" value="<?php echo e($keranjang->paket->jenis); ?>" disabled>
			</div>
		</div>
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="qty">Jumlah</label>
				<input type="number" name="qty" id="qty" class="form-control" placeholder="Masukkan jumlah paket" value="<?php echo e($keranjang->qty); ?>">
			</div>
			<div class="form-group col-lg">
				<label for="keterangan">Keterangan</label>
				<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan" value="<?php echo e($keranjang->keterangan); ?>">
			</div>
		</div>

		<div class="col">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/keranjang" class="btn btn-warning">Batal</a>

		</div>

	</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/transaksi/edit-keranjang.blade.php ENDPATH**/ ?>