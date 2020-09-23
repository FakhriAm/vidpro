<script type="text/javascript">
var table;
$(document).ready(function() {
  table = $('#dataTable').DataTable({ 
        "processing": true,
        "serverSide": true,
        "order": [],
		"destroy":true,
        "ajax": {
            "url": "<?php echo site_url('history_upload/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {}
        },
        "dom": 'lfBrtip',
        "buttons": ['excel','print'],
        "columnDefs": [{"targets": [ 1,8 ],"orderable": false}]
    });
});
function showModal(id){
	document.getElementById('form-modal').reset();
	$('#id').val(id);
	$.ajax({
        url : "<?php echo site_url('history_upload/ajax_get_detail')?>",
        type: "POST",
        data: {id:id},
        dataType: "JSON",
        beforeSend: function(){
                    showLoading("loading","Please wait");
                },
        success: function(data){
			if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
			else{
				var duration = data.row.duration.split(":");
				$('[name="videotitle"]').val(data.row.video_title);
                $('[name="journo"]').val(data.row.journalist);
                $('[name="desc"]').val(data.row.description);
                $('[name="tag"]').val(data.row.tag);
                $('[name="id_video_category"]').val(data.row.id_video_category);
                $('[name="hour"]').val(parseInt(duration[0]));
                $('[name="minute"]').val(parseInt(duration[1]));
                $('[name="second"]').val(parseInt(duration[2]));
            	$('#content-modal').modal('show');
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
function editData(){
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
		        url : "<?php echo site_url('history_upload/ajax_edit')?>",
		        type: "POST",
		        data: $('#form-modal').serialize(),
		        dataType: "JSON",
		        beforeSend: function(){
		                    showLoading("loading","Please wait");
		                },
		        success: function(data){
					if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
					else{
		                showAlert("Good job!", "Your data has changed!", "success");
		                $('#content-modal').modal('hide');
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
function deleteData(id){
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
		        url : "<?php echo site_url('history_upload/ajax_delete')?>",
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
}
</script>