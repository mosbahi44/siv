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
            <?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?>
            <div class="panel">
                <div class="panel-content">

                    <?php
                    echo form_open_multipart(base_url('index.php/ads/edit/'.$ad->id));
                    ?>
                    <div class="form-group">
                        <?php

                        echo form_label('Shelter');

                       echo '<br>'.$CI->getShelterName($ad->id_shelter);

                        ?>
                    </div>
                    <div class="form-group">
                        <?php

                        echo form_label('Frequency');
                        echo '<select name="id_frequency" class="form-control">';
                        if($frequencies):
                            foreach ($frequencies as $frequency):
                                echo '<option value="'.$frequency->id.'"';
                                if($ad->id_frequency == $frequency->id) echo 'selected="selected"';
                                echo '>'.$frequency->name.'</option>';
                            endforeach;
                        endif;
                        echo '</select>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $videos = $CI->getVideos($ad->id);
                        if($videos):
                            ?>
                            <h4>Videos</h4>
                            <table class="table table-striped table-hover table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                foreach($videos as $video):
                                    ?>
                                    <tr>
                                        <td><?= $video->video;?></td>
                                        <td>
                                            <a href="<?= base_url('index.php/ads/preview/'.$video->video);?>" target="_blank" class="btn btn-transparent"><i class="fa fa-eye"></i></a>
                                            <a href="<?= base_url('index.php/ads/deleteVideo/'.$ad->id.'/'.$video->id);?>" class="btn btn-transparent"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                            <?php
                        else:
                            echo '<div class="alert alert-warning fade in">There is no video!</div>';
                        endif;
                        ?>
                    </div>
                    <div class="form-group">
                        <h4>Add more videos</h4>
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
