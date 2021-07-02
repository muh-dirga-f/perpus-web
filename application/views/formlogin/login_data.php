<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>template/backend/sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>template/backend/sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background: url(<?= base_url('assets/bg/bg1.jpg') ?>);background-position: center;background-size: cover;"></div>
                            <div class="col-lg-6">
                                <div class="p-5" style="min-height:570px;">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Login!</h1>
                                    </div>
                                    <form class="form-horizontal" role="form" action="<?php echo site_url('login');?>" method="post">
                                        <?php echo $this->session->flashdata('message');?>
                                        <div class="form-group">
                                            <?php echo form_error('username'); ?>
                                            <input type="text" class="form-control form-control-user"
                                            name="username" id="username" placeholder="Enter Username..." value="<?= set_value('username') ?>">
                                        </div>
                                        <div class="form-group">
                                            <?php echo form_error('password'); ?>
                                            <input type="password" class="form-control form-control-user"
                                            name="password" id="password" placeholder="Password" value="<?= set_value('password') ?>">
                                        </div>
                                        <button type="submit" name="proses" class="btn btn-success btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>template/backend/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>template/backend/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>template/backend/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>template/backend/sbadmin2/js/sb-admin-2.min.js"></script>

    <script>
        localStorage.clear();
    </script>

</body>

</html>