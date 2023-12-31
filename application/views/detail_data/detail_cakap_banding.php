<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Dashboard | <?= ucwords($title) ?></title>


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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/jquery.js"></script>
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>

    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>vendors/sweetalert/dist/sweetalert2.min.css">
    <script src="<?php echo base_url(); ?>vendors/sweetalert/dist/sweetalert2.min.js"></script>

    <!-- Datatables -->
    <link href="<?php echo base_url(); ?>assets/plugins/dataTables/datatables.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/dataTables/responsive.dataTables.min.css" rel="stylesheet" />

    <!-- Custom CSS -->

    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet" id="style-default">
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-lg">
                <div class="w-100">
                    <div class="d-flex flex-between-center">

                        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDoubleTop" aria-controls="navbarDoubleTop" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                        <a class="navbar-brand me-1 me-sm-3" href="../index.html">
                            <div class="d-flex align-items-center"><img class="me-2" src="<?php echo base_url() ?>assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span>
                            </div>
                        </a>
                        <ul class="navbar-nav align-items-center d-none d-lg-block">
                            <li class="nav-item">
                                <div class="search-box" data-list='{"valueNames":["title"]}'>
                                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                        <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..." aria-label="Search" />
                                        <span class="fas fa-search search-box-icon"></span>

                                    </form>
                                    <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                                        <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
                                    </div>
                                    <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                                        <div class="scrollbar list py-3" style="max-height: 24rem;">
                                            <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Recently Browsed</h6><a class="dropdown-item fs--1 px-x1 py-1 hover-primary" href="../app/events/event-detail.html">
                                                <div class="d-flex align-items-center">
                                                    <span class="fas fa-circle me-2 text-300 fs--2"></span>

                                                    <div class="fw-normal title">Pages <span class="fas fa-chevron-right mx-1 text-500 fs--2" data-fa-transform="shrink-2"></span> Events</div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item fs--1 px-x1 py-1 hover-primary" href="../app/e-commerce/customers.html">
                                                <div class="d-flex align-items-center">
                                                    <span class="fas fa-circle me-2 text-300 fs--2"></span>

                                                    <div class="fw-normal title">E-commerce <span class="fas fa-chevron-right mx-1 text-500 fs--2" data-fa-transform="shrink-2"></span> Customers</div>
                                                </div>
                                            </a>

                                            <hr class="text-200 dark__text-900" />
                                            <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Suggested Filter</h6><a class="dropdown-item px-x1 py-1 fs-0" href="../app/e-commerce/customers.html">
                                                <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-subtle-warning">customers:</span>
                                                    <div class="flex-1 fs--1 title">All customers list</div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item px-x1 py-1 fs-0" href="../app/events/event-detail.html">
                                                <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-subtle-success">events:</span>
                                                    <div class="flex-1 fs--1 title">Latest events in current month</div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item px-x1 py-1 fs-0" href="../app/e-commerce/product/product-grid.html">
                                                <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-subtle-info">products:</span>
                                                    <div class="flex-1 fs--1 title">Most popular products</div>
                                                </div>
                                            </a>

                                            <hr class="text-200 dark__text-900" />
                                            <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Files</h6><a class="dropdown-item px-x1 py-2" href="#!">
                                                <div class="d-flex align-items-center">
                                                    <div class="file-thumbnail me-2"><img class="border h-100 w-100 object-fit-cover rounded-3" src="<?php echo base_url() ?>assets/img/products/3-thumb.png" alt="" /></div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 title">iPhone</h6>
                                                        <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">Antony</span><span class="fw-medium text-600 ms-2">27 Sep at 10:30 AM</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item px-x1 py-2" href="#!">
                                                <div class="d-flex align-items-center">
                                                    <div class="file-thumbnail me-2"><img class="img-fluid" src="<?php echo base_url() ?>assets/img/icons/zip.png" alt="" /></div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 title">Falcon v1.8.2</h6>
                                                        <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">John</span><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                                                    </div>
                                                </div>
                                            </a>

                                            <hr class="text-200 dark__text-900" />
                                            <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Members</h6><a class="dropdown-item px-x1 py-2" href="../pages/user/profile.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-l status-online me-2">
                                                        <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/team/1.jpg" alt="" />

                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 title">Anna Karinina</h6>
                                                        <p class="fs--2 mb-0 d-flex">Technext Limited</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item px-x1 py-2" href="../pages/user/profile.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-l me-2">
                                                        <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/team/2.jpg" alt="" />

                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 title">Antony Hopkins</h6>
                                                        <p class="fs--2 mb-0 d-flex">Brain Trust</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item px-x1 py-2" href="../pages/user/profile.html">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-l me-2">
                                                        <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/team/3.jpg" alt="" />

                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 title">Emma Watson</h6>
                                                        <p class="fs--2 mb-0 d-flex">Google</p>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="text-center mt-n3">
                                            <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                            <li class="nav-item px-2">
                                <div class="theme-control-toggle fa-icon-wait">
                                    <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                                </div>
                            </li>
                            <li class="nav-item d-none d-sm-block">
                                <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="../app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;"></span><span class="notification-indicator-number">1</span></a>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
                                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                                    <div class="card card-notification shadow-none">
                                        <div class="card-header">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-auto">
                                                    <h6 class="card-header-title mb-0">Notifications</h6>
                                                </div>
                                                <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
                                            </div>
                                        </div>
                                        <div class="scrollbar-overlay" style="max-height:19rem">
                                            <div class="list-group list-group-flush fw-normal fs--1">
                                                <div class="list-group-title border-bottom">NEW</div>
                                                <div class="list-group-item">
                                                    <a class="notification notification-flush notification-unread" href="#!">
                                                        <div class="notification-avatar">
                                                            <div class="avatar avatar-2xl me-3">
                                                                <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/team/1-thumb.png" alt="" />

                                                            </div>
                                                        </div>
                                                        <div class="notification-body">
                                                            <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                                                            <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>

                                                        </div>
                                                    </a>

                                                </div>
                                                <div class="list-group-item">
                                                    <a class="notification notification-flush notification-unread" href="#!">
                                                        <div class="notification-avatar">
                                                            <div class="avatar avatar-2xl me-3">
                                                                <div class="avatar-name rounded-circle"><span>AB</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="notification-body">
                                                            <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                                                            <span class="notification-time"><span class="me-2 fab fa-gratipay text-danger"></span>9hr</span>

                                                        </div>
                                                    </a>

                                                </div>
                                                <div class="list-group-title border-bottom">EARLIER</div>
                                                <div class="list-group-item">
                                                    <a class="notification notification-flush" href="#!">
                                                        <div class="notification-avatar">
                                                            <div class="avatar avatar-2xl me-3">
                                                                <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/icons/weather-sm.jpg" alt="" />

                                                            </div>
                                                        </div>
                                                        <div class="notification-body">
                                                            <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                                            <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>

                                                        </div>
                                                    </a>

                                                </div>
                                                <div class="list-group-item">
                                                    <a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
                                                        <div class="notification-avatar">
                                                            <div class="avatar avatar-xl me-3">
                                                                <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/logos/oxford.png" alt="" />

                                                            </div>
                                                        </div>
                                                        <div class="notification-body">
                                                            <p class="mb-1"><strong>University of Oxford</strong> created an event : "Causal Inference Hilary 2019"</p>
                                                            <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">✌️</span>1w</span>

                                                        </div>
                                                    </a>

                                                </div>
                                                <div class="list-group-item">
                                                    <a class="border-bottom-0 notification notification-flush" href="#!">
                                                        <div class="notification-avatar">
                                                            <div class="avatar avatar-xl me-3">
                                                                <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/team/10.jpg" alt="" />

                                                            </div>
                                                        </div>
                                                        <div class="notification-body">
                                                            <p class="mb-1"><strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund</p>
                                                            <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>

                                                        </div>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center border-top"><a class="card-link d-block" href="../app/social/notifications.html">View all</a></div>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item dropdown px-1">
                                <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button" data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="43" viewBox="0 0 16 16" fill="none">
                                        <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                                        <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                                        <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                                        <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                                        <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                                        <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                                        <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                                        <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                                        <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                                    </svg></a>
                                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-caret-bg" aria-labelledby="navbarDropdownMenu">
                                    <div class="card shadow-none">
                                        <div class="scrollbar-overlay nine-dots-dropdown">
                                            <div class="card-body px-3">
                                                <div class="row text-center gx-0 gy-0">
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="../pages/user/profile.html" target="_blank">
                                                            <div class="avatar avatar-2xl"> <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/team/3.jpg" alt="" /></div>
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2">Account</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="https://themewagon.com/" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/themewagon.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Themewagon</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="https://mailbluster.com/" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/mailbluster.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Mailbluster</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/google.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Google</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/spotify.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Spotify</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/steam.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Steam</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/github-light.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Github</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/discord.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Discord</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/xbox.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">xbox</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/trello.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Kanban</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/hp.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Hp</p>
                                                        </a></div>
                                                    <div class="col-12">
                                                        <hr class="my-3 mx-n3 bg-200" />
                                                    </div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/linkedin.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Linkedin</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/twitter.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Twitter</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/facebook.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Facebook</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/instagram.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Instagram</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/pinterest.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Pinterest</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/slack.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Slack</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="#!" target="_blank"><img class="rounded" src="<?php echo base_url() ?>assets/img/nav-icons/deviantart.png" alt="" width="40" height="40" />
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2 pt-1">Deviantart</p>
                                                        </a></div>
                                                    <div class="col-4"><a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="../app/events/event-detail.html" target="_blank">
                                                            <div class="avatar avatar-2xl">
                                                                <div class="avatar-name rounded-circle bg-primary-subtle text-primary"><span class="fs-2">E</span></div>
                                                            </div>
                                                            <p class="mb-0 fw-medium text-800 text-truncate fs--2">Events</p>
                                                        </a></div>
                                                    <div class="col-12"><a class="btn btn-outline-primary btn-sm mt-4" href="#!">Show more</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="avatar avatar-xl">
                                        <img class="rounded-circle" src="<?php echo base_url() ?>assets/img/team/3-thumb.png" alt="" />

                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                        <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Go Pro</span></a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Set status</a>
                                        <a class="dropdown-item" href="../pages/user/profile.html">Profile &amp; account</a>
                                        <a class="dropdown-item" href="#!">Feedback</a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../pages/user/settings.html">Settings</a>
                                        <a class="dropdown-item" href="../pages/authentication/card/logout.html">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr class="my-2 d-none d-lg-block" />
                    <div class="collapse navbar-collapse scrollbar py-lg-2" id="navbarDoubleTop">
                        <ul class="navbar-nav" data-top-nav-dropdowns="data-top-nav-dropdowns">
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dashboards">Dashboard</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="dashboards">
                                    <div class="bg-white dark__bg-1000 rounded-3 py-2"><a class="dropdown-item link-600 fw-medium" href="../index.html">Default</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/analytics.html">Analytics</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/crm.html">CRM</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/e-commerce.html">E commerce</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/lms.html">LMS<span class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a class="dropdown-item link-600 fw-medium" href="../dashboard/project-management.html">Management</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/saas.html">SaaS</a><a class="dropdown-item link-600 fw-medium" href="../dashboard/support-desk.html">Support desk<span class="badge rounded-pill ms-2 badge-subtle-success">New</span></a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="apps">App</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="apps">
                                    <div class="card navbar-card-app shadow-none dark__bg-1000">
                                        <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown" src="<?php echo base_url() ?>assets/img/icons/spot-illustrations/authentication-corner.png" width="130" alt="" />
                                            <div class="row">
                                                <div class="col-6 col-md-4">
                                                    <div class="nav flex-column"><a class="nav-link py-1 link-600 fw-medium" href="../app/calendar.html">Calendar</a><a class="nav-link py-1 link-600 fw-medium" href="../app/chat.html">Chat</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-learning/trainer-profile.html">Trainer profile</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Social</p><a class="nav-link py-1 link-600 fw-medium" href="../app/kanban.html">Kanban</a><a class="nav-link py-1 link-600 fw-medium" href="../app/social/feed.html">Feed</a><a class="nav-link py-1 link-600 fw-medium" href="../app/social/activity-log.html">Activity log</a><a class="nav-link py-1 link-600 fw-medium" href="../app/social/notifications.html">Notifications</a><a class="nav-link py-1 link-600 fw-medium" href="../app/social/followers.html">Followers</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Support Desk</p><a class="nav-link py-1 link-600 fw-medium" href="../app/support-desk/table-view.html">Table view</a><a class="nav-link py-1 link-600 fw-medium" href="../app/support-desk/card-view.html">Card view</a><a class="nav-link py-1 link-600 fw-medium" href="../app/support-desk/contacts.html">Contacts</a><a class="nav-link py-1 link-600 fw-medium" href="../app/support-desk/contact-details.html">Contact details</a><a class="nav-link py-1 link-600 fw-medium" href="../app/support-desk/tickets-preview.html">Tickets preview</a><a class="nav-link py-1 link-600 fw-medium" href="../app/support-desk/quick-links.html">Quick links</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">E-Learning</p><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/invoice.html">Invoice</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-learning/course/course-list.html">Course list</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-learning/course/course-grid.html">Course grid</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-learning/course/course-details.html">Course details</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-learning/course/create-a-course.html">Create a course</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-learning/student-overview.html">Student overview</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Events</p><a class="nav-link py-1 link-600 fw-medium" href="../app/events/create-an-event.html">Create an event</a><a class="nav-link py-1 link-600 fw-medium" href="../app/events/event-detail.html">Event detail</a><a class="nav-link py-1 link-600 fw-medium" href="../app/events/event-list.html">Event list</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Email</p><a class="nav-link py-1 link-600 fw-medium" href="../app/email/inbox.html">Inbox</a><a class="nav-link py-1 link-600 fw-medium" href="../app/email/email-detail.html">Email detail</a><a class="nav-link py-1 link-600 fw-medium" href="../app/email/compose.html">Compose</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">E-Commerce</p><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/product/product-list.html">Product list</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/product/product-grid.html">Product grid</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/product/product-details.html">Product details</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/product/add-product.html">Add product</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/orders/order-list.html">Order list</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/orders/order-details.html">Order details</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/customers.html">Customers</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/customer-details.html">Customer details</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/shopping-cart.html">Shopping cart</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/checkout.html">Checkout</a><a class="nav-link py-1 link-600 fw-medium" href="../app/e-commerce/billing.html">Billing</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="pagess">Pages</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="pagess">
                                    <div class="card navbar-card-pages shadow-none dark__bg-1000">
                                        <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown" src="<?php echo base_url() ?>assets/img/icons/spot-illustrations/authentication-corner.png" width="130" alt="" />
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Simple Auth</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/simple/login.html">Login</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/simple/logout.html">Logout</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/simple/register.html">Register</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/simple/forgot-password.html">Forgot password</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/simple/confirm-mail.html">Confirm mail</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/simple/reset-password.html">Reset password</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/simple/lock-screen.html">Lock screen</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Card Auth</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/card/login.html">Login</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/card/logout.html">Logout</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/card/register.html">Register</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/card/forgot-password.html">Forgot password</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/card/confirm-mail.html">Confirm mail</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/card/reset-password.html">Reset password</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/card/lock-screen.html">Lock screen</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Split Auth</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/split/login.html">Login</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/split/logout.html">Logout</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/split/register.html">Register</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/split/forgot-password.html">Forgot password</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/split/confirm-mail.html">Confirm mail</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/split/reset-password.html">Reset password</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/split/lock-screen.html">Lock screen</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Layouts</p><a class="nav-link py-1 link-600 fw-medium" href="../demo/navbar-vertical.html">Navbar vertical</a><a class="nav-link py-1 link-600 fw-medium" href="../demo/navbar-top.html">Top nav</a><a class="nav-link py-1 link-600 fw-medium" href="../demo/navbar-double-top.html">Double top<span class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a class="nav-link py-1 link-600 fw-medium" href="../demo/combo-nav.html">Combo nav</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Others</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/starter.html">Starter</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/landing.html">Landing</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">User</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/user/profile.html">Profile</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/user/settings.html">Settings</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Pricing</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/pricing/pricing-default.html">Pricing default</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/pricing/pricing-alt.html">Pricing alt</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Errors</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/errors/404.html">404</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/errors/500.html">500</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Miscellaneous</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/miscellaneous/associations.html">Associations</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/miscellaneous/invite-people.html">Invite people</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/miscellaneous/privacy-policy.html">Privacy policy</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">FAQ</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/faq/faq-basic.html">Faq basic</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/faq/faq-alt.html">Faq alt</a><a class="nav-link py-1 link-600 fw-medium" href="../pages/faq/faq-accordion.html">Faq accordion</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Other Auth</p><a class="nav-link py-1 link-600 fw-medium" href="../pages/authentication/wizard.html">Wizard</a><a class="nav-link py-1 link-600 fw-medium" href="../#authentication-modal" data-bs-toggle="modal">Modal</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="moduless">Modules</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="moduless">
                                    <div class="card navbar-card-components shadow-none dark__bg-1000">
                                        <div class="card-body scrollbar max-h-dropdown"><img class="img-dropdown" src="<?php echo base_url() ?>assets/img/icons/spot-illustrations/authentication-corner.png" width="130" alt="" />
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Components</p><a class="nav-link py-1 link-600 fw-medium" href="../modules/icons/feather.html">Feather</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/icons/material-icons.html">Material icons</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/maps/google-map.html">Google map</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/maps/leaflet-map.html">Leaflet map</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/accordion.html">Accordion</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/alerts.html">Alerts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/anchor.html">Anchor</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/animated-icons.html">Animated icons</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/background.html">Background</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/badges.html">Badges</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/bottom-bar.html">Bottom bar<span class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/breadcrumbs.html">Breadcrumbs</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column mt-md-4 pt-md-1"><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/buttons.html">Buttons</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/calendar.html">Calendar</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/cards.html">Cards</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/carousel/bootstrap.html">Bootstrap carousel</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/carousel/swiper.html">Swiper</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/collapse.html">Collapse</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/cookie-notice.html">Cookie notice</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/countup.html">Countup</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/draggable.html">Draggable</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/dropdowns.html">Dropdowns</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/jquery-components.html">Jquery<span class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/list-group.html">List group</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column mt-xxl-4 pt-xxl-1"><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/modals.html">Modals</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/navs-and-tabs/navs.html">Navs</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/navs-and-tabs/navbar.html">Navbar</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/navs-and-tabs/vertical-navbar.html">Navbar vertical</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/navs-and-tabs/top-navbar.html">Top nav</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/navs-and-tabs/double-top-navbar.html">Double top<span class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/navs-and-tabs/combo-navbar.html">Combo nav</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/navs-and-tabs/tabs.html">Tabs</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/offcanvas.html">Offcanvas</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/pictures/avatar.html">Avatar</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/pictures/images.html">Images</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/pictures/figures.html">Figures</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column mt-xxl-4 pt-xxl-1"><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/pictures/hoverbox.html">Hoverbox</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/pictures/lightbox.html">Lightbox</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/progress-bar.html">Progress bar</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/placeholder.html">Placeholder</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/pagination.html">Pagination</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/popovers.html">Popovers</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/scrollspy.html">Scrollspy</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/search.html">Search</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/spinners.html">Spinners</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Forms</p><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/basic/form-control.html">Form control</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/basic/input-group.html">Input group</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/basic/select.html">Select</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/basic/checks.html">Checks</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/basic/range.html">Range</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/basic/layout.html">Layout</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/advance/advance-select.html">Advance select</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/advance/date-picker.html">Date picker</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/advance/editor.html">Editor</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/advance/emoji-button.html">Emoji button</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/advance/file-uploader.html">File uploader</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/advance/input-mask.html">Input mask</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/advance/range-slider.html">Range slider</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/advance/rating.html">Rating</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/floating-labels.html">Floating labels</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Tables</p><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/wizard.html">Wizard</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/forms/validation.html">Validation</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/tables/basic-tables.html">Basic tables</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Charts</p><a class="nav-link py-1 link-600 fw-medium" href="../modules/tables/advance-tables.html">Advance tables</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">ECharts</p><a class="nav-link py-1 link-600 fw-medium" href="../modules/tables/bulk-select.html">Bulk select</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/chartjs.html">Chartjs</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/d3js.html">D3js<span class="badge rounded-pill ms-2 badge-subtle-success">New</span></a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/line-charts.html">Line charts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/bar-charts.html">Bar charts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/candlestick-charts.html">Candlestick charts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/geo-map.html">Geo map</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/scatter-charts.html">Scatter charts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/pie-charts.html">Pie charts</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Utilities</p><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/timeline.html">Timeline</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/toasts.html">Toasts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/tooltips.html">Tooltips</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/treeview.html">Treeview</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/typed-text.html">Typed text</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/videos/embed.html">Embed</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/components/videos/plyr.html">Plyr</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/utilities/borders.html">Borders</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/utilities/clearfix.html">Clearfix</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/utilities/colors.html">Colors</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/utilities/colored-links.html">Colored links</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/utilities/display.html">Display</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/utilities/flex.html">Flex</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/utilities/float.html">Float</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/utilities/grid.html">Grid</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-xxl-3">
                                                    <div class="nav flex-column pt-xxl-1">
                                                        <p class="nav-link text-700 mb-0 fw-bold">Icons</p><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/gauge-charts.html">Gauge charts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/radar-charts.html">Radar charts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/heatmap-charts.html">Heatmap charts</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/charts/echarts/how-to-use.html">How to use</a>
                                                        <p class="nav-link text-700 mb-0 fw-bold">Maps</p><a class="nav-link py-1 link-600 fw-medium" href="../modules/icons/font-awesome.html">Font awesome</a><a class="nav-link py-1 link-600 fw-medium" href="../modules/icons/bootstrap-icons.html">Bootstrap icons</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="documentations">Documentation</a>
                                <div class="dropdown-menu dropdown-caret dropdown-menu-card border-0 mt-0" aria-labelledby="documentations">
                                    <div class="bg-white dark__bg-1000 rounded-3 py-2"><a class="dropdown-item link-600 fw-medium" href="../documentation/getting-started.html">Getting started</a><a class="dropdown-item link-600 fw-medium" href="../documentation/customization/configuration.html">Configuration</a><a class="dropdown-item link-600 fw-medium" href="../documentation/customization/styling.html">Styling<span class="badge rounded-pill ms-2 badge-subtle-success">Updated</span></a><a class="dropdown-item link-600 fw-medium" href="../documentation/customization/dark-mode.html">Dark mode</a><a class="dropdown-item link-600 fw-medium" href="../documentation/customization/plugin.html">Plugin</a><a class="dropdown-item link-600 fw-medium" href="../documentation/faq.html">Faq</a><a class="dropdown-item link-600 fw-medium" href="../documentation/gulp.html">Gulp</a><a class="dropdown-item link-600 fw-medium" href="../documentation/design-file.html">Design file</a><a class="dropdown-item link-600 fw-medium" href="../changelog.html">Changelog</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="row mb-3">
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div class="row flex-between-center">
                                    <div class="col-md">
                                        <h5 class="mb-2 mb-md-0 text-light"><?= ucwords($title) ?></h5>
                                    </div>
                                    <div class="col-auto">
                                        <form class="row align-items-center g-3">
                                            <div class="col-auto">
                                                <h6 class="mb-0 text-light">Menampilkan data untuk tahun:</h6>
                                            </div>
                                            <div class="col-md-auto position-relative">
                                                <select name="tahun" id="tahun" class="form-select form-select-sm">
                                                    <?php echo $tahun_opt ?>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-xxl-12 col-xl-12">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="row flex-between-end">
                                            <div class="col-auto align-self-center">
                                                <h5 class="mb-0" data-anchor="data-anchor"><?php echo $arr_desc_page['title'] ?></h5>
                                                <p class="mb-0 pt-1 mt-2 mb-4"><?php echo $arr_desc_page['desc'] ?></p>
                                            </div>
                                            <div class="col-auto ms-auto">
                                                <div class="nav nav-pills nav-pills-falcon flex-grow-1 mt-2" role="tablist">
                                                    <button class="btn btn-sm active" data-bs-toggle="pill" data-bs-target="#dom-6051de4d-ccec-4af3-b073-a2ca2698d894" type="button" role="tab" aria-controls="dom-6051de4d-ccec-4af3-b073-a2ca2698d894" aria-selected="true" id="tab-dom-6051de4d-ccec-4af3-b073-a2ca2698d894">Preview</button>
                                                    <button class="btn btn-sm" data-bs-toggle="pill" data-bs-target="#dom-7cde474a-a9f7-44b6-92d0-903f3a1e2f11" type="button" role="tab" aria-controls="dom-7cde474a-a9f7-44b6-92d0-903f3a1e2f11" aria-selected="false" id="tab-dom-7cde474a-a9f7-44b6-92d0-903f3a1e2f11">Code</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="tab-content">
                                            <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-6051de4d-ccec-4af3-b073-a2ca2698d894" id="dom-6051de4d-ccec-4af3-b073-a2ca2698d894">
                                                <table class="table table-bordered table-striped fs--1 mb-0 responsive nowrap" id="table-perkara">
                                                    <thead class="bg-200 text-900" id="thead-perkara">
                                                        <?php echo $thead ? $thead : '<tr><th class="sort" data-sort="no_perkara_tk_i">No Perkara Tk I</th><th class="sort" data-sort="no_perkara_banding">No Perkara Banding</th><th class="sort" data-sort="tgl_daftar_banding">Tanggal Daftar Banding</th><th class="sort" data-sort="tgl_putus_banding">Tanggal Putus Banding</th><th class="sort" data-sort="tgl_minutasi_banding">Tanggal Minutasi Banding</th></tr>' ?>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2023 &copy; <a href="https://themewagon.com">Themewagon</a></p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">v3.17.0</p>
                    </div>
                </div>
            </footer>
        </div>
        <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
            <div class="modal-dialog mt-6" role="document">
                <div class="modal-content border-0">
                    <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                        <div class="position-relative z-1" data-bs-theme="light">
                            <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                            <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
                        </div>
                        <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4 px-5">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="modal-auth-name">Name</label>
                                <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="modal-auth-email">Email address</label>
                                <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                            </div>
                            <div class="row gx-2">
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label" for="modal-auth-password">Password</label>
                                    <input class="form-control" type="password" autocomplete="on" id="modal-auth-password" />
                                </div>
                                <div class="mb-3 col-sm-6">
                                    <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                                    <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" />
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" />
                                <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                            </div>
                        </form>
                        <div class="position-relative mt-5">
                            <hr />
                            <div class="divider-content-center">or register with</div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                            <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
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
    <script src="<?php echo base_url() ?>vendors/chart/chart.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/countup/countUp.umd.js"></script>
    <script src="<?php echo base_url() ?>vendors/echarts/echarts.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/dayjs/dayjs.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/fontawesome/all.min.js"></script>
    <script src="<?php echo base_url() ?>vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?php echo base_url() ?>vendors/list.js/list.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/dataTables/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/dataTables/dataTables.responsive.min.js"></script>

    <script type="text/javascript">
        // $.fn.dataTable.ext.classes.sPageButton = 'px-4 ms-2'
        $(document).ready(() => {
            var datatable = $('#table-perkara').DataTable({
                "processing": true,
                "serverside": true,
                "bSort": false,
                "bInfo": false,
                "paging": true,
                "responsive": {
                    details: true
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>get_data_cakap/" + $('#tahun').val() + "/" + "<?php echo $id_statistik ?>",
                    "type": "POST",
                    "dataFilter": function(data) {
                        var jsondata = jQuery.parseJSON(data);
                        if (jsondata.st == 1) {
                            var ndata = {};
                            ndata.recordsTotal = jsondata.data.recordsTotal;
                            ndata.recordsFiltered = jsondata.data.recordsFiltered;
                            ndata.data = jsondata.data.data;
                            return JSON.stringify(ndata);
                        } else {
                            showNotif('Display Table', jsondata.msg);
                        }
                    }
                },
                "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-1 col-md-1'i><'ml-1'p>>",
                "initComplete": function(settings, json) {}
            });
            $('#tahun').on('change', function() {
                datatable.ajax.url("<?php echo base_url() ?>get_data_cakap/" + $('#tahun').val() + "/" + "<?php echo $id_statistik ?>");
                datatable.ajax.reload();
            });
        })
    </script>

</body>

</html>