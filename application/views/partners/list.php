<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-user-secret" aria-hidden="true"></i><a href="#">Partners</a></li>
            </ul>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <?php
            if($this->session->userdata('add_partner')) {
                ?>
                <h4 class="section-subtitle"><b><a href="<?= base_url('index.php/partners/add'); ?>" class="badge x-info b-rounded"><i
                                class="fa fa-plus"></i> Add new partner</a></b></h4>
            <?php
            }
            ?><?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?>

            <?php
            if($partners):?>
            <?php
            if($this->session->userdata('partner_push')) {
                ?>
                <a href="<?= base_url('index.php/partners/push/'); ?>"
                   class="badge x-danger b-rounded"><i
                        class="fa fa-cloud-upload" aria-hidden="true"></i> Push</a>
                <br>
                <br>
            <?php
            }
            ?>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center">
                            <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Url</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($partners as $partner):
                                ?>
                                <tr>
                                    <td><img src="<?= base_url('partners/'.$partner->logo);?>" height="30"></td>
                                    <td><?= $partner->name;?></td>
                                    <td><?= $partner->url;?></td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a target="_blank" href="<?= base_url('index.php/partners/preview/'.$partner->id);?>" class="btn btn-transparent"><i class="fa fa-eye"></i></a>
                                            <?php
                                            if($this->session->userdata('delete_partner')) {
                                                ?>
                                                <a href="<?= base_url('index.php/partners/delete/' . $partner->id); ?>"
                                                   class="btn btn-transparent"><i class="fa fa-trash"></i></a>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php
else:
    echo '<div class="alert alert-warning fade in">There is no partner yet!</div>';
endif;
