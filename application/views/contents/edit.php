<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-file" aria-hidden="true"></i><a href="#">Contents</a></li>
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

                        echo form_label('Shelter');

                        echo '<select name="id_shelter" class="form-control">';
                        if($shelters):
                            foreach ($shelters as $shelter):
                                echo '<option value="'.$shelter->id.'"';
                                if($shelter->id == $content->id_shelter ) echo ' selected="selected"';
                                echo '>'.$shelter->name.'</option>';
                            endforeach;
                        endif;
                        echo '</select>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Site');

                        echo '<select name="id_site" class="form-control">';
                        if($sites):
                            foreach ($sites as $site):
                                echo '<option value="'.$site->id.'"';
                                if($site->id == $content->id_site ) echo ' selected="selected"';
                                echo '>'.$site->name.'</option>';
                            endforeach;
                        endif;
                        echo '</select>';
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
