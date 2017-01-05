<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-cubes" aria-hidden="true"></i><a href="#">Roles</a></li>
            </ul>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b><a href="<?= base_url('index.php/roles/add');?>" class="badge x-info b-rounded"><i class="fa fa-plus"></i> Add new role</a></b></h4>
            <?php
            if(isset($error) && $error != '')
                echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$error.'</div>';
            ?>
            <?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?>

            <?php
            if($roles):?>
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
                            foreach($roles as $role):
                            ?>
                            <tr>
                                <td><?= $role->name;?></td>
                                <td>
                                    <a href="<?= base_url('index.php/roles/edit/'.$role->id);?>" class="btn btn-transparent"><i class="fa fa-pencil"></i></a>
                                    <a href="<?= base_url('index.php/roles/delete/'.$role->id);?>" class="btn btn-transparent"><i class="fa fa-trash"></i></a>
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
            echo '<div class="alert alert-warning fade in">There is no role yet!</div>';
        endif;?>

    </div>
</div>
