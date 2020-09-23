<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<h1 class="h3 mb-4 text-gray-800">Video List</h1>
<!-- Video List Card -->
<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#video_metadata" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold text-gray-800">Video List</h6>
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
              <th>Description</th>
              <th>Duration</th>
              <th>Uploaded by</th>
              <th>Price added by</th>
              <th>Video Type</th>
              <th>Video Price</th>
              <th>Option</th>  
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Thumbnail</th>
              <th>Video Title</th>
              <th>Description</th>
              <th>Duration</th>
              <th>Uploaded by</th>
              <th>Price added by</th>
              <th>Video Type</th>
              <th>Video Price</th>
              <th>Option</th>
            </tr>
          </tfoot>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>