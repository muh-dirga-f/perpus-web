<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Edit Buku</h1>
<p class="mb-4">
    <?php
    echo validation_errors();
    //buat message nis
    if (!empty($message)) {
        echo $message;
    }
    ?>
</p>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <?php
        //validasi error upload
        if (!empty($error)) {
            echo $error;
        }
        ?>
        <?php echo form_open_multipart('buku/update', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

        <div class="form-group row">
            <p class="col-sm-2 text-left">Kode Buku </p>

            <div class="col-sm-10">
                <input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku" value="<?php echo $edit['kode_buku']; ?>" readonly="readonly">
            </div>
        </div>
        <?php $kategori =  $this->db->get('kategori_buku')->result_array(); ?>

        <div class="form-group row">
            <p class="col-sm-2 text-left">Kategori Buku </p>
            <div class="col-sm-10">
                <select name="kategori_buku" id="kategori_buku" class="form-control">
                    <?php foreach ($kategori as $kat) : ?>
                        <option <?php if ($edit['kategori_buku'] === $kat['id_kategori_buku']) echo "selected"; ?> value="<?= $kat['id_kategori_buku']; ?>"><?= $kat['nama_kategori_buku']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <p class="col-sm-2 text-left">Judul </p>

            <div class="col-sm-10">
                <input type="text" name="judul" class="form-control" placeholder="Judul Buku" value="<?php echo $edit['judul']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <p class="col-sm-2 text-left">Tahun Terbit </p>

            <div class="col-sm-10">
                <select name="tahun_terbit" id="tahun_terbit" class="form-control">
                <?php
                    $tahun_sekarang = date("Y");
                    for ($i=1990; $i <= $tahun_sekarang; $i++) { 
                ?>
                    <option value="<?= $i ?>" <?php if($edit['tahun_terbit']==$i) echo "selected" ?>><?= $i; ?></option>
                <?php
                    };
                ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <p class="col-sm-2 text-left">Pengarang </p>

            <div class="col-sm-10">
                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="<?php echo $edit['pengarang']; ?>">
            </div>
        </div>


        <div class="form-group row">
            <p class="col-sm-2 text-left">Image</p>

            <div class="col-sm-10">
                <?php if ($edit['image'] != '') { ?>
                    <img src="<?php echo base_url('assets/img/buku/' . $edit['image']); ?>" width="100px" height="100px">
                <?php } else { ?>
                    <img src="<?php echo base_url('assets/img/buku/book-default.jpg'); ?>" width="100px" height="100px">
                <?php } ?> <br /><br />
                <input type="file" name="userfile" class="form-control btn-file" value="<?php echo set_value('userfile'); ?>" accept=".png,.jpg">
            </div>
        </div>

        <div class="form-group row">
            <p class="col-sm-2 text-left">Ebook</p>

            <div class="col-sm-10">
                <?php if ($edit['ebook'] != '') { ?>
                    <embed src="<?php echo base_url('assets/pdf/ebook/' . $edit['ebook']); ?>" type="application/pdf" width="100%" height="500px">
                <?php } ?> <br /><br />
                <input type="file" name="ebook" class="form-control btn-file" value="<?php echo set_value('ebook'); ?>" accept=".pdf">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <div class="btn-group float-left">
                    <?php echo anchor('buku', 'Cancel', array('class' => 'btn btn-danger btn-sm')); ?>
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



<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/tinymce/tinymce.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>



<script type="text/javascript">
    tinymce.init({
        selector: 'textarea'
    });

    $(document).ready(function() {
        $("#tanggal1").datepicker({
            format: 'yyyy-mm-dd'
        });

        $("#tanggal2").datepicker({
            format: 'yyyy-mm-dd'
        });

        $("#tanggal").datepicker({
            format: 'yyyy-mm-dd'
        });
    })
</script>