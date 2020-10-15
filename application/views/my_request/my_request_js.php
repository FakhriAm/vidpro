<script type="text/javascript">
    var table;
    $(document).ready(function() {
        table = $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "destroy": true,
            "ajax": {
                "url": "<?php echo site_url('my_request/ajax_list') ?>",
                "type": "POST",
                "data": function(data) {}
            },
            "dom": 'lfBrtip',
            "buttons": ['excel', 'print'],
            "columnDefs": [{
                "targets": [],
                "orderable": false
            }],
            "columnDefs": [
                //hide the second & fourth column
                {
                    'visible': false,
                    'targets': [3]
                }
            ]
        });

    });

    function reload_table(){
    table.ajax.reload();
    $("#dataTable").dataTable().fnReloadAjax();
}

    function save(){
    $('#btnSave').text('saving...');
    $('#btnSave').attr('disabled',true); 
    var url = "<?php echo site_url('my_request/ajax_add')?>";
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data){
			if(data.status == false) alert(data.message);
			else{
				$('#modal_form').modal('hide');
                table.ajax.reload();
			}
            $('#btnSave').text('save');
            $('#btnSave').attr('disabled',false);
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error adding / update data');
            $('#btnSave').text('save');
            $('#btnSave').attr('disabled',false); 
        }
    });
}

</script>