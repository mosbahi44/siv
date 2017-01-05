<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-bell" aria-hidden="true"></i><a href="#">Logs</a></li>
            </ul>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <?php
            if(isset($message) && $message != '')
                echo '<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">×</a>'.$message.'</div>';
            ?>
            <?php
            if($logs):
            ?>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center">
                            <thead>
                            <tr>
                                <th>MAC address</th>
                                <th>Message sent</th>
                                <th>Response</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($logs as $log):?>
                                <tr>
                                    <td><?= $log->mac;?></td>
                                    <td><?= $log->message;?></td>
                                    <td><?php
                                        if($log->response == 2) echo'<span class="badge badge-xs x-info b-rounded">In process</span>';
                                        if($log->response == 0) echo'<span class="badge badge-xs x-danger b-rounded">Failed</span>';
                                        if($log->response == 1) echo'<span class="badge badge-xs x-success b-rounded">Done</span>';
                                        ?></td>
                                    <td><?= $log->date;?></td>
                                </tr>
                                <?php
                            endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
<?php
else:
    echo '<div class="alert alert-warning fade in">There are nos logs yet.</div>';
endif;