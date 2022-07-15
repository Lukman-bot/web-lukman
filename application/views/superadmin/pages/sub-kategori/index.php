        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Sub Kategori</h3>
                    <a href="<?= base_url('index.php/superadminnn/SubKategori/Add') ?>" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Nama Sub Kategori</th>
                                <th>Description</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach($dataSubKategori as $showSubKategori) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $showSubKategori->categoryname ?></td>
                                    <td><?= $showSubKategori->namesubcategory ?></td>
                                    <td><?= $showSubKategori->description ?></td>
                                    <?php echo "<td>
                                        <a href=".base_url()."index.php/Superadminnn/SubKategori/Update/".$showSubKategori->subcategoryid." class='btn btn-primary btn-sm' title='Edit Sub Kategori'>
                                            <i class='fa fa-edit'></i>
                                        </a>
                                        <button class='btn btn-danger btn-sm' onClick='hapus($showSubKategori->subcategoryid)' title='Hapus'>
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
            function hapus(subcategoryid) {
                $('#form_hapus')[0].reset();
                $.ajax({
                    url: "<?php echo base_url('index.php/superadminnn/SubKategori/Getid') ?>/"+subcategoryid,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="id_hapus"]').val(data.subcategoryid);
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
                        <h5 class="modal-title" id="exampleModalLabel">Pesan Hapus Kategori</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('index.php/superadminnn/SubKategori/Delete') ?>" id="form_hapus" method="POST">
                        <input type="hidden" name="id_hapus" value="" id="">
                        Apakah Anda Yakin Akan Menghapus Data Sub Kategori Tersebut.?
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
        