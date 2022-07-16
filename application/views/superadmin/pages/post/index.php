        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Postingan</h3>
                    <a href="<?= base_url('index.php/superadminnn/Post/Add') ?>" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Postingan</th>
                                <th>Nama Kategori</th>
                                <th>Photo</th>
                                <th>Tanggal Post</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($dataPostingan as $showPost) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $showPost->posttitle ?></td>
                                    <td><?= $showPost->categoryname ?></td>
                                    <td>
                                        <img src="<?= base_url("__assets/img/postingan/$showPost->photo") ?>" alt="" height="200" class="img-responsive">
                                    </td>
                                    <td><?= $showPost->tglpost ?></td>
                                    <?php echo "<td>
                                        <a href=".base_url()."index.php/Superadminnn/Post/Update/".$showPost->postid." class='btn btn-primary btn-sm' title='Edit Postingan'>
                                            <i class='fa fa-edit'></i>
                                        </a>
                                        <a href=".base_url()."index.php/Superadminnn/Post/Detail/".$showPost->postid." class='btn btn-info btn-sm' title='Lihat Detail Postingan'>
                                            <i class='fa fa-eye'></i>
                                        </a>
                                        <button class='btn btn-danger btn-sm' onClick='hapus($showPost->postid)' title='Hapus'>
                                            <i class='fa fa-trash'></i>
                                        </button>
                                    </td>"; ?>
                                </tr>
                            <?php $no++;   }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
        <!-- JavaScript -->
        <script>
            function hapus(postid) {
                $('#form_hapus')[0].reset();
                $.ajax({
                    url: "<?php echo base_url('index.php/superadminnn/Post/Getid') ?>/"+postid,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="id_hapus"]').val(data.postid);
                        $('#modal-default').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Gagal ambil ajax');
                    }
                })
            }
        </script>
        <!-- End JavaScript -->

        <!-- Modal -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan Hapus Postingan</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('index.php/superadminnn/Post/Delete') ?>" id="form_hapus" method="POST">
                        <input type="hidden" name="id_hapus" value="" id="">
                        Apakah Anda Yakin Akan Menghapus Data Postingan Tersebut.?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        