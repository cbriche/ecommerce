<body style="font-family:Verdana">
    <div class="container">
        <div class="row ">
            <h3 class="text-center" >CHAT</h3>
            <br /><br />
            <div class="col-md-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        RECENT CHAT HISTORY
                    </div>
                    <div class="panel-body">
                      <ul id="chatmessage" class="media-list">
                            <?php foreach ($affiche_message as $key => $value) :?>
                            <li class="media">
                                <div class="media-body">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle " src="<?php echo base_url();?>/assets/images/user.png" />
                                    </a>
                                    <div class="text-message">
                                        <?php echo $value->contenu_message;?>
                                        <br />
                                    </div>
                                    <small class="text-muted"><?php echo $value->auteur_message;?> | <?php echo $value->date_message;?></small>
                                    <div class="poubelle">
                                        <a href="<?=site_url();?>/chat/action/supprimer/<?php echo $value->id_message ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                    </div>
                                    <hr />
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="info success">
                    <?php echo $this->session->flashdata('info');?>
                </div>
                <div id="divChat">
                    <div class="panel-footer">
                        <?php echo form_create('chat',
                            [
                            "auteur"=>"text",
                            "contenu"=>"textarea",
                            "valider"=>"submit",
                            ]
                            );?>
                        </div> <!--ferme div id divchat-->

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        ONLINE USERS
                    </div>
                    <div class="panel-body">
                        <ul class="media-list">

                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" style="max-height:40px;" src="../assets/images/user.png" />
                                        </a>
                                        <div class="media-body" >
                                            <h5>Alex Deo | User </h5>

                                            <small class="text-muted">Active From 3 hours</small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" style="max-height:40px;" src="../assets/images/user.gif" />
                                        </a>
                                        <div class="media-body" >
                                            <h5>Jhon Rexa | User </h5>

                                            <small class="text-muted">Active From 3 hours</small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" style="max-height:40px;" src="../assets/images/user.png" />
                                        </a>
                                        <div class="media-body" >
                                            <h5>Alex Deo | User </h5>

                                            <small class="text-muted">Active From 3 hours</small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" style="max-height:40px;" src="../assets/images/user.gif" />
                                        </a>
                                        <div class="media-body" >
                                            <h5>Jhon Rexa | User </h5>

                                            <small class="text-muted">Active From 3 hours</small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" style="max-height:40px;" src="../assets/images/user.png" />
                                        </a>
                                        <div class="media-body" >
                                            <h5>Alex Deo | User </h5>

                                            <small class="text-muted">Active From 3 hours</small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" style="max-height:40px;" src="../assets/images/user.gif" />
                                        </a>
                                        <div class="media-body" >
                                            <h5>Jhon Rexa | User </h5>

                                            <small class="text-muted">Active From 3 hours</small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" style="max-height:40px;" src="../assets/images/user.png" />
                                        </a>
                                        <div class="media-body" >
                                            <h5>Alex Deo | User </h5>

                                            <small class="text-muted">Active From 3 hours</small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <li class="media">

                                <div class="media-body">

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" style="max-height:40px;" src="../assets/images/user.gif" />
                                        </a>
                                        <div class="media-body" >
                                            <h5>Jhon Rexa | User </h5>

                                            <small class="text-muted">Active From 3 hours</small>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
