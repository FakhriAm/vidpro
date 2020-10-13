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

    </div>

  </section>