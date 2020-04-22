<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dirtless | Aplikasi Laundry</title>
    {{-- Font Awesome --}}

    <link rel="stylesheet" type="text/css" href="{{asset('asset/fontawesome/css/all.css')}}"></link>
	<link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}" crossorigin="anonymous">
	{{-- <link rel="stylesheet" href="{{asset('asset/css/content/style.css')}}"> --}}

    {{-- Poppins Font Family --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@600&display=swap" rel="stylesheet">
    {{-- Css nya --}}
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <link rel="icon" href="{{asset('asset/img/icon.svg')}}">
</head>
<body>
    <div class="sectionss">
        
        <div class="containerr">
            

                @include('layouts.__header')

                <div class="mainn">
                    <div class="contentt">
                    	@yield('content')
                    </div>
                </div>

                <div class="footerr">
                    <div class="mediaa">
                        <h2>Uji Kompetensi Keahlian SMKN 2 Sukabumi</h2>
                        <h2>Made with <i class="fas fa-heart"></i> by Aditya Fakhri Riansyah - XII RPL 2</h2>
                    </div>
                </div>

            
        </div>
	
    </div>
    <script src="{{asset('asset/js/jquery.js')}}"></script>
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