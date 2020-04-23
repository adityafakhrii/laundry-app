<title>Riwayat Transaksi | Dirtless</title>

<?php $__env->startSection('content'); ?>
	
	<div class="row mt-lg-4">
		<div class="ml-lg-5">
			<h3>Riwayat Transaksi</h3>
		</div>
		<?php if(auth()->user()->role == 'kasir' or 'admin'): ?>
		<div class="col">
			<a target="_blank" href="/riwayat-transaksi/exportpdf" class="btn bayang borradius btn-sm btn-primary">Generate Laporan</a>
		</div>
		<?php elseif(auth()->user()->role == 'owner'): ?>
			<div class="col">
			<a target="_blank" href="/data-transaksi/exportpdf" class="btn bayang borradius btn-sm btn-primary">Generate Laporan</a>
		</div>
		<?php endif; ?>
		<div class="col">
                                    <form action ="/riwayat-transaksi" method="GET" class="float-left ml-4">
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
		      <th scope="col" class="tabhead">Kode Invoice</th>
		      <th scope="col" class="tabhead">Member</th>
		      <th scope="col" class="tabhead">Tanggal</th>
		      <th scope="col" class="tabhead">Batas Waktu</th>
		      <th scope="col" class="tabhead">Tanggal Bayar</th>
		      <th scope="col" class="tabhead">Biaya Tambahan</th>
		      <th scope="col" class="tabhead">Diskon</th>
		      <th scope="col" class="tabhead">Pajak</th>
		      <th scope="col" class="tabhead">Status</th>
		      <th scope="col" class="tabhead">Pembayaran</th>
		      
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
							<a href="/riwayat-transaksi/detail/<?php echo e($k->id); ?>" class="lihat">Lihat Detail</a>
						</div>
						
					</td>
					<td><?php echo e($k->member->nama_member); ?></td>
					<td><?php echo e($k->tgl); ?></td>
					<td><?php echo e($k->batas_waktu); ?></td>
					<td>
						<?php if($k->tgl_bayar == null): ?>
						<form style="display: inline-block;" action="/riwayat-transaksi/dibayar/<?php echo e($k->id); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                                      
                          <button type="submit" class="btn btn-outline-info btn-sm" onclick="return confirm('Anda Yakin ?')">
                                      	Bayar
                          </button>
                        </form>
                        <?php else: ?>
                        <?php echo e($k->tgl_bayar); ?>

                        <?php endif; ?>
					</td>
					<td>
						<?php if($k->biaya_tambahan == null): ?>
						-
                        <?php else: ?>
						Rp<?php echo e($k->biaya_tambahan); ?>,00
						<?php endif; ?>
					</td>
					<td>
						<?php if($k->diskon == null): ?>
						-
                        <?php else: ?>
						Rp<?php echo e($k->diskon); ?>,00
						<?php endif; ?>
					</td>
					<td>
						<?php if($k->pajak == null): ?>
						-
                        <?php else: ?>
						Rp<?php echo e($k->pajak); ?>,00
						<?php endif; ?>
					</td>
					<td>
						<?php if($k->status == 'baru'): ?>
						<form style="display: inline-block;" action="/riwayat/proses/<?php echo e($k->id); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>        
                          <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Anda Yakin ?')">
                            Proses
                          </button>
                        </form>
						<?php else: ?>
						<?php echo e($k->status); ?>

						<?php endif; ?>
					</td>
					<td>
						<?php if($k->dibayar == 'belum_dibayar'): ?>
							belum
						<?php else: ?>
						<?php echo e($k->dibayar); ?>

						<?php endif; ?>
					</td>
					
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </tbody>
		</table>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/transaksi/riwayat-transaksi.blade.php ENDPATH**/ ?>