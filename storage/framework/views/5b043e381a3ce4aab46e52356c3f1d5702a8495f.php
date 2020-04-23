<title>Edit Paket | Laundry</title>

<?php $__env->startSection('content'); ?>
	<div class="row mt-lg-5 ml-lg-0">
		<div class="col-lg-10 mr-auto">
			<h3>Edit Paket</h3>
		</div>
	</div>

	<form action="/updatepaket/<?php echo e($paket->id); ?>" method="POST" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<div class="form-row col">
			<div class="form-group col-lg">
				<label for="nama">Nama</label>
				<input type="text" name="nama_paket" id="nama" class="form-control" placeholder="Masukkan nama paket" value="<?php echo e($paket->nama_paket); ?>">
			</div>
			<div class="form-group col-lg">
				<label for="jenis">Jenis</label>
				<select name="jenis" id="jenis" class="form-control" required>
					<option disabled selected>Pilih Jenis</option>
					<option value="kiloan">Kiloan</option>
					<option value="selimut">Selimut</option>
					<option value="bed_cover">Bed Cover</option>
					<option value="kaos">Kaos</option>
					<option value="lainnya">Lainnya</option>
				</select>
			</div>
			<div class="form-group col-lg">
				<label for="harga">Harga</label>
				<input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan harga" value="<?php echo e($paket->harga); ?>">
			</div>
		</div>

		<div class="form-row col">
			<div class="form-group col-lg">
				<div class="custom-file">
				    <input type="file" name="gambar" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" required> 
				    <label class="custom-file-label" for="inputGroupFile04">Gambar paket</label>
				  </div>
			</div>		  
		</div>

		<div class="col">
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="/paket" class="btn btn-warning">Batal</a>

		</div>

	</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/paket/edit-paket.blade.php ENDPATH**/ ?>