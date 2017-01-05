<!-- LEFT SIDEBAR -->
<!-- ========================================================= -->
<div class="left-sidebar">
    <!-- left sidebar HEADER -->
    <div class="left-sidebar-header">
        <div class="left-sidebar-title">Navigation</div>
        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
            <span></span>
        </div>
    </div>
    <!-- NAVIGATION -->
    <!-- ========================================================= -->
    <div id="left-nav" class="nano">
        <div class="nano-content">
            <nav>
                <ul class="nav" id="main-nav">
                    <!--HOME-->
                    
                    <li class="<?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard') echo 'active-item';?>"><a href="<?= base_url('index.php/dashboard');?>"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                    <?php if($this->session->userdata('view_user')) { ?>
                        <li class="<?php if ($this->uri->segment(1) == 'users') echo 'active-item'; ?>"><a
                                href="<?= base_url('index.php/users'); ?>"><i class="fa fa-users"
                                                                              aria-hidden="true"></i><span>Users</span></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php if($this->session->userdata('role_id') == 1) { ?>
                        <li class="<?php if ($this->uri->segment(1) == 'roles') echo 'active-item'; ?>"><a
                                href="<?= base_url('index.php/roles'); ?>"><i class="fa fa-cubes"
                                                                              aria-hidden="true"></i><span>Roles</span></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_shelter')) { ?>
                        <li class="<?php if ($this->uri->segment(1) == 'shelters') echo 'active-item'; ?>"><a
                                href="<?= base_url('index.php/shelters'); ?>"><i class="fa fa-building"
                                                                                 aria-hidden="true"></i><span>Shelters</span></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_content')) { ?>
                    <li class="<?php if($this->uri->segment(1) == 'contents') echo 'active-item';?>"><a href="<?= base_url('index.php/contents');?>"><i class="fa fa-file" aria-hidden="true"></i><span>Contents</span></a></li>
                    <?php 
                    }
                     ?>
                    <?php if($this->session->userdata('view_ads')) { ?>
                        <li class="<?php if ($this->uri->segment(1) == 'ads') echo 'active-item'; ?>"><a
                                href="<?= base_url('index.php/ads'); ?>"><i class="fa fa-picture-o"
                                                                            aria-hidden="true"></i><span>Ads</span></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_site')) { ?>
                        <li class="<?php if ($this->uri->segment(1) == 'sites') echo 'active-item'; ?>"><a
                                href="<?= base_url('index.php/sites'); ?>"><i class="fa fa-link" aria-hidden="true"></i><span>Sites</span></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_partner')) { ?>
                        <li class="<?php if ($this->uri->segment(1) == 'partners') echo 'active-item'; ?>"><a
                                href="<?= base_url('index.php/partners'); ?>"><i class="fa fa-user-secret"
                                                                                 aria-hidden="true"></i><span>Partners</span></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_message')) { ?>
                        <li class="<?php if ($this->uri->segment(1) == 'messages') echo 'active-item'; ?>"><a
                                href="<?= base_url('index.php/messages'); ?>"><i class="fa fa-envelope"
                                                                                 aria-hidden="true"></i><span>Messages</span></a>
                        </li>
                        <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_log')) { ?>
                        <li class="<?php if ($this->uri->segment(1) == 'logs') echo 'active-item'; ?>"><a
                                href="<?= base_url('index.php/logs'); ?>"><i class="fa fa-bell"
                                                                             aria-hidden="true"></i><span>Logs</span></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>