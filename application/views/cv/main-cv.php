
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
        <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
        <noscript>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
        </noscript>
        <link href="<?= base_url('__assets/cv/css/font-awesome/css/all.min.css?ver=1.2.0') ?>" rel="stylesheet">
        <link href="<?= base_url('__assets/cv/css/bootstrap.min.css?ver=1.2.0') ?>" rel="stylesheet">
        <link href="<?= base_url('__assets/cv/css/aos.css?ver=1.2.0') ?>" rel="stylesheet">
        <link href="<?= base_url('__assets/cv/css/main.css?ver=1.2.0') ?>" rel="stylesheet">
        <noscript>
            <style type="text/css">
                [data-aos] {
                    opacity: 1 !important;
                    transform: translate(0) scale(1) !important;
                }
            </style>
        </noscript>
    </head>
    <body id="top">

        <!-- Header  -->
        <?php $this->load->view('cv/template/_header'); ?>
        <!-- End Header -->

        <!-- Page Content -->
        <div class="page-content">
            <?php $this->load->view('cv/pages/' . $page); ?>
        </div>
        <!-- End Page Content -->

        <!-- Footer -->
        <?php $this->load->view('cv/template/_footer'); ?>
        <!-- End Footer -->

        <script src="<?= base_url('__assets/cv/scripts/bootstrap.bundle.min.js?ver=1.2.0') ?>"></script>
        <script src="<?= base_url('__assets/cv/scripts/aos.js?ver=1.2.0') ?>"></script>
        <script src="<?= base_url('__assets/cv/scripts/main.js?ver=1.2.0') ?>"></script>
    </body>
</html>