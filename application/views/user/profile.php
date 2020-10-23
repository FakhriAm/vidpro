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

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="post">
                        <div class="user-block">
                            <img class="info-box-icon bg-info" src="<?php echo base_url('asset/template/img/trans.png') ?>">
                            <span class="username">
                                <?php echo $this->session->userdata('name') ?>
                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Last Login - <?php echo $this->session->userdata('last_login') ?></span>
                            <hr />
                        </div>
                        <!-- /.user-block -->
                        <!-- <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p> -->

                        <!-- <p>
                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                          
                        </p> -->


                    </div>
                    <strong><i class=""></i> Full Name</strong>

                    <p class="text-muted">
                        <?php echo $this->session->userdata('name') ?>
                    </p>

                    <hr>

                    <strong><i class="" </i> Username</strong> <p class="text-muted">
                            <?php echo $this->session->userdata('username') ?>
                            </p>

                            <hr>

                            <strong><i class=""></i> Company</strong>

                            <p class="text-muted">
                                <?php echo $this->session->userdata('desc_company') ?>
                            </p>

                            <hr>


                </div>
                <!-- /.card-body -->
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