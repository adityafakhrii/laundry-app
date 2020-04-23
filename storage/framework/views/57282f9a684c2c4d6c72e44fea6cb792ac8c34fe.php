<title>Data Keranjang | Dirtless</title>

<?php $__env->startSection('content'); ?>
	
	<div class="row mt-lg-4">
		<div class="ml-lg-4 col-lg-5 mr-5" >
			<h3 style="margin-left: 6px;">Keranjang Pesanan</h3>
		</div>
		<div class="col">
			<form action="/posttransaksi" method="POST">
				<?php echo csrf_field(); ?>
				<select class="custom-select col-lg-12" name="id_member" id="" required>
					<option selected disabled >Pilih Member</option>
					<?php $__currentLoopData = $member; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($b->id); ?>"><?php echo e($b->nama_member); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
		</div>

		<div class="col">
			<input type="date" name="batas_waktu" class="custom-select col-form-label">
		</div>
				
		<div class="col">
				<button type="submit" class="btn btn-primary bayang borradius text-center ml-2" >Checkout</button>
			</form>
		</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-light table-hover table-striped col-md-11 tablee-fix" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col" class="tabhead">No</th>
	          <th scope="col" class="tabhead" width="10%">Gambar</th>
	          <th scope="col" class="tabhead" width="10%">Nama</th>
	          <th scope="col" class="tabhead">Jenis</th>
	          <th scope="col" class="tabhead">Harga</th>
	          <th scope="col" class="tabhead" width="10%">Jumlah</th>
	          <th scope="col" class="tabhead" width="10%">Keterangan</th>
	          <th scope="col" class="tabhead">Total Harga</th>
	          <th scope="col" class="tabhead">Aksi</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		   <?php $__currentLoopData = $keranjang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="text-center">
					<td><?php echo e($no++); ?></td>
					<td>
						<div class="foto">
							<img src="<?php echo e($k->paket->img); ?>">
						</div>
											
					</td>
					<td><?php echo e($k->paket->nama_paket); ?></td>
					<td><?php echo e($k->paket->jenis); ?></td>
					<td>Rp<?php echo e($k->paket->harga); ?>,00</td>
					<td><?php echo e($k->qty); ?></td>
					<td>
						<?php if($k->keterangan == null): ?>
						-
						<?php else: ?>
						<?php echo e($k->keterangan); ?>

						<?php endif; ?>
					</td>
					<td>Rp<?php echo e($total = $k->paket->harga*$k->qty); ?>,00</td>
					
					<td>
						<a href="/keranjang/edit/<?php echo e($k->id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
						<a onclick="return confirm('Yakin?')" href="/keranjang/hapus/<?php echo e($k->id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-trash"></i> Hapus</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </tbody>
		</table>
			<?php if(Session::has('isi')): ?>
			<h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('isi')); ?></h5>
			<?php elseif(Session::has('kosong')): ?>
			<h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('kosong')); ?></h5>
			<?php endif; ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/transaksi/keranjang.blade.php ENDPATH**/ ?>