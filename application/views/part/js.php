<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('asset/template/vendor/jquery/jquery.min.js') ?>"></script>
<!-- <script src="<?php echo base_url('asset/template/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script> -->
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('asset/template/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url('asset/template/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('asset/template/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<!-- Page level custom scripts -->
<script src="<?php echo base_url('asset/template/js/demo/datatables-demo.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('asset/sweetalert/sweetalert.min.js') ?>"></script>
<script src="<?php echo base_url('asset/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asset/AdminLTE/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('asset/AdminLTE/dist/js/demo.js') ?>"></script>
<script src="<?= base_url('asset/amcharts4/core.js') ?>"></script>
<script src="<?= base_url('asset/amcharts4/charts.js') ?>"></script>
<script src="<?= base_url('asset/amcharts4/themes/animated.js') ?>"></script>

<script type="text/javascript">
    function showAlert(title, text, icon) {
        swal(title, text, icon);
    }

    function showLoading(title, text) {
        swal({
            title: title,
            text: text,
            imageUrl: "asset/img/loading.gif",
            showConfirmButton: false,
            allowOutsideClick: false
        });
    }
</script>