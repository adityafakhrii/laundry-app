<title>Data Transaksi | Dirtless</title>

<?php $__env->startSection('content'); ?>
	
	<div class="row mt-lg-4">
		<div class="ml-lg-5">
			<h3>Data Transaksi</h3>
		</div>
		<?php if(auth()->user()->role == 'owner'): ?>
		<div class="col">
			<a target="_blank" href="/data-transaksi/exportpdf" class="btn bayang borradius btn-sm btn-primary">Generate Laporan</a>
		</div>
		<?php endif; ?>

		<?php if(auth()->user()->role == 'admin'): ?>
		<div class="col">
			<a target="_blank" href="/transaksi/exportpdf" class="btn bayang borradius btn-sm btn-primary">Generate Laporan</a>
		</div>
		<?php endif; ?>

		<?php if(auth()->user()->role == 'kasir'): ?>
		<div class="col">
			<a target="_blank" href="/transaksi/exportpdf" class="btn bayang borradius btn-sm btn-primary">Generate Laporan</a>
		</div>
		<?php endif; ?>

		<div class="col">
                                    <form action ="/data-transaksi" method="GET" class="float-left ml-4">
                                      <div class="input-group">
                                        <input name="search" type="text" class="form-control align-content-center col-sm-12 ml-5" placeholder="Cari invoice...">
                                        <span class="input-group-btn">
                                          <button type="submit" class="btn btn-primary">Go</button>
                                        </span>
                                      </div>
                                    </form>
    	</div>
	</div>
	

	 <div class="row justify-content-md-center">
				

		<table class="table table-light table-hover table-striped col-md-11 tablee">
		  <thead>
		    <tr class="text-center">
		      <th scope="col" class="tabhead">No</th>
		      <th scope="col" class="tabhead" width="13%">Kode Invoice</th>
		      <th scope="col" class="tabhead">Member</th>
		      <th scope="col" class="tabhead">Tanggal</th>
		      <th scope="col" class="tabhead">Batas Waktu</th>
		      <th scope="col" class="tabhead">Tanggal Bayar</th>
		      <th scope="col" class="tabhead">Biaya Tambahan</th>
		      <th scope="col" class="tabhead">Diskon</th>
		      <th scope="col" class="tabhead">Pajak</th>
		      <th scope="col" class="tabhead">Status</th>
		     
		      
		    </tr>
		  </thead>
		  <tbody>
		  <?php $no = 1; ?>
		    <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="text-center">
					<td><?php echo e($no++); ?></td>
					<td>
						<div class="invoice">
							<div class="kode"><?php echo e($k->kode_invoice); ?></div>
							<a href="/data-transaksi/detail/<?php echo e($k->id); ?>" class="lihat">Lihat Detail</a>
						</div>
						
					</td>
					<td><?php echo e($k->member->nama_member); ?></td>
					<td><?php echo e($k->tgl); ?></td>
					<td><?php echo e($k->batas_waktu); ?></td>
					<td>
					
                    	<?php if($k->tgl_bayar == null): ?>
							<div class="text-center">-</div>
                        <?php else: ?>
                        <?php echo e($k->tgl_bayar); ?>

                        <?php endif; ?>


					</td>
					<td>

						<?php if($k->biaya_tambahan == null): ?>
						
						-
                        <?php elseif($k->biaya_tambahan == !null): ?>
						Rp<?php echo e($k->biaya_tambahan); ?>,00
						<?php endif; ?>

                    
					</td>
					<td>
					

						<?php if($k->diskon == null): ?>
						
						-
                        <?php elseif($k->diskon == !null): ?>
						Rp<?php echo e($k->diskon); ?>,00
						<?php endif; ?>
					</td>
					<td>
					

						<?php if($k->pajak == null): ?>
						-
                        <?php elseif($k->pajak == !null): ?>
						Rp<?php echo e($k->pajak); ?>,00
						<?php endif; ?>

					
					</td>
					<td>
						<?php echo e($k->status); ?>

					</td>
					
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </tbody>
		</table>
		<?php echo e($transaksi->links()); ?>

		

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/transaksi/data-transaksi.blade.php ENDPATH**/ ?>