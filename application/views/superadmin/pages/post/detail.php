        <section class="content-header">
            <h1>
                <?= $title ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('index.php/superadminnn/Home') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?= base_url('index.php/superadminnn/Post') ?>">Data Postingan</a></li>
                <li class="active">Detail Postingan</li>
            </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <section class="col-lg-7">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Postingan #<?= $detail->posttitle ?></h3>
                        </div>
                        <div class="box-body">
                            <img src="<?= base_url("__assets/img/postingan/$detail->photo") ?>" alt="" height="200" class="img-responsive">
                            <br>
                            <?= $detail->content ?>
                        </div>
                    </div>
                </section>

                <section class="col-lg-5">
                    <div class="box">
                        <div class="box-header">
                            
                        </div>
                        <div class="box-body">
                            <p>
                                Judul Postingan: <strong><?= $detail->posttitle ?></strong>
                            </p>
                            <br>
                            <p>
                                Status Postingan: 
                                <strong>
                                    <?php
                                        if($detail->is_active == 'Y') {
                                            echo "<span class='label label-primary'> Aktif</span>";
                                        } else {
                                            echo "<span class='label label-danger'> Tidak Aktif</span>";
                                        }
                                    ?>
                                </strong>
                            </p>
                            <br>
                            <p>
                                Kategori: <strong><?= $detail->categoryname ?></strong>
                            </p>
                            <br>
                            <p>
                                Sub Kategory: <strong><?= $detail->namesubcategory ?></strong>
                            </p>
                            <br>
                            <p>
                                Uploaded By: <strong><?= $detail->namauser ?></strong>
                            </p>
                            <br>
                            <p>
                                Tanggal Upload: <strong><?= $detail->tglpost ?></strong>
                            </p>
                        </div>
                    </div>
                </section>
            </div>
            
            
        </section>