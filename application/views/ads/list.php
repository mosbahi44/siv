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
            <?php
            if($this->session->userdata('add_ads')) {
                ?>
                <h4 class="section-subtitle"><b><a href="<?= base_url('index.php/ads/add'); ?>" class="badge x-info b-rounded"><i
                                class="fa fa-plus"></i> Add new ad</a></b></h4>
            <?php
            }
            ?>
            <?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?>
            <?php
            if(isset($errors) && $errors != '')
                echo '<div class="alert alert-warning fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$errors.'</div>';
            ?>

            <?php
            if($ads):?>
                <div class="panel">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>Shelter</th>
                                    <th>Frequency</th>
                                    <th>Nb videos</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($ads as $ad):  ?>
                                    <tr>
                                        <td><?= $CI->getShelterName($ad->id_shelter)?></td>
                                        <td><?= $CI->getFrequency($ad->id_frequency);?> min</td>
                                        <td><?php
                                            $videos = $CI->getVideos($ad->id);
                                            $count = count($videos);
                                            echo $count
                                            ?></td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <?php
                                                if($this->session->userdata('edit_ads')) {
                                                    ?>
                                                    <a href="<?= base_url('index.php/ads/edit/' . $ad->id); ?>"
                                                       class="btn btn-transparent"><i class="fa fa-pencil"></i></a>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if($this->session->userdata('delete_ads')) {
                                                    ?>
                                                    <a href="<?= base_url('index.php/ads/delete/' . $ad->id); ?>"
                                                       class="btn btn-transparent"><i class="fa fa-trash"></i></a>
                                                <?php
                                                }
                                                ?>
                                                <?php
                                                if($this->session->userdata('ads_push')) {
                                                    ?>
                                                    <a href="<?= base_url('index.php/ads/push/' . $ad->id); ?>"
                                                       class="badge badge-xs x-danger b-rounded"><i
                                                            class="fa fa-cloud-upload" aria-hidden="true"></i> Push</a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="left">
                                            <?php
                                            if($videos):
                                                foreach($videos as $video):
                                                    ?>
                                                    <a class="btn btn-primary popup-youtube" href="<?= base_url('videos/'.$video->video);?>"><?= $video->video;?></a>
                                                <?php
                                                endforeach;
                                            endif;
                                            ?>
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
                echo '<div class="alert alert-warning fade in">There is no ad yet!</div>';
            endif;
            ?>
        </div>
    </div>
</div>