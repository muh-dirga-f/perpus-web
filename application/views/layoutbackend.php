<!-- header -->
<?php $this->load->view('includes/header') ?>
<!-- end header -->

        <!-- menu -->
        <?php $this->load->view('includes/menu') ?>
        <!-- end menu -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php $this->load->view('includes/topbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">  
                    <?php echo $contents; ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<!-- footer -->
<?php $this->load->view('includes/footer') ?>
<!-- end footer -->
