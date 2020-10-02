<style>
    .image-container {
        position: relative;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .image-container:hover .image {
        opacity: 0.3;
    }

    .image-container:hover .middle {
        opacity: 1;
    }
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Profile</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <div class="card-body">
                                <div class="card-title mb-4">
                                    <div class="d-flex justify-content-start">
                                        <div class="image-container">
                                            <img src="<?php echo base_url('asset/template/img/trans.png') ?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                            <div class="middle">
                                                <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                                <input type="file" style="display: none;" id="profilePicture" name="file" />
                                            </div>
                                        </div>
                                        <div class="userData ml-3">
                                            <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">Fakhri Ammarrizky</a></h2>
                                            <h6 class="d-block"><a href="javascript:void(0)">1,500</a> Video Uploads</h6>
                                            <h6 class="d-block"><a href="javascript:void(0)">300</a> Video Downloads</h6>
                                        </div>
                                        <div class="ml-auto">
                                            <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Change Password</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content ml-1" id="myTabContent">
                                            <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Full Name</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        Fakhri Ammarrizky
                                                    </div>
                                                </div>
                                                <hr />

                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">NIK</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        200271155
                                                    </div>
                                                </div>
                                                <hr />


                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Company</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        CNN Indonesia
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-2 col-5">
                                                        <label style="font-weight:bold;">Div / Dept.</label>
                                                    </div>
                                                    <div class="col-md-8 col-6">
                                                        Business Operation
                                                    </div>
                                                </div>
                                                <hr />
                                                <!-- <div class="row">
                                                        <div class="col-sm-3 col-md-2 col-5">
                                                            <label style="font-weight:bold;">Something</label>
                                                        </div>
                                                        <div class="col-md-8 col-6">
                                                            Something
                                                        </div>
                                                    </div> -->


                                            </div>
                                            <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                                    <div class="row">
                                                        <div class="col-sm-3 col-md-2 col-5">
                                                            <label style="font-weight:bold;">Old Password</label>
                                                        </div>
                                                        <div class="col-md-8 col-6">
                                                            <input class="input100" type="password" name="oldpass" placeholder="">
                                                        </div>
                                                    </div>
                                                    <hr />

                                                    <div class="row">
                                                        <div class="col-sm-3 col-md-2 col-5">
                                                            <label style="font-weight:bold;">New Password</label>
                                                        </div>
                                                        <div class="col-md-8 col-6">
                                                            <input class="input100" type="password" name="newpass" placeholder="">
                                                        </div>
                                                    </div>
                                                    <hr />


                                                    <div class="row">
                                                        <div class="col-sm-3 col-md-2 col-5">
                                                            <label style="font-weight:bold;">Re-Enter Passowrd</label>
                                                        </div>
                                                        <div class="col-md-8 col-6">
                                                            <input class="input100" type="password" name="repass" placeholder="">
                                                        </div>
                                                    </div>
                                                    <hr />

                                                    <button href="#" id="btn-login" class="login100-form-btn">
                                                       Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</section>

<script>
    $(document).ready(function() {
        $imgSrc = $('#imgProfile').attr('src');

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imgProfile').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#btnChangePicture').on('click', function() {
            // document.getElementById('profilePicture').click();
            if (!$('#btnChangePicture').hasClass('changing')) {
                $('#profilePicture').click();
            } else {
                // change
            }
        });
        $('#profilePicture').on('change', function() {
            readURL(this);
            $('#btnChangePicture').addClass('changing');
            $('#btnChangePicture').attr('value', 'Confirm');
            $('#btnDiscard').removeClass('d-none');
            // $('#imgProfile').attr('src', '');
        });
        $('#btnDiscard').on('click', function() {
            // if ($('#btnDiscard').hasClass('d-none')) {
            $('#btnChangePicture').removeClass('changing');
            $('#btnChangePicture').attr('value', 'Change');
            $('#btnDiscard').addClass('d-none');
            $('#imgProfile').attr('src', $imgSrc);
            $('#profilePicture').val('');
            // }
        });
    });
</script>


<!-- /.content-wrapper

             <!-- <div class="row">
                    <div class="col-md-6">

                      
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('asset/img/trans.png') ?>" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">Fakhri Ammarrizky</h3>

                               

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Username : </b> <a class="float-right">Fakhri Ammarrizky</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NIK :</b> <a class="float-right">200271154</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Company :</b> <a class="float-right">CNN Indonesia</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Div / Dept :</b> <a class="float-right">Business Operation</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-warning btn-block"><b>Change Password</b></a>
                            </div>
                            
                        </div>
                    </div> 


                    
                </div> -->