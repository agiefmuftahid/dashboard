<!-- Side Navbar -->
<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="<?php echo base_url() ?>index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2" src="<?php echo base_url() ?>assets/img/logo-sindiran.png" alt="" width="40" /><span class="font-sans-serif">sindiran</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <!-- parent pages-->
                    <a class="nav-link <?php echo $menu == 'dashboard' ? 'active' : '' ?>" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Data
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- pages-->
                    <a class="nav-link <?php echo $menu == 'data_advokat' ? 'active' : '' ?>" href="<?php echo base_url() ?>advokat" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">Advokat</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Master Data
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages-->
                    <a class="nav-link <?php echo $menu == 'data_pegawai' ? 'active' : '' ?>" href="<?php echo base_url() ?>pegawai" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text ps-1">Pegawai</span>
                        </div>
                    </a>
                    <!-- parent pages-->
                    <a class="nav-link" href="<?php echo base_url() ?>pengguna" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-cog"></span></span><span class="nav-link-text ps-1">Pengguna</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end of Side Navbar -->