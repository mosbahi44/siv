<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-link" aria-hidden="true"></i><a href="#">Sites</a></li>
            </ul>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <?php
            if($this->session->userdata('add_site')) {
                ?><h4 class="section-subtitle"><b><a href="<?= base_url('index.php/sites/add'); ?>" class="badge x-info b-rounded"><i
                            class="fa fa-plus"></i> Add new site</a></b></h4>
                <?php
            }
            ?><?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?>


            <?php
            if($sites):?>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($sites as $site):?>
                                <tr>
                                    <td><?= $site->name;?></td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a target="_blank" href="<?= base_url('index.php/sites/preview'.$site->id);?>" class="btn btn-transparent"><i class="fa fa-link"></i></a>
                                <?php
                                if($this->session->userdata('delete_site')) {
                                    ?>
                                    <a href="<?= base_url('index.php/sites/delete/' . $site->id); ?>"
                                       class="btn btn-transparent"><i class="fa fa-trash"></i></a>
                                    <?php
                                }
                                    ?>    </div>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <?php
                else:
                    echo '<div class="alert alert-warning fade in">There is no site yet!</div>';
                endif;?>
            </div>
        </div>
    </div>
