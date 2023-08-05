<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

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

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem("isFluid"));
                if (isFluid) {
                    var container = document.querySelector("[data-layout]");
                    container.classList.remove("container");
                    container.classList.add("container-fluid");
                }
            </script>

            <!-- Side Navbar -->
            <?php $this->load->view('layout/sidebar_default') ?>
            <!-- end of Side Navbar -->

            <div class="content">

                <!-- Top Nav -->
                <?php $this->load->view('layout/top_navbar_default') ?>
                <!-- end of Top Nav -->

                <div class="card mb-3">
                    <div class="card-header position-relative min-vh-25 mb-7">
                        <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(<?php echo base_url() ?>assets/img/generic/4.jpg);">
                        </div>
                        <!--/.bg-holder-->

                        <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="<?php echo base_url() ?>assets/img/team/2.jpg" width="200" alt="" /></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mb-1"> Anthony Hopkins<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                                </h4>
                                <h5 class="fs-0 fw-normal">Senior Software Engineer at Technext Limited</h5>
                                <p class="text-500">New York, USA</p>
                                <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
                                <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
                                <div class="border-bottom border-dashed my-4 d-lg-none"></div>
                            </div>
                            <div class="col ps-2 ps-lg-3"><a class="d-flex align-items-center mb-2" href="#"><span class="fas fa-user-circle fs-3 me-2 text-700" data-fa-transform="grow-2"></span>
                                    <div class="flex-1">
                                        <h6 class="mb-0">See followers (330)</h6>
                                    </div>
                                </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="<?php echo base_url() ?>assets/img/logos/g.png" alt="Generic placeholder image" width="30" />
                                    <div class="flex-1">
                                        <h6 class="mb-0">Google</h6>
                                    </div>
                                </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="<?php echo base_url() ?>assets/img/logos/apple.png" alt="Generic placeholder image" width="30" />
                                    <div class="flex-1">
                                        <h6 class="mb-0">Apple</h6>
                                    </div>
                                </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="<?php echo base_url() ?>assets/img/logos/hp.png" alt="Generic placeholder image" width="30" />
                                    <div class="flex-1">
                                        <h6 class="mb-0">Hewlett Packard</h6>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-8 pe-lg-2">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Intro</h5>
                            </div>
                            <div class="card-body text-justify">
                                <p class="mb-0 text-1000">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking.</p>
                                <div class="collapse show" id="profile-intro">
                                    <p class="mt-3 text-1000">I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. </p>
                                    <p class="text-1000">It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face.</p>
                                    <p class="text-1000 mb-0">There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</p>
                                </div>
                            </div>
                            <div class="card-footer bg-light p-0 border-top">
                                <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show <span class="less">less<span class="fas fa-chevron-up ms-2 fs--2"></span></span><span class="full">full<span class="fas fa-chevron-down ms-2 fs--2"></span></span></button>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-light d-flex justify-content-between">
                                <h5 class="mb-0">Associations</h5><a class="font-sans-serif" href="<?php echo base_url() ?>pages/miscellaneous/associations.html">All Associations</a>
                            </div>
                            <div class="card-body fs--1 pb-0">
                                <div class="row">
                                    <div class="col-sm-6 mb-3">
                                        <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="<?php echo base_url() ?>assets/img/logos/apple.png" alt="" width="50" />
                                            <div class="flex-1">
                                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="#!">Apple</a></h6>
                                                <p class="mb-1">3243 associates</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="<?php echo base_url() ?>assets/img/logos/g.png" alt="" width="50" />
                                            <div class="flex-1">
                                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="#!">Google</a></h6>
                                                <p class="mb-1">34598 associates</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="<?php echo base_url() ?>assets/img/logos/intel-2.png" alt="" width="50" />
                                            <div class="flex-1">
                                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="#!">Intel</a></h6>
                                                <p class="mb-1">7652 associates</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="<?php echo base_url() ?>assets/img/logos/facebook.png" alt="" width="50" />
                                            <div class="flex-1">
                                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="#!">Facebook</a></h6>
                                                <p class="mb-1">765 associates</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-light d-flex justify-content-between">
                                <h5 class="mb-0">Activity log</h5><a class="font-sans-serif" href="<?php echo base_url() ?>app/social/activity-log.html">All logs</a>
                            </div>
                            <div class="card-body fs--1 p-0">
                                <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-xl me-3">
                                            <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">🎁</span></div>
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>Jennifer Kent</strong> Congratulated <strong>Anthony Hopkins</strong></p>
                                        <span class="notification-time">November 13, 5:00 Am</span>

                                    </div>
                                </a>

                                <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-xl me-3">
                                            <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">🏷️</span></div>
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>California Institute of Technology</strong> tagged <strong>Anthony Hopkins</strong> in a post.</p>
                                        <span class="notification-time">November 8, 5:00 PM</span>

                                    </div>
                                </a>

                                <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-xl me-3">
                                            <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">📋️</span></div>
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>Anthony Hopkins</strong> joined <strong>Victory day cultural Program</strong> with <strong>Tony Stark</strong></p>
                                        <span class="notification-time">November 01, 11:30 AM</span>

                                    </div>
                                </a>

                                <a class="notification border-x-0 border-bottom-0 border-300 rounded-top-0" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-xl me-3">
                                            <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">📅️</span></div>
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>Massachusetts Institute of Technology</strong> invited <strong>Anthony Hopkin</strong> to an event</p>
                                        <span class="notification-time">October 28, 12:00 PM</span>

                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="card mb-3 mb-lg-0">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Photos</h5>
                            </div>
                            <div class="card-body overflow-hidden">
                                <div class="row g-0">
                                    <div class="col-6 p-1"><a class="glightbox" href="<?php echo base_url() ?>assets/img/generic/4.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="<?php echo base_url() ?>assets/img/generic/4.jpg" alt="..." /></a></div>
                                    <div class="col-6 p-1"><a class="glightbox" href="<?php echo base_url() ?>assets/img/generic/5.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="<?php echo base_url() ?>assets/img/generic/5.jpg" alt="..." /></a></div>
                                    <div class="col-4 p-1"><a class="glightbox" href="<?php echo base_url() ?>assets/img/gallery/4.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="<?php echo base_url() ?>assets/img/gallery/4.jpg" alt="..." /></a></div>
                                    <div class="col-4 p-1"><a class="glightbox" href="<?php echo base_url() ?>assets/img/gallery/5.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="<?php echo base_url() ?>assets/img/gallery/5.jpg" alt="..." /></a></div>
                                    <div class="col-4 p-1"><a class="glightbox" href="<?php echo base_url() ?>assets/img/gallery/3.jpg" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="<?php echo base_url() ?>assets/img/gallery/3.jpg" alt="..." /></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ps-lg-2">
                        <div class="sticky-sidebar">
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Experience</h5>
                                </div>
                                <div class="card-body fs--1">
                                    <div class="d-flex"><a href="#!"> <img class="img-fluid" src="<?php echo base_url() ?>assets/img/logos/g.png" alt="" width="56" /></a>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0">Big Data Engineer<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                                            </h6>
                                            <p class="mb-1"> <a href="#!">Google</a></p>
                                            <p class="text-1000 mb-0">Apr 2012 - Present &bull; 6 yrs 9 mos</p>
                                            <p class="text-1000 mb-0">California, USA</p>
                                            <div class="border-bottom border-dashed my-3"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex"><a href="#!"> <img class="img-fluid" src="<?php echo base_url() ?>assets/img/logos/apple.png" alt="" width="56" /></a>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0">Software Engineer<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                                            </h6>
                                            <p class="mb-1"> <a href="#!">Apple</a></p>
                                            <p class="text-1000 mb-0">Jan 2012 - Apr 2012 &bull; 4 mos</p>
                                            <p class="text-1000 mb-0">California, USA</p>
                                            <div class="border-bottom border-dashed my-3"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex"><a href="#!"> <img class="img-fluid" src="<?php echo base_url() ?>assets/img/logos/nike.png" alt="" width="56" /></a>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0">Mobile App Developer<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                                            </h6>
                                            <p class="mb-1"> <a href="#!">Nike</a></p>
                                            <p class="text-1000 mb-0">Jan 2011 - Apr 2012 &bull; 1 yr 4 mos</p>
                                            <p class="text-1000 mb-0">Beaverton, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Education</h5>
                                </div>
                                <div class="card-body fs--1">
                                    <div class="d-flex"><a href="#!">
                                            <div class="avatar avatar-3xl">
                                                <div class="avatar-name rounded-circle"><span>SU</span></div>
                                            </div>
                                        </a>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0"> <a href="#!">Stanford University<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></a></h6>
                                            <p class="mb-1">Computer Science and Engineering</p>
                                            <p class="text-1000 mb-0">2010 - 2014 • 4 yrs</p>
                                            <p class="text-1000 mb-0">California, USA</p>
                                            <div class="border-bottom border-dashed my-3"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex"><a href="#!"> <img class="img-fluid" src="<?php echo base_url() ?>assets/img/logos/staten.png" alt="" width="56" /></a>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0"> <a href="#!">Staten Island Technical High School<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></a></h6>
                                            <p class="mb-1">Higher Secondary School Certificate, Science</p>
                                            <p class="text-1000 mb-0">2008 - 2010 &bull; 2 yrs</p>
                                            <p class="text-1000 mb-0">New York, USA</p>
                                            <div class="border-bottom border-dashed my-3"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex"><a href="#!"> <img class="img-fluid" src="<?php echo base_url() ?>assets/img/logos/tj-heigh-school.png" alt="" width="56" /></a>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0"> <a href="#!">Thomas Jefferson High School for Science and Technology<span data-bs-toggle="tooltip" data-bs-placement="top" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span></a></h6>
                                            <p class="mb-1">Secondary School Certificate, Science</p>
                                            <p class="text-1000 mb-0">2003 - 2008 &bull; 5 yrs</p>
                                            <p class="text-1000 mb-0">Alexandria, USA</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 mb-lg-0">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Events</h5>
                                </div>
                                <div class="card-body fs--1">
                                    <div class="d-flex btn-reveal-trigger">
                                        <div class="calendar"><span class="calendar-month">Feb</span><span class="calendar-day">21</span></div>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0"><a href="<?php echo base_url() ?>app/events/event-detail.html">Newmarket Nights</a></h6>
                                            <p class="mb-1">Organized by <a href="#!" class="text-700">University of Oxford</a></p>
                                            <p class="text-1000 mb-0">Time: 6:00AM</p>
                                            <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge
                                            <div class="border-bottom border-dashed my-3"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex btn-reveal-trigger">
                                        <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">31</span></div>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0"><a href="<?php echo base_url() ?>app/events/event-detail.html">31st Night Celebration</a></h6>
                                            <p class="mb-1">Organized by <a href="#!" class="text-700">Chamber Music Society</a></p>
                                            <p class="text-1000 mb-0">Time: 11:00PM</p>
                                            <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York
                                            <div class="border-bottom border-dashed my-3"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex btn-reveal-trigger">
                                        <div class="calendar"><span class="calendar-month">Dec</span><span class="calendar-day">16</span></div>
                                        <div class="flex-1 position-relative ps-3">
                                            <h6 class="fs-0 mb-0"><a href="<?php echo base_url() ?>app/events/event-detail.html">Folk Festival</a></h6>
                                            <p class="mb-1">Organized by <a href="#!" class="text-700">Harvard University</a></p>
                                            <p class="text-1000 mb-0">Time: 9:00AM</p>
                                            <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter Square, North Cambridge
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link d-block w-100" href="<?php echo base_url() ?>app/events/event-list.html">All Events<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header bg-light">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0" id="followers">Followers <span class="d-none d-sm-inline-block">(233)</span></h5>
                            </div>
                            <div class="col text-end"><a class="font-sans-serif" href="<?php echo base_url() ?>app/social/followers.html">All Members</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light px-1 py-0">
                        <div class="row g-0 text-center fs--1">
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/1.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Emilia Clarke</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Technext limited</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/2.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Kit Harington</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Harvard Korea Society</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/3.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Sophie Turner</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Graduate Student Council</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/4.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Peter Dinklage</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Art Club, MIT</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/5.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Nikolaj Coster</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Archery Club, MIT</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/6.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Isaac Hempstead</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Asymptones</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/7.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Alfie Allen</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Brain Trust</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/8.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Iain Glen</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">GSAS Action Coalition</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/9.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Liam Cunningham</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Caving Club, MIT</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/10.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">John Bradley</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Chess Club</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/11.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Rory McCann</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Chamber Music Society</a></p>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                                <div class="bg-white dark__bg-1100 p-3 h-100"><a href="<?php echo base_url() ?>pages/user/profile.html"><img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="<?php echo base_url() ?>assets/img/team/12.jpg" alt="" width="100" /></a>
                                    <h6 class="mb-1"><a href="<?php echo base_url() ?>pages/user/profile.html">Joe Dempsie</a>
                                    </h6>
                                    <p class="fs--2 mb-1"><a class="text-700" href="#!">Clubchem</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">
                                Thank you for creating with Falcon
                                <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" />
                                2023 &copy; <a href="https://themewagon.com">Themewagon</a>
                            </p>
                        </div>
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">v3.16.0</p>
                        </div>
                    </div>
                </footer>
            </div>
            <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
                <div class="modal-dialog mt-6" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                            <div class="position-relative z-1" data-bs-theme="light">
                                <h4 class="mb-0 text-white" id="authentication-modal-label">
                                    Register
                                </h4>
                                <p class="fs--1 mb-0 text-white">
                                    Please create your free Falcon account
                                </p>
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
                                    <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and
                                        <a href="#!">privacy policy</a></label>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">
                                        Register
                                    </button>
                                </div>
                            </form>
                            <div class="position-relative mt-5">
                                <hr />
                                <div class="divider-content-center">or register with</div>
                            </div>
                            <div class="row g-2 mt-2">
                                <div class="col-sm-6">
                                    <a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span>
                                        google</a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span>
                                        facebook</a>
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

    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
        <div class="offcanvas-header settings-panel-header bg-shape">
            <div class="z-1 py-1" data-bs-theme="light">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h5 class="text-white mb-0 me-2">
                        <span class="fas fa-palette me-2 fs-0"></span>Settings
                    </h5>
                    <button class="btn btn-primary btn-sm rounded-pill mt-0 mb-0" data-theme-control="reset" style="font-size: 12px">
                        <span class="fas fa-redo-alt me-1" data-fa-transform="shrink-3"></span>Reset
                    </button>
                </div>
                <p class="mb-0 fs--1 text-white opacity-75">
                    Set your own customized style
                </p>
            </div>
            <button class="btn-close btn-close-white z-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body scrollbar-overlay px-x1 h-100" id="themeController">
            <h5 class="fs-0">Color Scheme</h5>
            <p class="fs--1">Choose the perfect color mode for your app.</p>
            <div class="btn-group d-block w-100 btn-group-navbar-style">
                <div class="row gx-2">
                    <div class="col-6">
                        <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" />
                        <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight">
                            <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="<?php echo base_url() ?>assets/img/generic/falcon-mode-default.jpg" alt="" /></span><span class="label-text">Light</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" />
                        <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark">
                            <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="<?php echo base_url() ?>assets/img/generic/falcon-mode-dark.jpg" alt="" /></span><span class="label-text"> Dark</span></label>
                    </div>
                </div>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start">
                    <img class="me-2" src="<?php echo base_url() ?>assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-0">RTL Mode</h5>
                        <p class="fs--1 mb-0">Switch your language direction</p>
                        <a class="fs--1" href="<?php echo base_url() ?>documentation/customization/configuration.html">RTL Documentation</a>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
                </div>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start">
                    <img class="me-2" src="<?php echo base_url() ?>assets/img/icons/arrows-h.svg" width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-0">Fluid Layout</h5>
                        <p class="fs--1 mb-0">Toggle container layout system</p>
                        <a class="fs--1" href="<?php echo base_url() ?>documentation/customization/configuration.html">Fluid Documentation</a>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
                </div>
            </div>
            <hr />
            <div class="d-flex align-items-start">
                <img class="me-2" src="<?php echo base_url() ?>assets/img/icons/paragraph.svg" width="20" alt="" />
                <div class="flex-1">
                    <h5 class="fs-0 d-flex align-items-center">Navigation Position</h5>
                    <p class="fs--1 mb-2">
                        Select a suitable navigation system for your web application
                    </p>
                    <div>
                        <select class="form-select form-select-sm" aria-label="Navbar position" data-theme-control="navbarPosition">
                            <option value="vertical" data-page-url="<?php echo base_url() ?>modules/components/navs-and-tabs/vertical-navbar.html">
                                Vertical
                            </option>
                            <option value="top" data-page-url="<?php echo base_url() ?>modules/components/navs-and-tabs/top-navbar.html">
                                Top
                            </option>
                            <option value="combo" data-page-url="<?php echo base_url() ?>modules/components/navs-and-tabs/combo-navbar.html">
                                Combo
                            </option>
                            <option value="double-top" data-page-url="<?php echo base_url() ?>modules/components/navs-and-tabs/double-top-navbar.html">
                                Double Top
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <hr />
            <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
            <p class="fs--1 mb-0">Switch between styles for your vertical navbar</p>
            <p>
                <a class="fs--1" href="<?php echo base_url() ?>modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See Documentation</a>
            </p>
            <div class="btn-group d-block w-100 btn-group-navbar-style">
                <div class="row gx-2">
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent">
                            <img class="img-fluid img-prototype" src="<?php echo base_url() ?>assets/img/generic/default.png" alt="" /><span class="label-text"> Transparent</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted">
                            <img class="img-fluid img-prototype" src="<?php echo base_url() ?>assets/img/generic/inverted.png" alt="" /><span class="label-text"> Inverted</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card">
                            <img class="img-fluid img-prototype" src="<?php echo base_url() ?>assets/img/generic/card.png" alt="" /><span class="label-text"> Card</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant">
                            <img class="img-fluid img-prototype" src="<?php echo base_url() ?>assets/img/generic/vibrant.png" alt="" /><span class="label-text"> Vibrant</span></label>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <img class="mb-4" src="<?php echo base_url() ?>assets/img/icons/spot-illustrations/47.png" alt="" width="120" />
                <h5>Like What You See?</h5>
                <p class="fs--1">
                    Get Falcon now and create beautiful dashboards with hundreds of
                    widgets.
                </p>
                <a class="mb-3 btn btn-primary" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a>
            </div>
        </div>
    </div>
    <a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
        <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
            <div class="bg-primary-subtle position-relative rounded-start" style="height: 34px; width: 28px">
                <div class="settings-popover">
                    <span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                                </svg></span></span></span>
                </div>
            </div>
            <small class="text-uppercase text-primary fw-bold bg-primary-subtle py-2 pe-2 ps-1 rounded-end">customize</small>
        </div>
    </a>

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel_pegawai').DataTable({
                "processing": true,
                "serverSide": true,
                "fnDrawCallback": function() {
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
                "ajax": {
                    "url": "<?php echo base_url() ?>get_pegawai",
                    "type": "POST"
                },
            });
        });

        function sinkronisasi() {
            return new Promise((resolve, reject) => {
                Swal.fire({
                    title: 'Memperbaharui Data',
                    text: 'Mohon tunggu selagi proses update data',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading()
                    },
                })
                $.ajax({
                    url: '<?php echo base_url() ?>update_data_pegawai',
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(data) {
                        if (data.st == 1) {
                            Swal.fire(
                                'Berhasil',
                                data.msg,
                                'success'
                            ).then(() => {
                                $('#tabel_pegawai').DataTable().ajax.reload();
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

        function cetak() {
            window.open('<?php echo base_url() ?>print_data_pegawai', '_blank');
        }
    </script>

</body>

</html>