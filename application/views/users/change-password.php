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
            <?php echo validation_errors('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">×</a>','</div>'); ?>
            <?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?> <?php
            if(isset($errors) && $errors != '')
                echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$errors.'</div>';
            ?>
            <div class="panel">
                <div class="panel-content">
                    <?php
                    echo form_open();?>
                    <div class="form-group">
                        <?php
                        echo form_label('Old password');
                        echo form_password('old_password', '', array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('New password');
                        echo form_password('new_password', '', array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('New password confirmation');
                        echo form_password('user_password2', '', array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_submit('submit', 'Update', array('class'=>'btn btn-primary'));

                        ?>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
