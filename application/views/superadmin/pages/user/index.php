        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data User</h3>
                    <a href="<?= base_url('index.php/superadminnn/User/Add') ?>" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>ID Akses</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($dataUser as $showUser) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $showUser->namauser ?></td>
                                    <td><?= $showUser->username ?></td>
                                    <td><?= $showUser->akses ?></td>
                                    <?php echo "<td>
                                        <a href=".base_url()."index.php/Superadminnn/User/Update/".$showUser->userid." class='btn btn-primary btn-sm' title='Edit User'>
                                            <i class='fa fa-edit'></i>
                                        </a>
                                        <a href=".base_url()."index.php/Superadminnn/User/Detail/".$showUser->userid." class='btn btn-info btn-sm' title='Lihat Detail'>
                                            <i class='fa fa-eye'></i>
                                        </a>
                                        <button class='btn btn-danger btn-sm' onClick='hapus($showUser->userid)' title='Hapus'>
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
            function hapus(userid) {
                $('#form_hapus')[0].reset();
                $.ajax({
                    url: "<?php echo base_url('index.php/superadminnn/User/Getid') ?>/"+userid,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="id_hapus"]').val(data.userid);
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
                        <h5 class="modal-title" id="exampleModalLabel">Pesan Hapus User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('index.php/superadminnn/User/Delete') ?>" id="form_hapus" method="POST">
                        <input type="hidden" name="id_hapus" value="" id="">
                        Apakah Anda Yakin Akan Menghapus Data Tersebut.?
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
        