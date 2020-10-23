<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Upload Video</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#video_metadata" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
          <h6 class="m-0 font-weight-bold text-gray-800">Video Metadata</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="video_metadata">
          <div class="card-body">
            <form id="formuploader" enctype="multipart/form-data">
              <div class="form-group">
                <div class="row">
                  <p class="col-2 text-right">Choose Video</p>
                  <div class="col-md-9 mb-3">
                    <input type="file" class="form-control custom-file-input" id="videofile" name="videofile">
                    <label class="custom-file-label" id="label-video" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <p class="col-2 text-right">Choose Video Thumbnail</p>
                  <div class="col-md-9 mb-3">
                    <input type="file" class="form-control custom-file-input" id="imagefile" name="thumbfile">
                    <label class="custom-file-label" id="label-thumb" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Video Title</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Enter Video Title" name="videotitle">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Journalist</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Enter Journalist Name" name="journo">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Description</label>
                  <div class="col-md-9">
                    <textarea class="form-control" placeholder="Enter Video Description" name="desc"></textarea>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Video Category</label>
                  <div class="col-md-9">
                    <?php echo $filter_category; ?>
                  </div>
                </div>
              </div>
            </form>
            <div class="button-footer">
              <button type="button" class="btn btn-info float-right" onclick="save()">
                Submit
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>