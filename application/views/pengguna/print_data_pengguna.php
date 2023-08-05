<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SINDIRAN | <?= $title ?></title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/img/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/img/favicons/favicon-16x16.png" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/favicons/favicon.ico" />
    <link rel="manifest" href="<?php echo base_url() ?>assets/img/favicons/manifest.json" />
    <meta name="msapplication-TileImage" content="<?php echo base_url() ?>assets/img/favicons/mstile-150x150.png" />
    <meta name="theme-color" content="#ffffff" />
    <script src="<?php echo base_url() ?>assets/js/config.js"></script>
    <script src="<?php echo base_url() ?>vendors/simplebar/simplebar.min.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?php echo base_url() ?>vendors/select2/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>vendors/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>vendors/datatables.net-bs5/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>vendors/prism/prism-okaidia.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>vendors/prism/prism-okaidia.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet" />
    <link href="<?php echo base_url() ?>vendors/simplebar/simplebar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/theme-rtl.css" rel="stylesheet" id="style-rtl" />
    <link href="<?php echo base_url() ?>assets/css/theme.css" rel="stylesheet" id="style-default" />
    <link href="<?php echo base_url() ?>assets/css/user-rtl.css" rel="stylesheet" id="user-style-rtl" />
    <link href="<?php echo base_url() ?>assets/css/user.css" rel="stylesheet" id="user-style-default" />
    <script>
        var isRTL = JSON.parse(localStorage.getItem("isRTL"));
        if (isRTL) {
            var linkDefault = document.getElementById("style-default");
            var userLinkDefault = document.getElementById("user-style-default");
            linkDefault.setAttribute("disabled", true);
            userLinkDefault.setAttribute("disabled", true);
            document.querySelector("html").setAttribute("dir", "rtl");
        } else {
            var linkRTL = document.getElementById("style-rtl");
            var userLinkRTL = document.getElementById("user-style-rtl");
            linkRTL.setAttribute("disabled", true);
            userLinkRTL.setAttribute("disabled", true);
        }
    </script>

    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/sweetalert/dist/sweetalert2.min.css">
    <script src="<?php echo base_url(); ?>vendors/sweetalert/dist/sweetalert2.min.js"></script>
</head>

<body onload="print()">
    <h1 class="mb-3">Data Pegawai</h1>
    <table class="table table-bordered">
        <tbody>
            <thead>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Pangkat</th>
            </thead>
            <?php foreach ($query as $qr) { ?>
                <tr>
                    <td><?= $qr->nip ?></td>
                    <td><?= $qr->nama ?></td>
                    <td><?= $qr->jabatan_sikep ?></td>
                    <td><?= $qr->pangkat ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?php echo base_url() ?>vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/popper/popper.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/anchorjs/anchor.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/is/is.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/prism/prism.js"></script>
    <script src="<?php echo base_url() ?>vendors/select2/select2.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-bs5/dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/prism/prism.js"></script>
    <script src="<?php echo base_url() ?>vendors/fontawesome/all.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?php echo base_url() ?>vendors/list.js/list.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/theme.js"></script>
</body>

</html>