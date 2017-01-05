<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-12">
            <div class="row">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--WIDGETBOX-->
                <div class="col-sm-12 col-md-6">
                    <?php if($this->session->userdata('view_shelter')) { ?>
                        <div class="panel widgetbox wbox-2 bg-scale-0">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-building-o color-darker-1"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-darker-1">Shelters</h4>

                                            <h1 class="title color-primary"> <?= count($shelters); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_partner')) { ?>
                        <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-user-secret color-darker-2"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-darker-2">Partners</h4>

                                            <h1 class="title color-darker-2"> <?= count($partners); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_message')) { ?>
                        <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-envelope color-darker"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-darker">Messages</h4>

                                            <h1 class="title color-light"> <?= count($messages); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_site')) { ?>
                        <div class="panel widgetbox wbox-2 bg-scale-0">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-link color-darker-1"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-darker-1">Sites</h4>

                                            <h1 class="title color-primary"> <?= count($sites); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--AREA CHART-->
                <div class="col-sm-12 col-md-6">
                    <?php if($this->session->userdata('role_id') == 1) { ?>
                        <div class="panel widgetbox wbox-2 bg-scale-0">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-cubes color-darker-1"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-darker-1">Roles</h4>

                                            <h1 class="title color-darker-1"> <?= count($roles); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_user')) { ?>
                        <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-users color-darker-2"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-darker-2">Users</h4>

                                            <h1 class="title color-darker-2"> <?= count($users); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>

                    <?php if($this->session->userdata('view_ads')) { ?>
                        <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-image color-darker"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-light">Ads</h4>

                                            <h1 class="title color-light"> <?= count($ads); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if($this->session->userdata('view_content')) { ?>
                        <div class="panel widgetbox wbox-2 bg-scale-0">
                            <a href="#">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="icon fa fa-file color-darker-1"></span>
                                        </div>
                                        <div class="col-xs-8">
                                            <h4 class="subtitle color-darker-1">Contents</h4>

                                            <h1 class="title color-darker-1"> <?= count($contents); ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>


        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>