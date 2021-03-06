<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800">Upload Video</h1>
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
          <h6 class="m-0 font-weight-bold text-gray-800">User Profile</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="video_metadata">
          <div class="card-body">
            <form id="formuploader" enctype="multipart/form-data">
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Employee NIK</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Employee NIK" name="emp_nik">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Employee Name</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Employee Name" name="emp_name">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Company</label>
                  <div class="col-md-9">
                    <?php echo $filter_category; ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Division</label>
                  <div class="col-md-9">
                    <?php echo $filter_category; ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Department</label>
                  <div class="col-md-9">
                    <?php echo $filter_category; ?>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Employee Phone</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Employee Phone Number < CUG >" name="emp_phone">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Employee Email</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Employee Email" name="emp_email">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <label class="label col-2 text-right">Acces Level</label>
                  <div class="col-md-9">
                    <?php echo $filter_category; ?>
                  </div>
                </div>
              </div>
            </form>
            <div class="button-footer">
              <button type="button" class="btn btn-info btn-right" onclick="save()">
                Submit
              </button>
            </div>
          </div>
        </div>
      </div>
  </section>