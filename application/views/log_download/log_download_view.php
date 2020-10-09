<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Page Heading -->
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
                    <h6 class="m-0 font-weight-bold text-gray-800">Video Download History</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="video_metadata">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>User Name</th>
                                        <th>Company</th>
                                        <th>Source by</th>
                                        <th>Ket.</th>
                                        <!-- <th>Video Type</th>
              <th>Video Price</th>
              <th>Approved Date</th>   -->
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <!-- <td><img src="<?php echo base_url('asset/img/1.jpg') ?>" class="img-thumbnail"></td> -->
                                        <td>1</td>
                                        <td>Video 1 Title</td>
                                        <td>Fakhri Am</td>
                                        <td>CNN IDN</td>
                                        <td>Ani</td>
                                        <td>Trend Saham dikalangan anak kekinian</td>
                                    </tr>
                                    <tr>
                                        <!-- <td><img src="<?php echo base_url('asset/img/1.jpg') ?>" class="img-thumbnail"></td> -->
                                        <td>2</td>
                                        <td>Video Kerusuhan</td>
                                        <td>Dita</td>
                                        <td>TransTV</td>
                                        <td>Soki</td>
                                        <td>Kerusuhan yang terjadi karena rusuh</td>
                                    </tr>
                                    <tr>
                                        <!-- <td><img src="<?php echo base_url('asset/img/1.jpg') ?>" class="img-thumbnail"></td> -->
                                        <td>3</td>
                                        <td>Video Ikan Hiu Tertampar</td>
                                        <td>Suhay</td>
                                        <td>Detik.com</td>
                                        <td>Bimo</td>
                                        <td>Se ekor ikan hiu tertampar di tepi pantai di bali</td>
                                    </tr>
                                    <tr>
                                        <!-- <td><img src="<?php echo base_url('asset/img/1.jpg') ?>" class="img-thumbnail"></td> -->
                                        <td>4</td>
                                        <td>Video Kopi yang bikin tidur</td>
                                        <td>Fakhri Am</td>
                                        <td>CNN IDN</td>
                                        <td>Caka</td>
                                        <td>Kopi nya ga diminum</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>





        </div>

    </section>