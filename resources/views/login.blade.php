<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login | Dirtless</title>
    <link rel="stylesheet" type="text/css" href="asset/login/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="asset/fontawesome/css/all.css"></link>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="asset/img/icon.svg">
</head>
<body>
    <img class="wave" src="asset/login/img/wave.png" alt="bg.png">
    <div class="container">
        <div class="img">
            <img src="asset/login/img/bg6.svg" alt="">
        </div>
        <div class="login-container">
            <form action="/do_login" method="POST">
                @csrf
                <img class="avatar" src="asset/login/img/avatar.svg" alt="avatar.svg">
                <h2>Selamat datang</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5 class="placehorder">Username</h5>
                        <input class="input" type="text" name="username" autocomplete="off">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5 class="placeholder">Password</h5>
                        <input class="input" type="password" name="password" autocomplete="off">
                    </div>
                </div>
                <a href="/">< Kembali ke home</a>
                <input type="submit" class="btn" value="Login">
                @if(Session::has('fail'))
                <div class="fail">
                    <p>Login gagal ! <span> Username</span> atau <span>Password</span> <br>yang anda masukkan salah</p> 
                </div>
                @endif
            </form>
        </div>
    </div>
    <div class="follow">
        <p>Uji Kompetensi Keahlian SMKN 2 Sukabumi</p>
        <p>Made with <i class="fas fa-heart"></i> by Aditya Fakhri Riansyah - XII RPL 2</p>
    </div>
    <script type="text/javascript" src="asset/login/js/main.js"></script>
</body>
</html>