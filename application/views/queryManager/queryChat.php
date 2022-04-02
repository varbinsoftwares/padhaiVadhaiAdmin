<?php
$this->load->view('layout/layoutTop');
?>
<!-- Main content -->
<style type="text/css">
    .tt-dropdown-menu,
    .gist {
        text-align: left;
    }

    .typeahead,
    .tt-query,
    .tt-hint {
        width: 100%; 
        height: 100%; 
        padding: 8px 12px;
        line-height: 26px;
        border: 2px solid #ccc;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        outline: none;
    }

    .typeahead {
        background-color: #fff;
    }

    .typeahead:focus {
        border: 2px solid #0097cf;
    }

    .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .tt-hint {
        color: #999
    }
    .twitter-typeahead{
        width:100% !important;
    }


    .tt-dropdown-menu {
        width: 98%; 
        margin-left: 6px;
        padding: 8px 0;
        background-color: #fff  !important;
        border: 1px solid #ccc  !important;
        border: 1px solid rgba(0, 0, 0, 0.2)  !important;

        -webkit-border-bottom-left-radius: 8px;
        -moz-border-bottom-left-radius: 8px;
        border-bottom-left-radius: 8px;

        -webkit-border-bottom-right-radius: 8px;
        -moz-border-bottom-right-radius: 8px;
        border-bottom-right-radius: 8px;

        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }

    .tt-suggestion {
        padding: 3px 20px;
        font-size: 15px;
        line-height: 24px;
    }

    .tt-suggestion.tt-cursor {
        color: #fff;
        background-color: #0097cf;
    }

    .tt-suggestion p {
        margin: 0;
    }

    .typeaheadgroup{
        margin: 0 20px 5px 20px;
        padding: 3px 0;
        border-bottom: 1px solid #ccc;

    }

    .userblock{
        border: 1px solid #ddd;
        padding-bottom: 10px;
        border-radius: 10px;
    }
    .direct-chat-messages-div{
        float: left;
        width: 100%;
    }

</style>
<?php
$session_data = $this->session->userdata('logged_in');
?>
<section class="content">
    <div class=" ">
        <!-- DIRECT CHAT -->
        <div class="" ng-controller="Channel_Chat_Controller">
            <div class="row">

                <div class="col-md-6">

                    <div class="box box-widget">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <?php
                                if ($upload_file) {
                                    ?>
                                    <img class="attachment-img" src="http://app.padhaivadhai.com/padhaiVadhaiApp/original/<?php echo $upload_file; ?>" alt="Attachment Image" />
                                    <?php
                                } else {
                                    ?>
                                    <img class="attachment-img" src="<?php echo base_url(); ?>assets_main/image/icon.png" alt="Attachment Image" />

                                    <?php
                                }
                                ?>

                                <span class="username"><a href="#"><?php echo $name; ?></a></span>
                                <span class="description">Shared Query - <?php echo $qry_date; ?> <?php echo $qry_time; ?></span>
                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php
                            if ($upload_file) {
                                ?>
                                <img class="img-responsive pad"src="http://app.padhaivadhai.com/padhaiVadhaiApp/original/<?php echo $upload_file; ?>" alt="Attachment Image" />
                                <?php
                            } else {
                                ?>
                                <img class="img-responsive pad" src="<?php echo base_url(); ?>assets_main/image/icon.png" alt="Attachment Image" />

                                <?php
                            }
                            ?>

                            <p><?php echo $topic; ?></p>
                            <p><?php echo $description; ?></p><br/>
                            <?php if ($session_data['user_type'] == 'Admin') { ?>
                                <a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/QueryHandler/delete_query/<?php echo $channel_id; ?>">Delete Query</a>
                            <?php } else { ?>

                            <?php } ?>
                        </div>


                    </div>

                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <!-- DIRECT CHAT -->
                    <div class="box box-danger direct-chat direct-chat-danger">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages chattingmain" style="height: 350px">
                                <div class="direct-chat-messages-div" ng-repeat="message in channelMessages" >


                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg" ng-if='message.sender_id != messagedict.sender_id' style=' max-width: 75%;'>
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-left">{$message.name$}</span>

                                        </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="<?php echo base_url(); ?>assets_main/image/icon.png" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text" style='white-space: pre-line;  text-align: left;  margin-left: 55px;'><div class="chat_image" ng-if="message.message_file">
                                                <img src="{$imageserver+message.message_file$}" style="    width: 100%;">
                                            </div>{$message.message_body$}
                                            <span class="" style='font-size:10px;'><i class='fa fa-clock-o'></i>  {$message.m_date $} {$message.m_time $}</span></div>

                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->


                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right" ng-if='message.sender_id == messagedict.sender_id' style='    max-width: 75%;float: right'>
                                        <div class="direct-chat-info clearfix">
                                            <span class="direct-chat-name pull-right">{$message.name$}</span>                                </div>
                                        <!-- /.direct-chat-info -->
                                        <img class="direct-chat-img" src="<?php echo base_url(); ?>assets_main/image/icon.png" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text" style='white-space: pre-line;  text-align: left;  margin-right: 50px;'><div class="chat_image" ng-if="message.message_file">
                                                <img src="{$imageserver+message.message_file$}" style="    width: 100%;">
                                            </div>{$message.message_body$}
                                            <span class="" style='font-size:10px;'><i class='fa fa-clock-o'></i>  {$message.m_date $} {$message.m_time $}</span></div>

                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                </div>
                                <!--/.direct-chat-messages-->
                            </div>

                            <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class='col-md-12'>

                                <div class='col-md-6' ng-if="messagedict.message_file">
                                    <div class="thumbnail messageimagedata" style='    background: #31343d;'>
                                        <img src="" alt="..." style='height: 150px'/>
                                    </div>
                                </div>
                            </div>


                            <form  method="post" >
                                <input type='file'  id='mfilesend' style='display: none' file-model = "messagedict.message_file" accept="image/*" />
                                <div class="input-group" style='    border: 1px solid #000;
                                     background: #bd0000;'>
