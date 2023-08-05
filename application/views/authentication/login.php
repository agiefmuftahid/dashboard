<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>FORMULIR | <?= $title ?></title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?php echo base_url() ?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?php echo base_url() ?>assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?php echo base_url() ?>assets/js/config.js"></script>
    <script src="<?php echo base_url() ?>vendors/simplebar/simplebar.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url() ?>vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/theme-rtl.css" rel="stylesheet" id="style-rtl">
    <link href="<?php echo base_url() ?>assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="<?php echo base_url() ?>assets/css/user-rtl.css" rel="stylesheet" id="user-style-rtl">
    <link href="<?php echo base_url() ?>assets/css/user.css" rel="stylesheet" id="user-style-default">

    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/sweetalert/dist/sweetalert2.min.css">
    <script src="<?php echo base_url(); ?>vendors/sweetalert/dist/sweetalert2.min.js"></script>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <div class="row min-vh-100 flex-center g-0">
                <div class="col-lg-8 col-xxl-5 py-3 position-relative"><img class="bg-auth-circle-shape" src="<?php echo base_url() ?>assets/img/icons/spot-illustrations/bg-shape.png" alt="" width="250"><img class="bg-auth-circle-shape-2" src="<?php echo base_url() ?>assets/img/icons/spot-illustrations/shape-1.png" alt="" width="150">
                    <div class="card overflow-hidden z-1">
                        <div class="card-body p-0">
                            <div class="row g-0 h-100">
                                <div class="col-md-5 text-center bg-card-gradient">
                                    <div class="position-relative p-4 pt-md-5 pb-md-7" data-bs-theme="light">
                                        <div class="bg-holder bg-auth-card-shape" style="background-image:url(<?php echo base_url() ?>assets/img/icons/spot-illustrations/half-circle.png);">
                                        </div>
                                        <!--/.bg-holder-->

                                        <div class="z-1 position-relative"><a class="link-light mb-4 font-sans-serif fs-4 d-inline-block fw-bolder" href="<?php echo base_url() ?>index.html">Formulir</a>
                                            <p class="opacity-75 text-white">Melalui aplikasi ini, pengguna dapat mengisi formulir yang tersedia di PT Bengkulu!</p>
                                        </div>
                                    </div>
                                    <div class="mt-3 mb-4 mt-md-4 mb-md-5" data-bs-theme="light">
                                        <p class="text-white">Belum punya akun?<br><a class="text-decoration-underline link-light" href="<?php echo base_url() ?>pages/authentication/card/register.html">Daftar disini</a></p>
                                    </div>
                                </div>
                                <div class="col-md-7 d-flex flex-center">
                                    <div class="p-4 p-md-5 flex-grow-1">
                                        <div class="row flex-between-center">
                                            <div class="col-auto">
                                                <h3>Masuk Akun</h3>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="mb-3">
                                                <input class="form-control" name="username" id="username" type="text" placeholder="Nama Pengguna" />
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" name="password" id="password" type="password" placeholder="Kata Sandi" />
                                            </div>
                                            <div class="row flex-between-center">
                                                <div class="col-auto">
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" id="basic-checkbox" checked="checked" />
                                                        <label class="form-check-label mb-0" for="basic-checkbox">Ingat saya</label>
                                                    </div>
                                                </div>
                                                <div class="col-auto"><a class="fs--1" href="<?php echo base_url() ?>assets/pages/authentication/simple/forgot-password.html">Lupa Kata Sandi?</a></div>
                                            </div>
                                        </form>
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit" onclick="login()">Masuk</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?php echo base_url() ?>vendors/popper/popper.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/anchorjs/anchor.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/is/is.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/fontawesome/all.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?php echo base_url() ?>vendors/list.js/list.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/theme.js"></script>

    <!-- Jquery -->
    <script src="<?php echo base_url(); ?>/vendors/jquery/jquery.min.js"></script>

    <script>
        function login() {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '<?php echo base_url() ?>validate_login',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        username: $('#username').val(),
                        password: $('#password').val()
                    },
                    success: function(data) {
                        if (data.st == 1) {
                            Swal.fire(
                                'Berhasil',
                                data.msg,
                                'success'
                            ).then(() => {
                                window.location.replace('<?php echo base_url() ?>dashboard');
                            });
                        } else {
                            Swal.fire(
                                'Maaf',
                                data.msg,
                                'warning'
                            );
                        }
                        resolve(true);
                    },
                    error: function(error) {
                        Swal.fire(
                            'Oops!',
                            error.msg,
                            'error'
                        );
                        reject(false);
                    }
                })
            })
        }
    </script>

</body>

</html>