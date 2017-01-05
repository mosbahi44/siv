<?php
$CI = &get_instance();
?>
    <div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-users" aria-hidden="true"></i><a href="#">Users</a></li>
            </ul>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
    <div class="col-sm-12">
<?php
if($this->session->userdata('add_user')) {
    ?><h4 class="section-subtitle"><b><a href="<?= base_url('index.php/users/add'); ?>" class="badge x-info b-rounded"><i class="fa fa-plus"></i> Add
            new user</a></b></h4>
    <?php
}
?><?php
if(isset($message) && $message != '')
    echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
?>
<?php
if($users):?>
    <div class="panel">
    <div class="panel-content">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered text-center">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($users as $user):?>
                    <tr>
                        <td><?= $user->name?></td>
                        <td><?= $CI->getUserRole($user->id_role)?></td>
                        <td><?= $user->email?></td>
                        <td>
                            <div class="btn-group btn-group-xs">
                                <?php
                                if($this->session->userdata('edit_user')) {
                                    ?><a href="<?= base_url('index.php/users/edit/' . $user->id); ?>" class="btn btn-transparent"><i
                                            class="fa fa-pencil"></i></a>
                                    <?php
                                }
                                ?>
                                <?php
                                if($this->session->userdata('delete_user') && $this->session->userdata('role_id') != 1) {
                                    ?><a href="<?= base_url('index.php/users/delete/' . $user->id); ?>" class="btn btn-transparent"><i
                                            class="fa fa-trash"></i></a>
                                    <?php
                                }
                                ?>            <?php
                                if($this->session->userdata('edit_user')) {
                                    ?><a href="<?= base_url('index.php/users/resetPassword/'.$user->id);?>" class="btn btn-transparent"><i class="fa fa-key"></i></a>
                                <?php }?>
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
    echo '<div class="alert alert-warning fade in">There is no user yet!</div>';
endif;
