<title>Detail Transaksi | Dirtless</title>

<?php $__env->startSection('content'); ?>
	
	<div class="row mt-lg-2">
		<div class="ml-lg-5 mr-4">
			<h3>Detail Transaksi</h3>
		</div>
		<div class="col">
			
		</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-light table-hover col-md-11 tablee table-fix" style="width: 1200px">
		  <thead>
		    <tr class="text-center">
		      <th scope="col" class="tabhead">No</th>
		      <th scope="col" class="tabhead">Kode Invoice</th>
		      <th scope="col" class="tabhead">Member</th>
		      <th scope="col" class="tabhead">Nama Paket</th>
		      <th scope="col" class="tabhead">Harga</th>
		      <th scope="col" class="tabhead">Jumlah</th>
		      <th scope="col" class="tabhead">Ket.</th>
		      <th scope="col" class="tabhead" width="20%">Total Harga</th>
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    <?php $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="text-center">			
					<td><?php echo e($no++); ?></td>
					<td><?php echo e($transaksi->transaksi->kode_invoice); ?></td>
					<td><?php echo e($transaksi->transaksi->member->nama_member); ?></td>
					<td><?php echo e($transaksi->paket->nama_paket); ?></td>
					<td>Rp<?php echo e($transaksi->paket->harga); ?></td>
					<td><?php echo e($transaksi->qty); ?></td>
					<?php if($transaksi->keterangan == null): ?>
					<td>-</td>
					<?php else: ?>
					<td><?php echo e($transaksi->keterangan); ?></td>
					<?php endif; ?>
					<td>
						Rp<?php echo e(($transaksi->paket->harga*$transaksi->qty)); ?>,00
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td colspan="7"><b>Biaya Tambahan</b></td>
					<?php if($trans->biaya_tambahan == null): ?>
					<td class="text-center">-</td>
					<?php else: ?>
					<td class="text-center">Rp<?php echo e($trans->biaya_tambahan); ?>,00</td>
					<?php endif; ?>
				</tr>
				<tr>
					<td colspan="7"><b>Pajak</b></td>
					<?php if($trans->pajak == null): ?>
					<td class="text-center">-</td>
					<?php else: ?>
					<td class="text-center">Rp<?php echo e($trans->pajak); ?>,00</td>
					<?php endif; ?>
				</tr>
				<tr>
					<td colspan="7"><b>Diskon</b></td>
					<?php if($trans->diskon == null): ?>
					<td class="text-center">-</td>
					<?php else: ?>
					<td class="text-center">Rp<?php echo e($trans->diskon); ?>,00</td>
					<?php endif; ?>
				</tr>
				<tr class="table-active">
					<td colspan="7"><b>Total Pembayaran</b></td>
					<td class="text-center">
						<?php 
							$harga = 0;
							foreach ($transaksis as $transaksi) {
								$harga = $harga + ($transaksi->paket->harga*$transaksi->qty);
							}
						?>
						<span style="font-weight: bold;">Rp<?php echo e($harga + ($trans->biaya_tambahan + $trans->pajak - $trans->diskon)); ?>,00</span>
					</td>
				</tr>
				<tr>
					<td colspan="7"></td>
					<td>
						<div class="row" style="margin:  auto;">

							<?php if($trans->dibayar == 'belum_dibayar'): ?>
								<?php if(auth()->user()->role != 'owner'): ?>
				    		<form action="/transaksi/dibayar/<?php echo e($trans->id); ?>" method="POST">
	                        <?php echo e(csrf_field()); ?>   
	                          <button type="submit" class="btn btn-sm btn-primary ml-3" onclick="return confirm('Anda Yakin ?')">
	                                      	<i class="fas fa-money-bill-wave-alt"></i> Bayar
	                          </button>
	                		</form>
	                			<?php else: ?>
	                			<a href="/data-transaksi" class="btn btn-sm btn-primary ml-2"><i class="fas fa-chevron-left"></i> Kembali</a>
	                			<?php endif; ?>
	                		<a href="/transaksi" class="btn btn-sm btn-primary ml-2"><i class="fas fa-chevron-left"></i> Kembali</a>	
			           		<?php endif; ?>

							<?php if($trans->dibayar == 'dibayar'): ?>
	                		<a href="/transaksi" class="btn btn-sm btn-primary" style="margin-left: 57px;"><i class="fas fa-chevron-left"></i> Kembali</a>	
			           		<?php endif; ?>

						</div>
					</td>
				</tr>
		  </tbody>
		</table>
		<div class="col">
			
            
		</div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/transaksi/detail.blade.php ENDPATH**/ ?>