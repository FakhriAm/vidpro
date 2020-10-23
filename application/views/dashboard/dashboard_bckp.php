<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800">Latest Video <?php if(isset($sumber)){echo "From: $sumber" ;}?></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card">
      <?php if (isset($data) && sizeof($data) > 0) { ?>

        <div class="row">
          <?php foreach ($data as $key) {
          ?>
            <a style="color:black" href="<?php echo base_url('dashboard/detail?q=') . $key->id_video ?>"><span class="card-title">
                <?php $thumbnail = 'http://10.11.5.71/thumbnail/' . $key->id_thumbnail;
                ?>
                <div class="col-3">
                  <div class="card-body">
                  <!-- <div class="card-body card" style="height: 14rem;"> -->
                    <img src="<?php echo $thumbnail ?>" style="height: 9rem; width:30rem; "  class="img-thumbnail card">
                    <!-- <p><?php echo substr($key->description, 0, 20) ?></p> -->
                    <a style="color:black; padding-bottom: 30px; padding-top: -60px;" href="<?php echo base_url('dashboard/detail?q=') . $key->id_video ?>"><span class="card-title"><?php echo substr($key->video_title, 0, 20) ?></span></a>
                    </div>
                  <!-- </div> -->
                </div>
              <?php } ?>
        </div>

        <div class="card-footer text-center">
          <a href="">Load More</a>
        </div>
      <?php } else { ?>
        <div class="card-body text-center">
          <p>No video found on <?php echo strtolower($title); ?>!</p>
        </div>
      <?php } ?>
    </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper