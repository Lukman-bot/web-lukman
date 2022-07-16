        <section class="content-header">
            <h1>
                <?= $title ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('index.php/superadminnn/Home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?= base_url('index.php/superadminnn/SubKategori') ?>">Data Sub Kategori</a></li>
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
                            <input type="text" class="form-control" id="namesubcategory" value="<?= $input->namesubcategory ?>" name="namesubcategory" required placeholder="Masukkan Deskripsi">
                            <?= form_error('namesubcategory', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <input type="text" class="form-control" id="description" value="<?= $input->description ?>" name="description" required placeholder="Masukkan Deskripsi">
                            <?= form_error('description', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="box-footer">
                        <a href="<?= base_url('index.php/superadminnn/Kategori/index') ?>" class="btn btn-default">Kembali</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </div>
                <?= form_close() ?>
            </div>
        </section>
