<script type="text/javascript">
$(document).ready(function() {
    // Add the following code if you want the name of the file appear on select
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
});
function save(){
var formData = new FormData($("#formuploader")[0]);
    $.ajax({
        url : "<?php echo site_url('upload_video/ajax_savevideo')?>",
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
                $('#label-video').html('Choose file');
                $('#label-thumb').html('Choose file');
                document.getElementById('formuploader').reset();
                showAlert("Good job!", "Video uploaded!", "success");
				
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
</script>