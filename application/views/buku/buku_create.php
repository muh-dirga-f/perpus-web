<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create Buku</h1>
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
        <?php echo form_open_multipart('buku/insert', array('class' => 'form-horizontal', 'id' => 'jvalidate')) ?>

            <div class="form-group row d-none">
                <p class="col-sm-2 text-left">Kode Buku </p>

                <div class="col-sm-10">
                    <input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku" value="0">
                </div>
            </div>
            <?php $kategori =  $this->db->get('kategori_buku')->result_array(); ?>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Kategori Buku </p>
                <div class="col-sm-10">
                    <select name="kategori_buku" id="kategori_buku" class="form-control">
                        <?php foreach ($kategori as $kat) : ?>
                        <option <?php if(set_value('kategori_buku') === $kat['id_kategori_buku']) echo "selected"; ?> value="<?= $kat['id_kategori_buku']; ?>"><?= $kat['nama_kategori_buku']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Judul </p>

                <div class="col-sm-10">
                    <input type="text" name="judul" class="form-control" placeholder="Judul Buku" value="<?php echo set_value('judul'); ?>">
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
                        <option value="<?= $i ?>"><?= $i; ?></option>
                    <?php
                        };
                    ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Pengarang </p>

                <div class="col-sm-10">
                    <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" value="<?php echo set_value('pengarang'); ?>">
                </div>
            </div>


            <div class="form-group row">
                <p class="col-sm-2 text-left">Images</p>

                <div class="col-sm-10">
                    <input type="file" name="userfile" class="form-control btn-file"  value="<?php echo set_value('userfile'); ?>" accept=".png,.jpg">
                </div>
            </div>

            <div class="form-group row">
                <p class="col-sm-2 text-left">Ebook</p>

                <div class="col-sm-10">
                    <input type="file" name="ebook" class="form-control btn-file"  value="<?php echo set_value('ebook'); ?>" accept=".pdf">
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
                        <input type="submit" name="save" value="Save" class="btn btn-success btn-sm">
                    </div>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
    <!-- /.col-lg-12 -->
</div>