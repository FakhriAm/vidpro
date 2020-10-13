<script type="text/javascript">
var table;
$(document).ready(function() {
  table = $('#dataTable').DataTable({ 
        "processing": true,
        "serverSide": true,
        "order": [],
		"destroy":true,
        "ajax": {
            "url": "<?php echo site_url('approval_video/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {}
        },
        "dom": 'lfBrtip',
        "buttons": ['excel','print'],
        "columnDefs": [{"targets": [ 1,8 ],"orderable": false}]
    });
});
function approveData(id){
	swal({
	  title: "Are you sure?",
	  text: "Your data will be approved!",
	  type: "info",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  showLoaderOnConfirm: true
	}, function (confirm) {
		if(confirm){
			 $.ajax({
		        url : "<?php echo site_url('approval_video/ajax_approve')?>",
		        type: "POST",
		        data: {id: id},
		        dataType: "JSON",
		        beforeSend: function(){
		                    showLoading("loading","Please wait");
		                },
		        success: function(data){
					if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
					else{
		                showAlert("Good job!", "Your data approved!", "success");
		                table.ajax.reload();
		            } 
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		            showAlert('Operation Failed!',errorThrown,'error');
		        },
		        complete: function(){
		            console.log('approved job done');
		        }
		    });
		}
	});
}
function rejectData(id){
	swal({
	  title: "Are you sure?",
	  text: "Your data will be rejected!",
	  type: "warning",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  showLoaderOnConfirm: true
	}, function (confirm) {
		if(confirm){
			 $.ajax({
		        url : "<?php echo site_url('approval_video/ajax_reject')?>",
		        type: "POST",
		        data: {id: id},
		        dataType: "JSON",
		        beforeSend: function(){
		                    showLoading("loading","Please wait");
		                },
		        success: function(data){
					if(!data.status) showAlert('Failed!',data.message.toString().replace(/<[^>]*>/g, ''),'error');
					else{
		                showAlert("Good job!", "Your data has rejected!", "success");
		                table.ajax.reload();
		            } 
		        },
		        error: function (jqXHR, textStatus, errorThrown){
		            showAlert('Operation Failed!',errorThrown,'error');
		        },
		        complete: function(){
		            console.log('reject job done');
		        }
		    });
		}
	});
}
</script>