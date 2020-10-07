<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <?php foreach($video_category as $key){
        $content = strtolower($key->content);
        $link = 'video/category/'.$content;?>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url($link)?>" class="nav-link"><?php echo ucfirst($content);?></a>
        </li>
      <?php } ?> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-12" action="<?php echo base_url('video/search')?>" method="get">
      <div class="input-group input-group-md-12">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="q">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <!-- Sebelum Sign In -->
    <!-- <ul class="navbar-nav ml-auto">
      <li>
        <button class="btn btn-danger">
          Sign In
        </button>
      </li>
    </ul> -->

    <!-- Setelah Sign In -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600">Fakhri Ammarrizky</span>
          <img class="navbar-toggler-icon rounded-circle" src="<?php echo base_url('asset/img/trans.png')?>">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url('video/user_profile') ?>">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
          </a>
          <a class="dropdown-item" href="#">
            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
          </a>
          <!-- <a class="dropdown-item" href="#">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
          </a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url('auth') ?>">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->