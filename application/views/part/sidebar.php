<!-- Sidebar -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('dashboard') ?>" class="brand-link elevation-4">
    <img src="<?php echo base_url('asset/img/trans.png') ?>" alt="CNN Indonesia" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-lighter">Video Provider</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <!-- <i class="nav-icon fas fa-copy"></i> -->
            <i class="nav-icon far fa-folder-open"></i>
            <p>
              User Menu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <!-- <ul class="nav nav-treeview">
            <?php if (isset($menu) && sizeof($menu) > 0) {
              foreach ($menu as $key) {
            ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url($key->link) ?>">
                    <i class="nav-icon <?php echo $key->icon ?>"></i>
                    <span><?php echo $key->content ?></span></a>
                  </a>
                </li>
            <?php }
            } ?>
          </ul> -->

          <ul class="nav nav-treeview">
              <?php foreach($menu as $key){
                $content = strtolower($key->content);
                $link = str_replace(" ","_",$content);?>
                <li class="nav-item">
                <a href="<?php echo base_url($link)?>" class="nav-link">
                <i class="nav-icon <?php echo $key->icon ?>"></i>
                  <p><?php echo ucfirst($content); ?></p>
                </a>
              </li>
              <?php } ?>
            </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <!-- <i class="nav-icon fas fa-copy"></i> -->
            <i class="nav-icon fas fa-server"></i>
            <p>
              Source Company
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php foreach ($video_source as $key) {
              $content = $key->content;
              $content_link = strtolower($key->content);
              $content_link = preg_replace('/\s+/', '_', $content_link);
              $link = 'dashboard/source/' . $content_link; ?>
              <li class="nav-item">
                <a href="<?php echo base_url($link) ?>" class="nav-link">
                
                  <p><?php echo ucfirst($content); ?></p>
                </a>
              </li>
            <?php } ?>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- End of Sidebar -->
