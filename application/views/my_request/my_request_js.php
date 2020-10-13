<script src="<?php echo base_url('asset/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>"></script>
<script src="<?php echo base_url('asset/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo base_url('asset/bootstrap-datepicker/js/dataTables.buttons.min.js') ?>"></script>
<script type="text/javascript">
    var table;
    $(document).ready(function() {
        initDataTable();
        $('#btn-filter').click(function() {
            table.ajax.reload();
        });
        $('#btn-reset').click(function() {
            $('#form-filter')[0].reset();
            table.ajax.reload();
        });

        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        $("#userfile").change(function() {
            filePreview(this);
        });
    });

    function initDataTable() {
        table = $('#request_list_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "destroy": true,
            "ajax": {
                "url": "<?php echo site_url('log_download/ajax_list') ?>",
                "type": "POST",
                "data": function(data) {
                    data.name = $('#name').val();
                }
            },
            "dom": 'lfBrtip',
            "buttons": ['excel', 'print'],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],

        });
    }

    
</script>