<aside>
      <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->

        <ul class="sidebar-menu" id="nav-accordion" style="display: block;">
          <p class="centered"><img src="<?php echo e(asset('asset/img/admin.png')); ?>" class="img-circle" width="80"></p>
          <h5 class="centered"><?php echo e(auth()->user()->nama); ?></h5>
          <br>
          <li class="sub-menu">
            <a href="/kasir">Data Kasir</a>
          </li>
          <li class="sub-menu">
            <a href="/pelanggan">Data Pelanggan</a>
          </li>
          <li class="sub-menu">
            <a href="/outlet">Data Outlet</a>
          </li>
          <li class="sub-menu">
            <a href="/logout">Logout</a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside><?php /**PATH C:\xampp\htdocs\laundry-ujikom\resources\views/layouts/__sidebar.blade.php ENDPATH**/ ?>