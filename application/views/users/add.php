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
            <div class="panel">
                <div class="panel-content">
                    <?php
                    echo form_open();?>
                    <div class="form-group">
                        <?php
                        echo form_label('Name');
                        echo form_input('name', set_value('name'), array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php

                        echo form_label('Role');

                        echo '<select name="id_role" class="form-control">';
                        if($roles):
                            foreach ($roles as $role):
                                echo '<option value="'.$role->id.'"';
                                echo '>'.$role->name.'</option>';
                            endforeach;
                        endif;
                        echo '</select>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Email');
                        echo form_input('email', set_value('email'), array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Password');
                        echo form_password('user_password', set_value('user_password'), array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Password confirmation');
                        echo form_password('user_password2', set_value('user_password2'), array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_submit('submit', 'Save', array('class'=>'btn btn-primary'));

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
