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
                                    <form action ="/transaksi" method="GET" class="float-left ml-4">
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
		      <?php if(auth()->user()->role != 'owner'): ?>
		      <th scope="col" class="tabhead">Konfirmasi Status</th>
		      <?php endif; ?>
		      
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
							<a href="/transaksi/detail/<?php echo e($k->id); ?>" class="lihat">Lihat Detail</a>
						</div>
						
					</td>
					<td><?php echo e($k->member->nama_member); ?></td>
					<td><?php echo e($k->tgl); ?></td>
					<td><?php echo e($k->batas_waktu); ?></td>
					<td>
					<?php if(auth()->user()->role != 'owner'): ?>
					
						<?php if($k->tgl_bayar == null): ?>
                        <a href="/transaksi/detail/<?php echo e($k->id); ?>" class="btn btn-sm btn-primary">Bayar</a>
                        <?php else: ?>
                        <?php echo e($k->tgl_bayar); ?>

                        <?php endif; ?>
                    <?php elseif(auth()->user()->role == 'owner'): ?>
                    	<?php if($k->tgl_bayar == null): ?>
							<div class="text-center">-</div>
                        <?php else: ?>
                        <?php echo e($k->tgl_bayar); ?>

                        <?php endif; ?>

					
					<?php endif; ?>

					</td>
					<td>
					<?php if(auth()->user()->role != 'owner'): ?>

						<?php if($k->dibayar == 'belum_dibayar' and $k->biaya_tambahan == null): ?>
						<form style="display: inline-block;" action="/biaya_tambahan/<?php echo e($k->id); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="number" class="form-control text-center" value="0" name="biaya_tambahan">
                        </form>
                        <?php elseif($k->dibayar == 'dibayar' and $k->biaya_tambahan == null): ?>
						-
                        <?php elseif($k->dibayar == 'dibayar' and $k->biaya_tambahan == !null): ?>
						Rp<?php echo e($k->biaya_tambahan); ?>,00
						<?php elseif($k->dibayar == 'belum_dibayar' and $k->biaya_tambahan == !null): ?>
						Rp<?php echo e($k->biaya_tambahan); ?>,00
						<?php endif; ?>

                    <?php elseif(auth()->user()->role == 'owner'): ?>
						<?php if($k->tgl_bayar == null): ?>
							<div class="text-center">-</div>
                        <?php else: ?>
                        <?php echo e($k->tgl_bayar); ?>

                        <?php endif; ?>
                    <?php endif; ?>
					</td>
					<td>
					<?php if(auth()->user()->role != 'owner'): ?>

						<?php if($k->dibayar == 'belum_dibayar' and $k->diskon == null): ?>
						<form style="display: inline-block;" action="/diskon/<?php echo e($k->id); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="number" class="form-control text-center" value="0" name="diskon">
                        </form>
                        <?php elseif($k->dibayar == 'dibayar' and $k->diskon == null): ?>
						-
                        <?php elseif($k->dibayar == 'dibayar' and $k->diskon == !null): ?>
						Rp<?php echo e($k->diskon); ?>,00
						<?php elseif($k->dibayar == 'belum_dibayar' and $k->diskon == !null): ?>
						Rp<?php echo e($k->diskon); ?>,00
						<?php endif; ?>

					<?php elseif(auth()->user()->role == 'owner'): ?>
						<?php if($k->tgl_bayar == null): ?>
							<div class="text-center">-</div>
                        <?php else: ?>
                        <?php echo e($k->tgl_bayar); ?>

                        <?php endif; ?>
                    <?php endif; ?>
					</td>
					<td>
					<?php if(auth()->user()->role != 'owner'): ?>

						<?php if($k->dibayar == 'belum_dibayar' and $k->pajak == null): ?>
						<form style="display: inline-block;" action="/pajak/<?php echo e($k->id); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="number" class="form-control text-center" value="0" name="pajak">
                        </form>
                        <?php elseif($k->dibayar == 'dibayar' and $k->pajak == null): ?>
						-
                        <?php elseif($k->dibayar == 'dibayar' and $k->pajak == !null): ?>
						Rp<?php echo e($k->pajak); ?>,00
						<?php elseif($k->dibayar == 'belum_dibayar' and $k->pajak == !null): ?>
						Rp<?php echo e($k->pajak); ?>,00
						<?php endif; ?>

					<?php elseif(auth()->user()->role == 'owner'): ?>
						<?php if($k->tgl_bayar == null): ?>
							<div class="text-center">-</div>
                        <?php else: ?>
                        <?php echo e($k->tgl_bayar); ?>

                        <?php endif; ?>
                    <?php endif; ?>
					</td>
					<td>
						<?php echo e($k->status); ?>

					</td>
					
		      		<?php if(auth()->user()->role != 'owner'): ?>
					<td>
						<?php if($k->status == 'baru'): ?>
						<form style="display: inline-block;" action="/proses/<?php echo e($k->id); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>        
                          <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda Yakin ?')">
                            Proses
                          </button>
                        </form>
						<?php elseif($k->status == 'proses'): ?>
						<form style="display: inline-block;" action="/konfirmasi/selesai/<?php echo e($k->id); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>        
                          <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda Yakin ?')">
                            Selesai
                          </button>
                        </form>
                        <?php elseif($k->status == 'selesai' && $k->dibayar == 'dibayar'): ?>
						<form style="display: inline-block;" action="/konfirmasi/diambil/<?php echo e($k->id); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>        
                          <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Anda Yakin ?')">
                            Diambil
                          </button>
                        </form>
                        <?php elseif($k->status == 'diambil'): ?>
						<button disabled class="btn bayang borradius btn-sm btn-secondary">Sudah Diambil !</button>
                        <?php elseif($k->status == 'selesai' && $k->dibayar == 'belum_dibayar'): ?>
						Bayar Dulu
						<?php endif; ?>
					</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </tbody>
		</table>
		<?php echo e($transaksi->links()); ?>

		<?php if(Session::has('sukses')): ?>
	      <h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('sukses')); ?></h5>
	    <?php endif; ?>
	    <?php if(Session::has('bayar')): ?>
	      <h5 style="color: #FDE672;text-align: center;"><?php echo e(Session::get('bayar')); ?></h5>
	    <?php endif; ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/transaksi/transaksi.blade.php ENDPATH**/ ?>