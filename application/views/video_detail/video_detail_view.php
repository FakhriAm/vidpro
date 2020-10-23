<!--Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Video Detail</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
<<<<<<< HEAD
     


      <!-- bates -->

      <div class="card">
=======

      <!-- <div class="card-header">
          <div class="card-title">
            <h5 class="m-0 font-weight-bold">Video Information</h5>
          </div>
        </div> -->
      <div class="card-body">





        <!-- <div class="row">

            <div class="col-10">
              <a href="<?php echo base_url('video/downloadVideo?link=' . $link) ?>">
                <button class="btn btn-primary float-right btn-icon-split">
                  <span class="icon text-white">
                    <i class="fas fa-download"></i>
                  </span>
                  <span class="text">
                    Download
                  </span>
                </button>
              </a></div>
          </div> -->
        <!-- <h4>Video Description</h4>
          <p></p>
          <hr /> -->
        <div class="card">
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
          <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold">Video Description</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              <div class="row">

                <div class="col-3">
                  <video id="my-player" class="video-js" controls preload="auto" autoplay=false poster="<?php echo $thumbnail ?>" data-setup='{}'>
                    <source src="<?php echo $hls ?>" type="application/x-mpegURL">
                    </source>
                </div>
                <div class="col-6">
                  <div class="row">
                  <h3> <?php echo  $data->video_title ?></h3>
                  </div>
                  <div class="row">
<<<<<<< HEAD
                  <span><?php echo $data->deskripsi_company ?></span>
                  </div>
                  <div class="row">
                  <span> <?php echo $data->first_name,' ', $data->last_name ?></span>
                  </div>
                 
                  <div class="row">
                    <span>Jurnalis : <?php echo $data->journalist ?></span>
=======
                  <span>Source : CNN Indonesia</span>
                  </div>
                  <div class="row">
                    <span>By : <?php echo $data->journalist ?></span>
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
                  </div>
                </div>
              </div>

              <hr />
              <div class="row">
                <div class="col-12">
                  <?php echo $data->description ?>
                  <hr />
                </div>
              </div>
<<<<<<< HEAD
              <!-- <div class="row">
=======
              <div class="row">
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
                <div class="col-2">
                  <span class="icon">
                    <i class="fas fa-tags"></i>
                    Tags
                  </span>
                  <span>
                    <?php echo $badge ?>
                  </span>
                </div>
<<<<<<< HEAD
                <div class="col-2">
                  <div class="col-10"><?php echo $badge ?></div>
                </div>
              </div> -->
=======
                <!-- <div class="col-2">
                  <div class="col-10"><?php echo $badge ?></div>
                </div> -->
              </div>
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
            </div>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('video/downloadVideo?link=' . $link) ?>">
              <button class="btn btn-success float-right btn-icon-split">
                <span class="icon text-white">
                  <i class="fas fa-download"></i>
                </span>
                <span class="text">
                  Download
                </span>
              </button>
            </a>
          </div>
        </div>
<<<<<<< HEAD



=======
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper-->
<script type="text/javascript">
<<<<<<< HEAD
  var options = {
    autoplay: 'muted'
  };
=======
  var options = {};

  var player = videojs('my-player', options, function onPlayerReady() {
    videojs.log('Your player is ready!');

    // In this context, `this` is the player that was created by Video.js.
    // this.play();

    // How about an event listener?
    this.on('ended', function() {
      videojs.log('Awww...over so soon?!');
    });
  });
>>>>>>> 108a936ea22636da8d6d1187b7b0ea59dfd2f8dd
</script>