<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Buku</h1>
<p class="mb-4">
    <?php
        if(!empty($message)) {
            echo $message;
        }
    ?>
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <?php echo anchor('buku/create', '<i class="fas fa-plus"></i> Tambah Data', array('class' => 'btn btn-primary btn-sm')); ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Image</td>
                        <td>Judul</td>
                        <td>Kode Buku</td>
                        <td>Tahun Terbit</td>
                        <td>Kategori</td>
                        <td>Pengarang</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($buku->result() as $row) {
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <!-- jika ada buku di dalam database maka tampilkan -->
                        <td><?php if($row->image != "") { ?>
                            <img src="<?php echo base_url('assets/img/buku/'.$row->image);?>" width="100px"
                                height="100px">
                            <?php }else{ ?>
                            <img src="<?php echo base_url('assets/img/buku/book-default.jpg');?>" width="100px"
                                height="100px">
                            <?php } ?>
                        </td>
                        <td><?php echo $row->judul;?></td>
                        <td><?php echo $row->kode_buku;?></td>
                        <td><?php echo $row->tahun_terbit;?></td>
                        <td><?php echo $row->nama_kategori_buku;?></td>
                        <td><?php echo $row->pengarang;?></td>
                        <td class="text-center">
                            <a href="<?php echo base_url('buku/edit/'.$row->kode_buku) ?>"><input type="submit"
                                    class="btn btn-success btn-sm" name="edit" value="Edit"></a>
                            <a href="#" name="<?php echo $row->judul;?>" class="hapus btn btn-danger btn-sm"
                                kode="<?php echo $row->kode_buku;?>">Hapus</a>
                        </td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idhapus" id="idhapus">
                <p>Apakah anda yakin ingin menghapus buku <strong class="text-konfirmasi"> </strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="konfirmasi">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        $(".hapus").click(function () {
            var kode = $(this).attr("kode");
            var name = $(this).attr("name");

            $(".text-konfirmasi").text(name)
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });

        $("#konfirmasi").click(function () {
            var kode_buku = $("#idhapus").val();

            $.ajax({
                url: "<?php echo site_url('buku/delete');?>",
                type: "POST",
                data: "kode_buku=" + kode_buku,
                cache: false,
                success: function (html) {
                    location.href = "<?php echo site_url('buku/index/delete-success');?>";
                }
            });
        });
    });
</script>