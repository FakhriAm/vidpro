<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Upload Video</h1>
<!-- Video History Card -->
  <div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#video_metadata" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-gray-800">Video History</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="video_metadata">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Video Title</th>
                <th>Journalist</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Video Category</th>
                <th>Video Tag</th>
                <th>Uploaded by</th>
                <th>Submitted Date</th>
                <th>Options</th>  
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Thumbnail</th>
                <th>Video Title</th>
                <th>Journalist</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Video Category</th>
                <th>Video Tag</th>
                <th>Uploaded by</th>
                <th>Submitted Date</th>
                <th>Options</th>
              </tr>
            </tfoot>
            <tbody>
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
                   <?php echo $filter_category;?>
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