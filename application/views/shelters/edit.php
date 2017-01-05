<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-building" aria-hidden="true"></i><a href="#">Shelters</a></li>
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
                    echo form_open();
                    ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Name');
                        echo form_input('name', $shelter->name, array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('MAC address');
                        echo form_input('mac', $shelter->mac, array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Latitude');
                        echo form_input('lat', $shelter->lat, array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Longitude');
                        echo form_input('lng', $shelter->lng, array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_submit('submit', 'Update', array('class'=>'btn btn-primary'));


                        echo form_close();
                        ?></div>
                </div>
            </div>
        </div>
    </div>
