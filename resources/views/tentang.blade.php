<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang | Dirtless</title>
    {{-- Font Awesome --}}
    <link rel="stylesheet" type="text/css" href="asset/fontawesome/css/all.css"></link>

    {{-- Poppins Font Family --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@600&display=swap" rel="stylesheet">
    {{-- Css nya --}}
    <link rel="stylesheet" href="asset/landing/css/style.css">
    <link rel="icon" href="asset/img/icon.svg">
</head>
<style>
.main{

  margin-top: 6vh;
}

.footer .mediaa h2
{
    font-weight: 600;
    margin-bottom: 8px;
    margin-left: 6px;
    font-size: 16px;
    font-family:'Poppins', sans-serif;
    font-style: normal;
    color: #eaeaea;
}

.footer .mediaa .social{
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0;
  width: 186px;
  height: 70px;
  border: 3px solid #FDE672;
    border-radius: 10px;
    box-shadow: inset -3px -3px 4px 0px rgba(0, 0, 0, 0.02),
     -1px -1px 3px 0px rgba(255, 255, 255, 0.075),
      inset 3px 3px 6px 0px rgba(0, 0, 0, 0.06),
       inset 2px 2px 3px 0px rgba(0, 0, 0, 0.07),
        1px 2px 3px 2px rgba(0, 0, 0, 0.10);


}

.footer .mediaa .social div{
  margin: 0 6px;
  width: 45px;
  height: 45px;
  background:#FDE672;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 8px;
  box-shadow:2px 2px 3px rgba(0, 0, 0, 0.205),
           -3px -3px 3px rgba(255, 255, 255, 0.089);
        

}

.footer .mediaa .social div:hover
{
  box-shadow:inset 2px 2px 4px rgba(0, 0, 0, 0.205),
                  -3px -3px 3px rgba(255, 255, 255, 0.089);

}

.footer .mediaa .social div a
{
  color: #008EFF;
  font-size: 19px;
}
</style>
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
                        <h1>Tentang <span>Aplikasi Pengelolaan Laundry</span>
                        </h1>
                        <p>Aplikasi pengelolaan laundry ini dibuat agar memudahkan pemilik jasa laundry mengelola data pesanannya. <br>
                        Aplikasi ini dibuat oleh Aditya Fakhri Riansyah dari SMKN 2 Sukabumi kelas XII Rekayasa Perangkat Lunak 2. Dibangun untuk memenuhi Uji Kompetensi Keahlian di SMKN 2 Sukabumi tahun 2020.
                        </p>
                    </div>
                    <div class="image">
                        <img src="asset/landing/img/tentang.svg" alt="landing.svg">
                    </div>
                </div>

                <div class="footer" style="margin-top: -14px;">
                    <div class="mediaa">
                        <h2>Ikuti Saya</h2>
                        <div class="social">
                        <div><a href="https://www.instagram.com/adityafakhriansyah/"><i class="fab fa-instagram"></i> </a></div>
                        <div><a href="https://dribbble.com/adityafakhrii"><i class="fab fa-dribbble"></i></a></div>
                        <div><a href="https://github.com/adityafakhrii"><i class="fab fa-github"></i></a></div>
                        </div>
                    </div>
                    <br>
                    <br>
                    
                    <div class="media">
                        <h2>Uji Kompetensi Keahlian SMKN 2 Sukabumi</h2>
                        <h2>Made with <i class="fas fa-heart"></i> by Aditya Fakhri Riansyah - XII RPL 2</h2>
                    </div>
                </div>

            </div>
        </div>


    </section>
    <script src="asset/landing/js/jquery.js"></script>
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