<!-- Content Wrapper. Contains page content -->
<<<<<<< HEAD
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800">Latest Video <?php if (isset($sumber)) {
                                                            echo "From : $sumber";
                                                          } ?></h1>
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
            <div class="col-sm-3">
              <a style="color:black" href="<?php echo base_url('dashboard/detail?q=') . $key->id_video ?>"><span class="card-title">
                  <?php $thumbnail = 'http://10.11.5.71/thumbnail/' . $key->id_thumbnail;?>

                  <div class="card-body">
                    <div class="row">
                      <!-- <div class="card-body card" style="height: 14rem;"> -->
                      <img src="<?php echo $thumbnail ?>" style="height:10rem; width:40rem; " class="img-fluid" alt="Photo">
                      <!-- <p><?php echo substr($key->description, 0, 20) ?></p> -->
                    </div>
                    <div class="user-block col-sm-12" style="padding-top:10px;">
                      <img class="img-circle" src="<?php echo base_url('asset/img/') . $key->company_img ?>" alt="User Image">
                      <span class="username">
                        <?php echo $key->video_title ?>
                      </span>
                      <span class="description"> <?php echo $key->uploaded_date ?></span>
                    </div>



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
=======
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
       <h1 class="h3 mb-4 text-gray-800">Latest Video</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
        <?php if(isset($data) && sizeof($data) > 0){?>
            <div class="card-header">
            <div class="row">
            <?php foreach ($data as $key) { 
              $thumbnail = 'http://10.11.5.71/thumbnail/'.$key->id_thumbnail;
              ?>
              <div class="col-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $key->video_title?></h3>
                  </div>
                  <div class="card-body card" style="height: 18rem;">
                    <img src="<?php echo $thumbnail?>"  style="height: 14rem;" class="img-thumbnail card">
                    <p><?php echo substr($key->description,0,20)?></p>
                  </div>
                  <div class="card-footer">
                  
                    <a href="<?php echo base_url('video/detail?q=').$key->id_video?>">
                      <button class="btn btn-info float-right btn-sm">
                        <span class="text">
                  View
                </span><span class="icon text-white">
                  <i class="fas fa-chevron-circle-right"></i>
                </span>
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
          <div class="card-footer text-center">
            <a href="">Load More</a>
          </div>
          <?php } else {?>
            <div class="card-body text-center">
             <p>No video found on <?php echo strtolower($title);?>!</p>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
