<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-picture-o" aria-hidden="true"></i><a href="#">Ads</a></li>
            </ul>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <?php echo validation_errors('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">×</a>','</div>'); ?>
            <?php
            if(isset($upload_error)) echo '<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$upload_error.'</div>';
            ?>
            <div class="panel">
                <div class="panel-content">

                    <?php
                    echo form_open_multipart();
                    ?>
                    <div class="form-group">
                        <?php

                        echo form_label('Shelter');

                        echo '<select name="id_shelter" class="form-control">';
                        if($shelters):
                            foreach ($shelters as $shelter):
                                echo '<option value="'.$shelter->id.'">'.$shelter->name.'</option>';
                            endforeach;
                        endif;
                        echo '</select>';

                        ?>
                    </div>
                    <div class="form-group">
                        <?php

                        echo form_label('Frequency');
                        echo '<select name="id_frequency" class="form-control">';
                        if($frequencies):
                            foreach ($frequencies as $frequency):
                                echo '<option value="'.$frequency->id.'">'.$frequency->name.'</option>';
                            endforeach;
                        endif;
                        echo '</select>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php

                        echo '<div class="videos">';
                        echo form_upload('videos[]', set_value('videos[]'), array('class'=>'form-control'));
                        echo '</div>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo '<div class="add-more"><i style="cursor: pointer" class="fa fa-plus"></i></div>';
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
