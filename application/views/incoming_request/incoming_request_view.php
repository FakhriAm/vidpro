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
            <div class="table-responsive">
              <table class="table table-bordered" id="in_request" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Request Date</th>
                    <th>From</th>
                    <th>Program Name</th>
                    <th>Note's</th>
                    <th>Action</th>
                    <th>Upload Date</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <!-- <td>1</td>
                    <td>10/12/20 - 17:03</td>
                    <td>CNN Indonesia</td>
                    <td>Desi Anwar</td>
                    <td>10 Oktober 2020 Sesi 1</td>
                    <td>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Upload</button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Mark Not Available</button>
                    </td> -->
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="modal fade" id="modal_upload" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">
            <form action="#" id="formuploadmodal" class="form-horizontal" enctype="multipart/form-data">
              <input type="hidden" value="Waiting" id="" name="" />
              <input  type="hidden" value="" id="id" name="id" />
              <div class="form-body">
                <div class="form-group">
                  <label class="control-label col-md-6">Upload Date</label>
                  <div class="col-md-6">
                    <input type="input" id="receive_date" name="receive_date" placeholder='<?php echo date("Y-m-d  H:i:s a"); ?>' disabled>
                    <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-6">Video</label>
                  <div class="col-md-12 mb-12">
                    <input type="file" class="form-control custom-file-input" id="videofile_modal" name="videofile_modal">
                    <label class="custom-file-label" id="label-video" for="customFile">Choose file</label>
                  </div>
                </div>
                
                <input type="hidden" value="Waiting" id="status" name="" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_modal_upload()" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Upload</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal_notfound" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title"></h3>
          </div>
          <div class="modal-body form">
           <span>Apakah Anda yakin video tidak ada ?</span>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="video_not_found()" class="btn btn-danger"><i class="glyphicon glyphicon-check"></i> Yes</button>
            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
          </div>
        </div>
      </div>
    </div>

  </section>