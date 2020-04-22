<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dirtless | Aplikasi Laundry</title>
    {{-- Font Awesome --}}    
    <link rel="stylesheet" type="text/css" href="asset/fontawesome/css/all.css"></link>
    
    {{-- Poppins Font Family --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@600&display=swap" rel="stylesheet">
    {{-- Css nya --}}
    <link rel="stylesheet" href="asset/landing/css/style.css">
    <link rel="icon" href="asset/img/icon.svg">
</head>
<body>
    <section>
        
        <div class="container">
            <div class="caption">

                <nav class="navbar">

                    <div class="header">

                        <div class="navbar-header">
                            <a href="/" class="logo">
                                <img src="asset/landing/img/logo.svg" alt="logo.svg">
                                <span>Dirtless</span> 
                            </a>
                        </div>

                        <div class="m_button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <ul class="nav navbar-nav utama">
                            @auth
                            <li><a href="/dashboard">Dashboard</a></li>
                            @endauth
                            <li><a href="/">Home</a></li>
                            <li><a href="/tentang">Tentang</a></li>
                        </ul>

                        <ul class="nav navbar-nav Contact">
                            @if (Route::has('login'))
                                @auth
                                <li class="sign"><a href="/logout"><i class="fas fa-sign-out-alt fa"></i><span class="logout">{{auth()->user()->username}}</span> </a></li>
                                @else
                                <li class="sign"><a href="/login"><i class="fa fa-lock"></i>Login</a></li>
                                @endauth
                            @endif
                        </ul>

                    </div>

                </nav>

                <div class="main">
                    <div class="content">
                        <h1>Selamat datang di <span>Aplikasi Pengelolaan Laundry</span>
                        </h1>
                        <p>Aplikasi pengelolaan laundry ini dibuat agar memudahkan pemilik jasa laundry mengelola data pesanannya.
                        Dibuat untuk memenuhi Uji Kompetensi Keahlian SMKN 2 Sukabumi</p>
                        <a class="lanjutkan" href="/login">Masuk untuk melanjutkan</a>
                        <a class="selengkapnya" href="/tentang">Selengkapnya . . .</a>
                    </div>
                    <div class="image">
                        <img src="asset/landing/img/bg4.svg" alt="landing.svg">
                    </div>
                </div>

                <div class="footer">
                    <div class="media">
                        <h2>Uji Kompetensi Keahlian SMKN 2 Sukabumi</h2>
                        <h2>Made with <i class="fas fa-heart"></i> by Aditya Fakhri Riansyah - XII RPL 2</h2>
                    </div>
                </div>

            </div>
        </div>


    </section>
    <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script>
        $(".m_button").click(function(){
            $('body').toggleClass("active");
        });

        const btn = document.querySelector('.m_button');
        const nav = document.querySelector('.nav');
        btn.addEventListener('click', ()=>{
            nav.classList.toggle('active');
        })
    </script>
</body>
</html>