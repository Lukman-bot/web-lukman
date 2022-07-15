
        <section class="content">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $title ?></h3>
                </div>
                <?= form_open_multipart($form_action) ?>
		            <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama User</label>
                            <input type="text" class="form-control" id="namauser" value="<?= $input->namauser ?>" name="namauser" required placeholder="Masukkan Nama User">
                            <?= form_error('namauser', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" id="jeniskelamin" name="jeniskelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" <?php if($input->jeniskelamin == "Laki-laki"){ print ' selected'; }?>>Laki-laki</option>
                                <option value="Perempuan" <?php if($input->jeniskelamin == "Perempuan"){ print ' selected'; }?>>Perempuan</option>
                            </select>
                            <?= form_error('namauser', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Telepon</label>
                            <input type="text" class="form-control" id="notelepon" value="<?= $input->notelepon ?>" name="notelepon" required placeholder="Masukkan Nomor Telepon">
                            <?= form_error('notelepon', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" id="alamat" value="<?= $input->alamat ?>" name="alamat" required placeholder="Masukkan Alamat">
                            <?= form_error('alamat', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="email" class="form-control" id="username" value="<?= $input->username ?>" name="username" required placeholder="Masukkan Nama User">
                            <?= form_error('username', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" value="<?= $input->password ?>" name="password" required placeholder="Password">
                            <?= form_error('password', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" id="" name="akses">
                                <option value="">-- Pilih Role --</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                            </select>
                            <?= form_error('akses', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <?php if(!empty($input->photo)) : ?>
                                <img src="<?= base_url("__assets/img/user/$input->photo") ?>" alt="">
                            <?php else: ?>
                                <p>No Photo</p>
                            <?php endif; ?>
                            <br> 
                            <small><span class="text-danger">*</span>	Maksimal ukuran gambar adalah 3 MB</small>
                            <input type="file" id="exampleInputFile" name="photo">
                            <?php if($this->session->flashdata('image_error')) :  ?>
                                <small class="form-text text-danger">
                                    <?= $this->session->flashdata('image_error') ?>
                                </small>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="<?= base_url('index.php/superadminnn/User/index') ?>" class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                <?= form_close() ?>
            </div>
        </section>
