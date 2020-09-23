		</div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Video Content Provider - CNN Indonesia</span>
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
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('asset/template/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('asset/template/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('asset/template/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('asset/template/js/sb-admin-2.min.js')?>"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url('asset/template/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('asset/template/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('asset/template/js/demo/datatables-demo.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('asset/sweetalert/dist/sweetalert.min.js')?>"></script>
  <script type="text/javascript">
    function showAlert(title,text,icon){
      swal(title, text, icon);
    }
    function showLoading(title,text){
            swal({
              title: title,
              text: text,
              imageUrl: "asset/img/loading4.gif",
              showConfirmButton: false,
              allowOutsideClick: false
            });
        }
  </script>