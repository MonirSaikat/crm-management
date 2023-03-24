<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Admin Panel' ?></title>


    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/fontawesome-free/css/all.min.css">

    <!-- Data table -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asset/plugins/summernote/summernote-bs4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>asset/css/adminlte.min.css">


    <!-- jQuery -->
    <script src="<?= base_url() ?>asset/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/toastr/toastr.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url() ?>asset/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>asset/js/adminlte.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <?php include(APPPATH . 'views/shared/navbar.php') ?>
        <?php include(APPPATH . 'views/shared/sidebar.php') ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">

                    <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) : ?>
                        <script>
                            toastr.info('<?= $this->session->flashdata('message') ?>')
                        </script>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
                        <script>
                            toastr.success('<?= $this->session->flashdata('success') ?>')
                        </script> <?php endif; ?>

                    <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
                        <script>
                            toastr.error('<?= $this->session->flashdata('error') ?>')
                        </script>
                    <?php endif; ?>