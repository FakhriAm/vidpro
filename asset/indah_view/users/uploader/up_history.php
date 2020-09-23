<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Upload History</title>

  <link rel="icon" type="image/png" href="../../assets/template/img/cnn-logo.png"/>

  <!-- Custom fonts for this template-->
  <link href="../../assets/template/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../assets/template/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../assets/template/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Upload Video -->
      <li class="nav-item">
        <a class="nav-link" href="up_video.php">
          <i class="fas fa-fw fa-upload"></i>
          <span>Upload Video</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Upload Video History -->
      <li class="nav-item">
        <a class="nav-link" href="up_history.php">
          <i class="fas fa-fw fa-history"></i>
          <span>Upload History</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="../../template/img/cnn-logo.png">
              </a>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

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
                          <th>Thumbnail</th>
                          <th>Video Title</th>
                          <th>Journalist</th>
                          <th>Description</th>
                          <th>Uploaded by</th>
                          <th>Options</th>  
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Thumbnail</th>
                          <th>Video Title</th>
                          <th>Journalist</th>
                          <th>Description</th>
                          <th>Uploaded by</th>
                          <th>Options</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td><img src="../../assets/img/1.jpg" class="img-thumbnail"></td>
                          <td>Video 1 Title</td>
                          <td>Ian</td>
                          <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td>
                          <td>Ani</td>
                          <td>
                            <button class="btn btn-warning btn-icon-split btn-sm" href="#" data-toggle="modal" data-target="#editModal">
                              <span class="icon text-white">
                                <i class="fas fa-edit"></i>
                              </span>
                              <span class="text">
                                Edit
                              </span>
                            </button>
                            <button class="btn btn-danger btn-icon-split btn-sm">
                              <span class="icon text-white">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span class="text">
                                Delete
                              </span>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td><img src="../../assets/img/2.jpg" class="img-thumbnail"></td>
                          <td>Video 2 Title</td>
                          <td>Jessy</td>
                          <td>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td>
                          <td>Budi</td>
                          <td>
                            <button class="btn btn-warning btn-icon-split btn-sm" href="#" data-toggle="modal" data-target="#editModal">
                              <span class="icon text-white">
                                <i class="fas fa-edit"></i>
                              </span>
                              <span class="text">
                                Edit
                              </span>
                            </button>
                            <button class="btn btn-danger btn-icon-split btn-sm">
                              <span class="icon text-white">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span class="text">
                                Delete
                              </span>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td><img src="../../assets/img/3.jpg" class="img-thumbnail"></td>
                          <td>Video 3 Title</td>
                          <td>Kevin</td>
                          <td>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                          <td>Caca</td>
                          <td>
                            <button class="btn btn-warning btn-icon-split btn-sm" href="#" data-toggle="modal" data-target="#editModal">
                              <span class="icon text-white">
                                <i class="fas fa-edit"></i>
                              </span>
                              <span class="text">
                                Edit
                              </span>
                            </button>
                            <button class="btn btn-danger btn-icon-split btn-sm">
                              <span class="icon text-white">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span class="text">
                                Delete
                              </span>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td><img src="../../assets/img/4.jpg" class="img-thumbnail"></td>
                          <td>Video 4 Title</td>
                          <td>Leo</td>
                          <td>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</td>
                          <td>Dudu</td>
                          <td>
                            <button class="btn btn-warning btn-icon-split btn-sm" href="#" data-toggle="modal" data-target="#editModal">
                              <span class="icon text-white">
                                <i class="fas fa-edit"></i>
                              </span>
                              <span class="text">
                                Edit
                              </span>
                            </button>
                            <button class="btn btn-danger btn-icon-split btn-sm">
                              <span class="icon text-white">
                                <i class="fas fa-trash"></i>
                              </span>
                              <span class="text">
                                Delete
                              </span>
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Edit Modal-->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Video Metadata</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <div class="row">
                <label class="label col-3 text-right">Video Title</label>
                <div class="col-md-9">
                  <input type="text" class="form-control form-control-user" placeholder="Enter Video Title">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="label col-3 text-right">Duration</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control form-control-user" placeholder="Enter Video Duration">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="label col-3 text-right">Description</label>
                  <div class="col-md-9">
                    <textarea class="form-control form-control-user" placeholder="Enter Video Description"></textarea>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <label class="label col-3 text-right">Video Url</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control form-control-user" placeholder="Enter Video Url">
                  </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="up_history.php">Save</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../assets/template/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../assets/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../assets/template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../assets/template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../assets/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../assets/template/js/demo/datatables-demo.js"></script>

</body>

</html>