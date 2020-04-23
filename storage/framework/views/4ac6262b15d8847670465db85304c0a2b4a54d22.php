<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dirtless | Aplikasi Laundry</title>
    

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/fontawesome/css/all.css')); ?>"></link>
	<link rel="stylesheet" href="<?php echo e(asset('asset/bootstrap/css/bootstrap.min.css')); ?>" crossorigin="anonymous">
	

    
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('asset/img/icon.svg')); ?>">
</head>
<body>
    <div class="sectionss">
        
        <div class="containerr">
            

                <?php echo $__env->make('layouts.__header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="mainn">
                    <div class="contentt">
                    	<?php echo $__env->yieldContent('content'); ?>
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
    <script src="<?php echo e(asset('asset/js/jquery.js')); ?>"></script>
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
</html><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/layouts/master.blade.php ENDPATH**/ ?>