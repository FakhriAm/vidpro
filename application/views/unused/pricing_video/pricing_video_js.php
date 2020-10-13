<script type="text/javascript">
var table;
$(document).ready(function() {
  table = $('#dataTable').DataTable({ 
        "processing": true,
        "serverSide": true,
        "order": [],
		"destroy":true,
        "ajax": {
            "url": "<?php echo site_url('pricing_video/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {}
        },
        "dom": 'lfBrtip',
        "buttons": ['excel','print'],
        "columnDefs": [{"targets": [ 1,8 ],"orderable": false}]
    });
});
function editData(id,row){
	swal({
	  title: "Are you sure?",
	  text: "Your data will be changed!",
	  type: "info",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  showLoaderOnConfirm: true
	}, function (confirm) {
		if(confirm){
			 $.ajax({
		        url : "<?php echo site_url('pricing_video/ajax_edit')?>",
		        type: "POST",
		        data: {id: id, id_video_type: $('#id_video_type_'+row).val(), id_video_price:$('#id_video_price_'+row).val()},
		        dataType: "JSON",
		        beforeSend: function(){
		                    showLoading("loading","Please wait");
		                },
		        success: function(data){
					if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
					else{
		                showAlert("Good job!", "Your data has changed!", "success");
		                //$('#content-modal').modal('hide');
		                table.ajax.reload();
		            } 
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		            showAlert('Operation Failed!',errorThrown,'error');
		        },
		        complete: function(){
		            console.log('Edit job done');
		        }
		    });
		}
	});
}
/*function deleteData(id){
	swal({
	  title: "Are you sure?",
	  text: "Your will not be able to recover this data!",
	  type: "warning",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  showLoaderOnConfirm: true
	}, function (confirm) {
		if(confirm){
			$.ajax({
		        url : "<?php echo site_url('pricing_video/ajax_delete')?>",
		        type: "POST",
		        data: {id:id},
		        dataType: "JSON",
		        beforeSend: function(){
		                    showLoading("loading","Please wait");
		                },
		        success: function(data){
					if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
					else{
		                showAlert("Deleted!", "Your data has been deleted.", "success");
		                table.ajax.reload();
		            } 
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		            alert(textStatus); 
		            swal.close();
		            swal.closeModal();
		        },
		        complete: function(){
		            console.log('delete job done');
		        }
		    });
		}
	});
}*/
function submitAlert(id,row){
	alert($('#id_video_type_'+row).val()+' '+$('#id_video_price_'+row).val());
}
</script>