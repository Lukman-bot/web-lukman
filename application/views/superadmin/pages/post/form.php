        <section class="content-header">
            <h1>
                <?= $title ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('index.php/superadminnn/Home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?= base_url('index.php/superadminnn/Post') ?>">Data Postingan</a></li>
                <li class="active"><?= $title ?></li>
            </ol>
        </section>

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
                            <label for="exampleInputEmail1">Category Name</label>
                            <?= form_dropdown('idcategory', getDropdownList('category', ['categoryid', 'categoryname']), $input->idcategory, ['class'=>'form-control']) ?>
                            <?= form_error('idcategory') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Category Name</label>
                            <?= form_dropdown('idsubcategory', getDropdownList('subcategory', ['subcategoryid', 'namesubcategory']), $input->idsubcategory, ['class'=>'form-control']) ?>
                            <?= form_error('idsubcategory') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                            <input type="text" class="form-control" id="posttitle" value="<?= $input->posttitle ?>" name="posttitle" required placeholder="Masukkan Nama User">
                            <?= form_error('posttitle', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="editor1" name="content" rows="10" cols="80" value="<?= $input->content ?>">
                            
                            </textarea>
                        </div>

                        <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Post Title</label> -->
                            <input type="hidden" class="form-control" id="iduser" value="<?= $user['userid'] ?>" name="iduser" required placeholder="Masukkan Nama User">
                            <?= form_error('iduser', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <?php if(!empty($input->photo)) : ?>
                                <img src="<?= base_url("__assets/img/postingan/$input->photo") ?>" alt="">
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
