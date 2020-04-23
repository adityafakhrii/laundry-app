<head>
	<title>Laporan Riwayat Transaksi - <?php echo e(auth()->user()->nama); ?></title>
	

</head>
<body style="    
	color: #797979;
    font-family: 'Ruda', sans-serif;
    font-size: 13px;">

	
	<section id="container">
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="col-lg-12 mt">
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body" style="font-weight: 900px;">
                <div class="pull-left" style="float: left;">
                  <h1 style="
                  font-size: 39px;
                  font-family: 'Poppins', sans-serif;
				    font-weight: 500;
				    line-height: 1.1px;
				    color: #00B0FF;"><b>Dirtless</b> </h1>
            <h3 style="margin-top: -20px; font-weight: lighter;">Riwayat Data Transaksi </h3>
                  <address style="margin-bottom: 20px;
				    font-style: normal;">
	                <strong>Uji Kompetensi Keahlian SMKN 2 SUKABUMI</strong><br>
	                Jl. Pelabuhan II, Cikondang, Kec. Citamiang, Cipoho<br>
	                Kota Sukabumi, Jawa Barat - 43141<br>
	                <abbr title="Phone">Telp. (0266) 221589</abbr> 
	                <abbr title="Phone">  Email : info@smkn2smi.sch.id </abbr> 
	              </address>
                </div>
                <!-- /pull-left -->
                
                <!-- /pull-right -->
                <div class="clearfix"></div>
                <br>
                <br>
                <br>
                <div class="row" style="margin-top: 100px;">
	                  <div class="col-md-9">
	                    <address style="float: left;">
		                  <strong style="margin-right: 5px">Petugas Kasir  :</strong> <?php echo e(auth()->user()->nama); ?> <br>
		                  <strong style="margin-right: 5px"> Jumlah Transaksi :</strong> <?php echo e($transaksi->count()); ?> <br>
		                </address>
	                  </div>
	                  <!-- /col-md-9 -->
	                  <div class="col-md-3">
	                    <br>

	                    <address style="float: right; margin-top: -15px;">
		                  	<strong style="margin-left: -95px;margin-right: 5px;">Hari :</strong><?php
		                      echo date('l');
		                    ?>
		                        	<br>

		               		<strong style="margin-left: -95px;margin-right: 5px;">Tanggal : </strong> <?php
				                echo  date('d M Y');
				              ?>
		                </address>
		
	                   

	                    <br>
	                    <br>
	                    <div class="well well-small green" style="
	                    	background-color: #00B0FF;
						    border: none;
						    height: 2px;
						    width: auto;
	   						margin-bottom: 20px">
	                  	</div>
	                  <!-- /invoice-body -->
                </div>
                <!-- /col-lg-10 -->
                <table border="" class="table" style="width: 100%;
				    max-width: 100%;
				    margin-bottom: 20px;
					background-color: transparent;
					border-spacing: 0;
  					border-collapse: collapse;
				    ">
                  <thead>
                    <tr style="text-align: center; font-size: 13px">
				      <th scope="col">No</th>
				      <th scope="col">Kode Invoice</th>
				      <th scope="col">Member</th>
				      <th scope="col">Tanggal</th>
				      <th scope="col">Batas Waktu</th>
				      <th scope="col">Tanggal Bayar</th>
				      <th scope="col">Biaya Tambahan</th>
				      <th scope="col">Diskon</th>
				      <th scope="col">Pajak</th>
				      <th scope="col">Status</th>
				      <th scope="col">Pembayaran</th>
				      <?php if(auth()->user()->role == 'owner'): ?>
						<th scope="col">Kasir</th>
				      <?php endif; ?>
				    </tr>
                  </thead>
                  <tbody>
                    <?php echo e($no=1); ?>

				<?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr style="text-align: center; font-size: 12px;">
						<td><?php echo e($no++); ?></td>
						<td><?php echo e($k->kode_invoice); ?></td>
						<td><?php echo e($k->nama_member); ?></td>
						<td><?php echo e($k->tgl); ?></td>
						<td><?php echo e($k->batas_waktu); ?></td>
						<td>
							<?php if($k->tgl_bayar == !null): ?>
							<?php echo e($k->tgl_bayar); ?>

							<?php else: ?>
							-
							<?php endif; ?>
						</td>
						<td>
							<?php if($k->biaya_tambahan == !null): ?>
							<?php echo e($k->biaya_tambahan); ?>

							<?php else: ?>
							-
							<?php endif; ?>
						</td>
						<td>
							<?php if($k->diskon == !null): ?>
							<?php echo e($k->diskon); ?>

							<?php else: ?>
							-
							<?php endif; ?>
						</td>
						<td>
							<?php if($k->pajak == !null): ?>
							<?php echo e($k->pajak); ?>

							<?php else: ?>
							-
							<?php endif; ?>
						</td>
						<td><?php echo e($k->status); ?></td>
						<td>
							<?php if($k->dibayar == 'dibayar'): ?>
							<?php echo e($k->dibayar); ?>

							<?php else: ?>
							belum dibayar
							<?php endif; ?>
						</td>
						<?php if(auth()->user()->role == 'owner'): ?>
							<td><?php echo e($k->nama); ?></td>
						<?php endif; ?>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <br>
                <br>
              </div>
              
      </section>
    </section>
</section>
	
</body><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/transaksi/exportpdf.blade.php ENDPATH**/ ?>