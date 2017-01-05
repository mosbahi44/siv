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
            <?php
            if($this->session->userdata('add_shelter')) {
                ?>
                <h4 class="section-subtitle"><b><a href="<?= base_url('index.php/shelters/add'); ?>" class="badge x-info b-rounded"><i
                                class="fa fa-plus"></i> Add new shelter</a></b></h4>
            <?php
            }
            ?><?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?>
            <?php
            if($shelters):
            ?>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($shelters as $shelter):?>
                                <tr>
                                    <td><?= $shelter->name;?></td>
                                    <td><?= $shelter->lat;?></td>
                                    <td><?= $shelter->lng;?></td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <?php
                                            if($this->session->userdata('edit_shelter')) {
                                                ?>
                                                <a href="<?= base_url('index.php/shelters/edit/' . $shelter->id); ?>"
                                                   class="btn btn-transparent"><i class="fa fa-pencil"></i></a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($this->session->userdata('delete_shelter')) {
                                                ?><a
                                                href="<?= base_url('index.php/shelters/delete/' . $shelter->id); ?>"
                                                class="btn btn-transparent"><i class="fa fa-trash"></i></a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($this->session->userdata('shelter_clear')) {
                                                ?><a
                                                href="<?= base_url('index.php/shelters/clearCache/' . $shelter->id); ?>"
                                                class="badge badge-xs x-success b-rounded"><i class="fa fa-diamond"></i> Clear cache</a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($this->session->userdata('shelter_reboot')) {
                                                ?>
                                                <a href="<?= base_url('index.php/shelters/reboot/'.$shelter->id);?>" class="badge badge-xs x-warning b-rounded"><i class="fa fa-refresh"></i> Reboot</a>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if($this->session->userdata('shelter_push')) {
                                                ?>
                                                <a href="<?= base_url('index.php/shelters/push/' . $shelter->id); ?>"
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
                    <?php
                    else:
                        echo '<div class="alert alert-warning fade in">There is no shelter yet!</div>';
                    endif;
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
