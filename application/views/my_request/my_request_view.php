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
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-square"></i> Form Request</button>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="request_list_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Request Date</th>
                                        <th>Request To</th>
                                        <th>Program Name</th>
                                        <th>Note's</th>
                                        <th>Status</th>
                                        <th>Receive Date</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- <tr>
                                        <td><img src="<?php echo base_url('asset/img/1.jpg') ?>" class="img-thumbnail"></td>
                                        <td>1</td>
                                        <td>10/12/20 - 17:03</td>
                                        <td>Trans Tv</td>
                                        <td>Desi Anwar</td>
                                        <td>10 Oktober 2020 Sesi 1</td>
                                        <td><button type="button" class="btn btn-block btn-warning btn-flat">On-Progress</button></td>
                                        <td>00/00/00 - 00:00</td>
                                    </tr> -->


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal_form" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title"></h3>
                        </div>
                        <div class="modal-body form">
                            <form action="#" id="form" class="form-horizontal">
                                <input type="hidden" value="" id="id_administration_type" name="id_administration_type" />
                                <input type="hidden" value="" id="id" name="id" />
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-6">Request Date</label>
                                        <div class="col-md-6">
                                            <input type="date" id="request_date" name="request_date" placeholder="Date" class="form-control datepicker">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Company Source</label>
                                        <div class="col-md-9">
                                            <?php echo $filter_company; ?>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Program Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="program_name" name="program_name" class="form-control" placeholder="Program Name">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Note's</label>
                                        <div class="col-md-9">
                                            <textarea name="notes" class="form-control" rows="4" placeholder="Note's. ex : Episode's Or Date"></textarea>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary"><i class="glyphicon glyphicon-check"></i> Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
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
    <?php $this->load->view('my_request/my_request_js.php'); ?>