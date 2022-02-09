<!-- Navigation Bar -->

        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordianSidenav">
                        <div class="sidenav-menu-heading">Welcome</div>
                        <!-- Users top menu -->
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
                            <div class="nav-link-icon">

                            </div>
                            Users
                            <div class="sidenav-collapse-arrow">

                            </div>
                        </a>
                        <!-- Users sub-menu -->
                        <div class="collapse" id="collapseUsers" data-bs-parent="#accordionSidenav" style="">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavUsersMenu">
                                <a class="nav-link" href="<?= base_url() . "user/create" ?>">Create</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as</div>
                        <div class="sidenav-footer-title">
                        <?php echo $this->session->userdata('firstname') . " " . $this->session->userdata('lastname'); ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>