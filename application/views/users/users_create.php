<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create User</h1>
<p class="mb-4">
    <?php
        echo validation_errors();
        //buat message nis
        if(!empty($message)) {
        echo $message;
        }
    ?>
</p>

<div class="row">
    <div class="col-lg-12">
        <?php
            //validasi error upload
            if(!empty($error)) {
                echo $error;
            }
        ?>
        <?php echo form_open('users/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Username </p>

                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Full Name </p>

                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" placeholder="Full Name" value="<?php echo set_value('full_name'); ?>">
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Password </p>

                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
                </div>
            </div>

            

            
            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="btn-group float-left">
                        <?php echo anchor('users', 'Cancel', array('class' => 'btn btn-danger btn-sm')); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group float-right">
                        <input type="submit" name="save" value="Save" class="btn btn-success btn-sm">
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <!-- /.col-lg-12 -->
</div>