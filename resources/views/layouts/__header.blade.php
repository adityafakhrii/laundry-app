                <nav class="navbarr">

                    <div class="headerr">

                        <div class="navbarr-header">
                            <a href="/" class="logoo">
                                <img src="{{asset('asset/img/logo.svg')}}" alt="logo.svg">
                                <span>Dirtless</span> 
                            </a>
                        </div>

                        <div class="m_button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <ul class="navv navbarr-nav utama">
                            @auth
                            <li><a href="/dashboard">Dashboard</a></li>
                            @endauth
                            @if(auth()->user()->role == 'kasir')
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
                            @endif
                            @if(auth()->user()->role == 'admin')
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
                            @endif
                            @if(auth()->user()->role == 'super_admin')
                                <li>
                                    <a href="/admin">Admin</a>
                                </li>
                                <li>
                                    <a href="/owner">Owner</a>
                                </li>
                                <li>
                                    <a href="/outlet">Outlet</a>
                                </li>
                            @endif
                            @if(auth()->user()->role == 'owner')
                                <li>
                                    <a href="/data-transaksi">Data Transaksi</a>
                                </li>
                            @endif
                        </ul>

                        <ul class="navv navbarr-nav Contactt">
                            @if (Route::has('login'))
                                @auth
                                <li class="signn"><a href="/logout"><i class="fas fa-sign-out-alt fa"></i><span class="logout">{{auth()->user()->username}}</span> </a></li>
                                @else
                                <li class="signn"><a href="/login"><i class="fa fa-lock"></i>Login</a></li>
                                @endauth
                            @endif
                        </ul>

                    </div>

                </nav>