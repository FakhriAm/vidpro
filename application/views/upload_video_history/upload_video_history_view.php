<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800">Incoming Request</h1>
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
          <h6 class="m-0 font-weight-bold text-gray-800">Incoming Request</h6>
        </a>

        <!-- Card Content - Collapse -->
        <div class="collapse show" id="video_metadata">
          <div class="card-body">
            <!-- Content Row -->
            <div class="row">

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">New Request Today</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-arrow-alt-circle-up fa-2x text-gray-300"></i>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Request</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">14</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-arrow-alt-circle-down fa-2x text-gray-300"></i>
                        <!-- <i class="fas fa-arrow-alt-circle-down"></i> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Content Row -->
            <div class="table-responsive">
              <table class="table table-bordered" id="x" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Request Date</th>
                    <th>From</th>
                    
                    <th>Program Name</th>
                    <th>Note's</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <!-- <td><img src="<?php echo base_url('asset/img/1.jpg') ?>" class="img-thumbnail"></td> -->
                    <td>1</td>
                    <td>10/12/20 - 17:03</td>
                    <td>CNN Indonesia</td>
                    
                    <td>Desi Anwar</td>
                    <td>10 Oktober 2020 Sesi 1</td>

                    <td>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Upload</button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Mark Not Available</button>
                    </td>
                  </tr>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="content-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Video</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" id="form-modal">
                <input type="hidden" id="id" name="id">
                <div class="form-group">
                  <div class="row">
                    <label class="label col-2 text-right">Video Title</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control form-control-user" placeholder="Enter Video Title" name="videotitle">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="label col-2 text-right">Journalist</label>
                    <div class="col-md-9">
                      <input type="text" class="form-control form-control-user" placeholder="Enter Journalist Name" name="journo">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="label col-2 text-right">Description</label>
                    <div class="col-md-9">
                      <textarea class="form-control form-control-user" placeholder="Enter Video Description" name="desc"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="label col-2 text-right">Duration</label>
                    <div class="col-md-3">
                      <input class="form-control" id='hour' name='hour' type='number' min='0' max='99' placeholder="Hour">
                    </div>
                    <div class="col-md-3">
                      <input class="form-control" id='minute' name='minute' type='number' min='0' max='59' placeholder="Minute">
                    </div>
                    <div class="col-md-3">
                      <input class="form-control" id='second' name='second' name='second' type='number' min='0' max='59' placeholder="Second">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="label col-2 text-right">Video category</label>
                    <div class="col-md-9">
                      <?php echo $filter_category; ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="label col-2 text-right">Video tag</label>
                    <div class="col-md-9">
                      <textarea class="form-control form-control-user" placeholder="ex: Pemerintah,Politik,Nama Tokoh,Jakarta" name="tag"></textarea>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="#" onclick="editData()">Submit</a>
            </div>
          </div>
        </div>
      </div>





    </div>

  </section>