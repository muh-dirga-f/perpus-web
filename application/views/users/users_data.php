<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Data Users</h1>
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
        <?php echo anchor('users/create', '<i class="fas fa-plus"></i> Tambah Data', array('class' => 'btn btn-primary btn-sm')); ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTables-example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Username</td>
                        <td>Full Name</td>
                        <td>Password</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($users as $row) {
                    ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $row->username;?></td>
                        <td><?php echo $row->full_name;?></td>
                        <td><?php echo $row->password;?></td>
                        <td class="text-center">
                            <a href="<?php echo base_url('users/edit/'.$row->id_petugas) ?>"><input type="submit"
                                    class="btn btn-success btn-sm" name="edit" value="Edit"></a>
                            <a href="#" class="hapus btn btn-danger btn-sm" username="<?php echo $row->username;?>"
                                kode="<?php echo $row->id_petugas; ?>">Hapus</a>
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
            var name = $(this).attr("username");

            $(".text-konfirmasi").text(name)
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });

        $("#konfirmasi").click(function () {
            var id_petugas = $("#idhapus").val();

            $.ajax({
                url: "<?php echo site_url('users/delete');?>",
                type: "POST",
                data: "id_petugas=" + id_petugas,
                cache: false,
                success: function (html) {
                    location.href = "<?php echo site_url('users/index/delete-success');?>";
                }
            });
        });
    });
</script>