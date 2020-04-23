                <nav class="navbarr">

                    <div class="headerr">

                        <div class="navbarr-header">
                            <a href="/" class="logoo">
                                <img src="<?php echo e(asset('asset/img/logo.svg')); ?>" alt="logo.svg">
                                <span>Dirtless</span> 
                            </a>
                        </div>

                        <div class="m_button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <ul class="navv navbarr-nav utama">
                            <?php if(auth()->guard()->check()): ?>
                            <li><a href="/dashboard">Dashboard</a></li>
                            <?php endif; ?>
                            <?php if(auth()->user()->role == 'kasir'): ?>
                                <li>
                                    <a href="/member">Member</a>
                                </li>
                                <li>
                                    <a href="/paket">Paket</a>
                                </li>
                                <li>
                                    <a href="/keranjang">Keranjang</a>
                                </li>
                                <li>
                                    <a href="/transaksi">Transaksi</a>
                                </li>
                                <li>
                                    <a href="/riwayat-transaksi">Riwayat</a>
                                </li>
                            <?php endif; ?>
                            <?php if(auth()->user()->role == 'admin'): ?>
                                <li>
                                    <a href="/member">Member</a>
                                </li>
                                <li>
                                    <a href="/kasir">Kasir</a>
                                </li>
                                <li>
                                    <a href="/paket">Paket</a>
                                </li>
                                <li>
                                    <a href="/keranjang">Keranjang</a>
                                </li>
                                <li>
                                    <a href="/transaksi">Transaksi</a>
                                </li>
                                <li>
                                    <a href="/riwayat-transaksi">Riwayat</a>
                                </li>
                            <?php endif; ?>
                            <?php if(auth()->user()->role == 'super_admin'): ?>
                                <li>
                                    <a href="/admin">Admin</a>
                                </li>
                                <li>
                                    <a href="/owner">Owner</a>
                                </li>
                                <li>
                                    <a href="/outlet">Outlet</a>
                                </li>
                            <?php endif; ?>
                            <?php if(auth()->user()->role == 'owner'): ?>
                                <li>
                                    <a href="/data-transaksi">Data Transaksi</a>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <ul class="navv navbarr-nav Contactt">
                            <?php if(Route::has('login')): ?>
                                <?php if(auth()->guard()->check()): ?>
                                <li class="signn"><a href="/logout"><i class="fas fa-sign-out-alt fa"></i><span class="logout"><?php echo e(auth()->user()->username); ?></span> </a></li>
                                <?php else: ?>
                                <li class="signn"><a href="/login"><i class="fa fa-lock"></i>Login</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>

                    </div>

                </nav><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/layouts/__header.blade.php ENDPATH**/ ?>