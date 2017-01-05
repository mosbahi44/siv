<?php $CI = &get_instance();?>
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="#">Messages</a></li>
            </ul>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <?php
            if($this->session->userdata('add_message')) {
                ?><h4 class="section-subtitle"><b><a href="<?= base_url('index.php/messages/add'); ?>" class="badge x-info b-rounded"><i
                            class="fa fa-plus"></i> Add new message</a></b></h4>
            <?php
            }
            ?><?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?>
            <?php
            if($messages):?>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center">
                            <thead>
                            <tr>
                                <th>Shelter</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($messages as $messagex):?>
                                <tr>
                                    <td><?= $CI->getShelterName($messagex->id_shelter)?></td>
                                    <td><?= $messagex->message;?></td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <?php
                                            if($this->session->userdata('edit_message')) {
                                                ?>
                                                <a href="<?= base_url('index.php/messages/edit/' . $messagex->id); ?>"
                                                   class="btn btn-transparent"><i class="fa fa-pencil"></i></a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($this->session->userdata('delete_message')) {
                                                ?>
                                                <a href="<?= base_url('index.php/messages/delete/' . $messagex->id); ?>"
                                                   class="btn btn-transparent"><i class="fa fa-trash"></i></a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($this->session->userdata('message_push')) {
                                                ?>
                                                <a href="<?= base_url('index.php/messages/push/' . $messagex->id); ?>"
                                                   class="badge badge-xs x-danger b-rounded"><i
                                                        class="fa fa-cloud-upload" aria-hidden="true"></i> Push</a>
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
                    echo '<div class="alert alert-warning fade in">There is no message yet!</div>';
                endif;?>
            </div>
        </div>
    </div>
</div>
</div>

