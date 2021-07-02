<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create Kategori Video</h1>
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
        <?php echo form_open_multipart('kategori_video/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

            <div class="form-group row d-none">
                <p class="col-sm-2 text-left">Id Kategori Video </p>

                <div class="col-sm-10">
                    <input type="text" name="id_kategori_video" class="form-control" placeholder="ID" value="0">
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 text-left">Nama Kategori Video </p>

                <div class="col-sm-10">
                    <input type="text" name="nama_kategori_video" class="form-control" placeholder="Nama Kategori Video" value="<?php echo set_value('nama_kategori_video'); ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="btn-group float-left">
                        <?php echo anchor('kategori_video', 'Cancel', array('class' => 'btn btn-danger btn-sm')); ?>
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