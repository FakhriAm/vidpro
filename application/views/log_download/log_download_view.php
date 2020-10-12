<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!-- Page Heading -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800">My Request List</h1>
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
                    <h6 class="m-0 font-weight-bold text-gray-800">My Request History</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="video_metadata">
                    <div class="card-body">
                        <div class="col-xl-2 col-md-2 mb-2">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_request"><i class="fa fa-plus-square"></i> Form Request</button>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Request Date</th>
                                        <th>Request To</th>
                                        <th>Program Name</th>
                                        <th>Note's</th>

                                        <th>Status</th>
                                        <th>Receive Date</th>
                                        <!-- <th>Video Type</th>
              <th>Video Price</th>
              <th>Approved Date</th>   -->
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <!-- <td><img src="<?php echo base_url('asset/img/1.jpg') ?>" class="img-thumbnail"></td> -->
                                        <td>1</td>
                                        <td>10/12/20 - 17:03</td>
                                        <td>Trans Tv</td>
                                        <td>Desi Anwar</td>
                                        <td>10 Oktober 2020 Sesi 1</td>
                                        <td><button  type="button" class="btn btn-block btn-warning btn-flat" >On-Progress</button></td>
                                        <td>00/00/00 - 00:00</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal_request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                        </div>
                        <div class="modal-body">
                            <p>Some text in the modal.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>




        </div>



    </section>