<!--                                    <span class="input-group-btn">

                                        <button type="button" ng-click="chooseFile()" class="btn btn-danger btn-flat" style='    background: none;
                                                border: none;'>
                                            <i class='fa fa-image'></i> 
                                        </button>
                                    </span>-->
                                    <input  ng-model="messagedict.message_title" placeholder="Notificaton Title" class="form-control"/>
                                    <textarea  ng-model="messagedict.message_body" placeholder="Type Message ..." class="form-control"></textarea>
                                    <span class="input-group-btn">
                                        <button type="button" ng-click="sendMessage()" class="btn btn-danger btn-flat" style='    background: none;
                                                border: none;'>
                                            <i class='fa fa-send'></i>    Send
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!--/.direct-chat -->
                </div>
                <!-- /.col -->


            </div>

        </div>
        <!--/.direct-chat -->

    </div>
</section>

<?php
$this->load->view('layout/layoutFooter');
?> 
<script>
    var gsender = {
        'sender_id': 1,
        'receiver_id': '<?php echo $receiver_id; ?>',
        'message_body': '',
        'message_file': '',
        'admin_seen': '1',
        'channel_id': '<?php echo $channel_id; ?>',
        'message_title': 'Your Query Has Been Resolved'
    };


<?php
$baselink = 'http://' . $_SERVER['SERVER_NAME'];
if (strpos($baselink, 'localhost')) {
    ?>
        var imageserver = "http://localhost/padhaiVadhaiApp/original/";
        var chatsendapi = "http://localhost/padhaiVadhaiApp/api/index.php/queryChatData/";
        var chatsend = "http://localhost/padhaiVadhaiApp/api/index.php/queryChatInsert";
    <?php
} else {
    ?>
        var imageserver = "http://app.padhaivadhai.com/padhaiVadhaiApp/original/";
        var chatsendapi = "http://app.padhaivadhai.com/padhaiVadhaiApp/api/index.php/queryChatData/";
        var chatsend = "http://app.padhaivadhai.com/padhaiVadhaiApp/api/index.php/queryChatInsert";
    <?php
}
?>






</script>
