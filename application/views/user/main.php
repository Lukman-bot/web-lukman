
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Galaxy - Personal Blog Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('__assets/user/plugins/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('__assets/user/plugins/fontawesome/css/all.css') ?>">

    <!-- Main Stylesheet -->
    <link href="<?= base_url('__assets/user/css/style.css') ?>" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="<?= base_url('__assets/user/images/favicon.png') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('__assets/user/images/favicon.png') ?>" type="image/x-icon">

</head>
<body>
    <!-- START preloader-wrapper -->
    <div class="preloader-wrapper">
        <div class="preloader-inner">
            <div class="spinner-border text-red"></div>
        </div>
    </div>
    <!-- END preloader-wrapper -->
    
    <!-- START main-wrapper -->
    <section class="d-flex">
  
        <!-- start of sidenav -->
        <?php $this->load->view('user/template/__aside'); ?>
        <!-- end of sidenav -->
        <div class="main-content">
            <!-- start of mobile-nav -->
            <?php $this->load->view('user/template/__mobile-nav'); ?>
            <!-- end of mobile-nav -->

            <?php $this->load->view('user/pages/' . $page); ?>

            <!-- start of footer -->
            <?php $this->load->view('user/template/__footer'); ?>
            <!-- end of footer -->
        </div>

    </section>
    <!-- END main-wrapper -->

    <!-- All JS Files -->
    <script src="<?= base_url('__assets/user/plugins/jQuery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('__assets/user/plugins/bootstrap/bootstrap.min.js') ?>"></script>

    <!-- Main Script -->
    <script src="<?= base_url('__assets/user/js/script.js') ?>"></script>
</body>
</html>