<script type="text/javascript">
var table;
$(document).ready(function() {
  table = $('#in_request').DataTable({ 
        "processing": true,
        "serverSide": true,
        "order": [],
		"destroy":true,
        "ajax": {
            "url": "<?php echo site_url('incoming_request/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {}
        },
        "dom": 'lfBrtip',
        "buttons": ['excel','print']
    });
	  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
	//$("#upload_num").html('2');
});
function save_modal_upload(){
var formData = new FormData($("#formuploadmodal")[0]);
    $.ajax({
        url : "<?php echo site_url('upload_video/ajax_savevideo_modal')?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        beforeSend: function(){
                    showLoading("Uploading...","It takes several minutes");
                },
        success: function(data){
			/* if(!data.status)alert("ho"); */
			if(!data.status)showAlert('Failed to upload',data.message.toString().replace(/<[^>]*>/g, ''),'error');
			else{				
                $('#label-video-modal').html('Choose file');
                document.getElementById('formuploadmodal').reset();
                showAlert("Good job!", "Video uploaded!", "success");
				location.reload();
            } 
        },
        error: function (jqXHR, textStatus, errorThrown){
            showAlert('Operation Failed!',errorThrown,'error');
        },
        complete: function(){
            console.log('Uploading job done');
        }
    }); 
}

function video_not_found(){
 
}

function showModal(id){
	document.getElementById('formuploadmodal').reset();
	$('#id').val(id);
	$('#modal_upload').modal('show');
}

function showModalnotfound(id){
	// document.getElementById('formuploadmodalnotfound').reset();
	$('#id').val(id);
	$('#modal_notfound').modal('show');
}
</script>