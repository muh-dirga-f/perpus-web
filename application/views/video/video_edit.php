<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Video</h1>
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
    <div class="col-lg-12 col-md-12">
        <?php
            //validasi error upload
            if(!empty($error)) {
                echo $error;
            }
        ?>
        <?php echo form_open_multipart('video/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Kode Video </p>

                <div class="col-sm-10">
                    <input type="text" name="kode_video" class="form-control" placeholder="Kode video" value="<?php echo $edit['kode_video']; ?>" readonly="readonly">
                </div>
            </div>
            <?php $kategori =  $this->db->get('kategori_video')->result_array(); ?>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Kategori Video </p>
                <div class="col-sm-10">
                    <select name="kategori_video" id="kategori_video" class="form-control">
                        <?php foreach ($kategori as $kat) : ?>
                        <option <?php if($edit['kategori_video'] === $kat['id_kategori_video']) echo "selected"; ?> value="<?= $kat['id_kategori_video']; ?>"><?= $kat['nama_kategori_video']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Judul </p>

                <div class="col-sm-10">
                    <input type="text" name="judul" class="form-control" placeholder="Judul video" 
                    value="<?php echo $edit['judul']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Pembuat </p>

                <div class="col-sm-10">
                    <input type="text" name="pembuat" class="form-control" placeholder="pembuat" value="<?php echo $edit['pembuat']; ?>">
                </div>
            </div>


            <div class="form-group row">
                <p class="col-sm-2 text-left">Image</p>

                <div class="col-sm-10">
                    <?php if($edit['image'] != '') { ?>
                        <img src="<?php echo base_url('assets/img/video/'.$edit['image']);?>" width="100px" height="100px">
                    <?php }else{ ?>
                        <img src="<?php echo base_url('assets/img/video/book-default.jpg');?>" width="100px" height="100px">
                    <?php } ?> <br /><br />
                    <input type="file" name="userfile" class="form-control btn-file"  value="<?php echo set_value('userfile'); ?>" accept=".png,.jpg">
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-2 text-left">File</p>
                <div class="col-sm-10">
                    <?php if($edit['file'] != '') { ?>
                        <embed src="<?php echo base_url('assets/video/'.$edit['file']);?>" type="application/pdf" width="100%" height="500px">
                    <?php } ?> <br /><br />
                    <input type="file" name="file" class="form-control btn-file"  value="<?php echo set_value('ebook'); ?>" accept=".mp4">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6">
                    <div class="btn-group float-left">
                        <?php echo anchor('video', 'Cancel', array('class' => 'btn btn-danger btn-sm')); ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group float-right">
                        <input type="submit" name="update" value="Update" class="btn btn-success btn-sm">
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <!-- /.col-lg-12 -->
</div>