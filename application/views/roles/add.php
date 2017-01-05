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
            <?php echo validation_errors('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">×</a>','</div>'); ?>
            <div class="panel">
                <div class="panel-content">

                    <?php
                    echo form_open();
                    ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Name');
                        echo form_input('name', set_value('name'), array('class'=>'form-control'));
                        ?><br>
                    </div>
                    <div class="form-horizontal form-stripe">
                        <div class="form-group">
                            <label for="righticon" class="col-sm-2 control-label">Users</label>
                            <div class="col-sm-5">
                                <div class="checkbox-custom">
                                    <input name="users_view" id="users_view" value="1"  type="checkbox">
                                    <label class="check" for="users_view">View</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="users_add" id="users_add" value="1"  type="checkbox">
                                    <label class="check" for="users_add">Add</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="users_edit" id="users_edit" value="1"  type="checkbox">
                                    <label class="check" for="users_edit">Edit</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="users_delete" id="users_delete" value="1"  type="checkbox">
                                    <label class="check" for="users_delete">Delete</label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <label for="righticon" class="col-sm-2 control-label">Logs</label>
                                <div class="col-sm-5">
                                    <div class="checkbox-custom">
                                        <input name="logs_view" id="logs_view" value="1"  type="checkbox">
                                        <label class="check" for="logs_view">View</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="logs_add" id="logs_add" value="1" disabled type="checkbox">
                                        <label class="check" for="logs_add">Add</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="logs_edit" id="logs_edit" value="1" disabled type="checkbox">
                                        <label class="check" for="logs_edit">Edit</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="logs_delete" id="logs_delete" value="1" disabled type="checkbox">
                                        <label class="check" for="logs_delete">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="righticon" class="col-sm-2 control-label">Shelters</label>
                            <div class="col-sm-5">
                                <div class="checkbox-custom">
                                    <input name="shelters_view" id="shelters_view" value="1"  type="checkbox">
                                    <label class="check" for="shelters_view">View</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="shelters_add" id="shelters_add" value="1"  type="checkbox">
                                    <label class="check" for="shelters_add">Add</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="shelters_edit" id="shelters_edit" value="1"  type="checkbox">
                                    <label class="check" for="shelters_edit">Edit</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="shelters_delete" id="shelters_delete" value="1"  type="checkbox">
                                    <label class="check" for="shelters_delete">Delete</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="shelters_reboot" id="shelters_reboot" value="1"  type="checkbox">
                                    <label class="check" for="shelters_reboot">Reboot</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="shelters_clear" id="shelters_clear" value="1"  type="checkbox">
                                    <label class="check" for="shelters_clear">Clear cache</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="shelters_push" id="shelters_push" value="1"  type="checkbox">
                                    <label class="check" for="shelters_push">Push</label>
                                </div>
                            </div>
                            <div class="col-sm-5">

                                <label for="righticon" class="col-sm-2 control-label">Contents</label>
                                <div class="col-sm-5">
                                    <div class="checkbox-custom">
                                        <input name="contents_view" id="contents_view" value="1"  type="checkbox">
                                        <label class="check" for="contents_view">View</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="contents_add" id="contents_add" value="1"  type="checkbox">
                                        <label class="check" for="contents_add">Add</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="contents_edit" id="contents_edit" value="1"  type="checkbox">
                                        <label class="check" for="contents_edit">Edit</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="contents_delete" id="contents_delete" value="1"  type="checkbox">
                                        <label class="check" for="contents_delete">Delete</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="contents_push" id="contents_push" value="1"  type="checkbox">
                                        <label class="check" for="contents_push">Push</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="righticon" class="col-sm-2 control-label">Ads</label>
                            <div class="col-sm-5">
                                <div class="checkbox-custom">
                                    <input name="ads_view" id="ads_view" value="1"  type="checkbox">
                                    <label class="check" for="ads_view">View</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="ads_add" id="ads_add" value="1"  type="checkbox">
                                    <label class="check" for="ads_add">Add</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="ads_edit" id="ads_edit" value="1"  type="checkbox">
                                    <label class="check" for="ads_edit">Edit</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="ads_delete" id="ads_delete" value="1"  type="checkbox">
                                    <label class="check" for="ads_delete">Delete</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="ads_push" id="ads_push" value="1"  type="checkbox">
                                    <label class="check" for="ads_push">Push</label>
                                </div>
                            </div>
                            <div class="col-sm-5">

                                <label for="righticon" class="col-sm-2 control-label">Sites</label>
                                <div class="col-sm-5">
                                    <div class="checkbox-custom">
                                        <input name="sites_view" id="sites_view" value="1"  type="checkbox">
                                        <label class="check" for="sites_view">View</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="sites_add" id="sites_add" value="1"  type="checkbox">
                                        <label class="check" for="sites_add">Add</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="sites_edit" id="sites_edit" value="1" disabled type="checkbox">
                                        <label class="check" for="sites_edit">Edit</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="sites_delete" id="sites_delete" value="1"  type="checkbox">
                                        <label class="check" for="sites_delete">Delete</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="righticon" class="col-sm-2 control-label">Partners</label>
                            <div class="col-sm-5">
                                <div class="checkbox-custom">
                                    <input name="partners_view" id="partners_view" value="1"  type="checkbox">
                                    <label class="check" for="partners_view">View</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="partners_add" id="partners_add" value="1"  type="checkbox">
                                    <label class="check" for="partners_add">Add</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="partners_edit" id="partners_edit" disabled value="1"  type="checkbox">
                                    <label class="check" for="partners_edit">Edit</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="partners_delete" id="partners_delete" value="1"  type="checkbox">
                                    <label class="check" for="partners_delete">Delete</label>
                                </div>
                                <div class="checkbox-custom">
                                    <input name="partners_push" id="partners_push" value="1"  type="checkbox">
                                    <label class="check" for="partners_push">Push</label>
                                </div>
                            </div>
                            <div class="col-sm-5">

                                <label for="righticon" class="col-sm-2 control-label">Messages</label>
                                <div class="col-sm-5">
                                    <div class="checkbox-custom">
                                        <input name="messages_view" id="messages_view" value="1"  type="checkbox">
                                        <label class="check" for="messages_view">View</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="messages_add" id="messages_add" value="1"  type="checkbox">
                                        <label class="check" for="messages_add">Add</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="messages_edit" id="messages_edit" value="1"  type="checkbox">
                                        <label class="check" for="messages_edit">Edit</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="messages_delete" id="messages_delete" value="1"  type="checkbox">
                                        <label class="check" for="messages_delete">Delete</label>
                                    </div>
                                    <div class="checkbox-custom">
                                        <input name="messages_push" id="messages_push" value="1"  type="checkbox">
                                        <label class="check" for="messages_push">Push</label>
                                    </div>
                                </div>
                            </div>
                        </div>

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
