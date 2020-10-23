<script type="text/javascript">
    var table;
    $(document).ready(function() {
        table = $('#user_request').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "destroy": true,
            "ajax": {
                "url": "<?php echo site_url('user_request/ajax_list') ?>",
                "type": "POST",
                "data": function(data) {}
            },
            "dom": 'lfBrtip',
            "buttons": ['excel', 'print'],
            "columnDefs": [{
                "targets": [],
                "orderable": false
            }],

        });

    });

    function reload_table(){
    table.ajax.reload();
    $("#dataTable").dataTable().fnReloadAjax();
}

function approveRequest(id){
	swal({
	  title: "Are You Sure To Approve This Request?",
	  text: "You Cannot Undo This!",
	  type: "warning",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  showLoaderOnConfirm: true
	}, function (confirm) {
		if(confirm){
			$.ajax({
		        url : "<?php echo site_url('user_request/ajax_approve')?>",
		        type: "POST",
		        data: {id:id},
		        dataType: "JSON",
		        beforeSend: function(){
		                    showLoading("loading","Please wait");
		                },
		        success: function(data){
					if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
					else{
		                showAlert("Done!", "Your Request Will Be Processed.", "success");
		                table.ajax.reload();
		            } 
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		            alert(textStatus); 
		            swal.close();
		            swal.closeModal();
		        },
		        complete: function(){
		            console.log('Approve Request Done');
		        }
		    });
		}
	});
}

function save_modal_rejected(){
	swal({
	  title: "Are You Sure?",
	  text: "This Request Will Be  Rejected!",
	  type: "info",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  showLoaderOnConfirm: true
	}, function (confirm) {
		if(confirm){
			 $.ajax({
		        url : "<?php echo site_url('user_request/ajax_reject_request')?>",
		        type: "POST",
		        data: $('#formrejectrequest').serialize(),
		        dataType: "JSON",
		        beforeSend: function(){
		                    showLoading("loading","Please wait");
		                },
		        success: function(data){
					if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
					else{
		                showAlert("Good job!", "This Request Has Been Rejected!", "success");
		                $('#modal_reject').modal('hide');
		                table.ajax.reload();
		            } 
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		            showAlert('Operation Failed!',errorThrown,'error');
		        },
		        complete: function(){
		            console.log('The Request Reject Done');
		        }
		    });
		}
	});
}

function showModalReject(id){
	document.getElementById('formrejectrequest').reset();
	$('#id').val(id);
	$.ajax({
        url : "<?php echo site_url('user_request/ajax_get_request')?>",
        type: "POST",
        data: {id:id},
        dataType: "JSON",
        beforeSend: function(){
                    showLoading("loading","Please wait");
                },
        success: function(data){
			if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
			else{
				$('[name="id"]').val(data.row.id);
            	$('#modal_reject').modal('show');
            } 
        },
        error: function (jqXHR, textStatus, errorThrown){
            showAlert('Operation Failed!',errorThrown,'error');
        },
        complete: function(){
            console.log('Show data complete');
            swal.close();
        }
    });
}

</script>