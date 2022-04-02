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
<section class="content">
    <div class=" ">
        <!-- DIRECT CHAT -->
        <div class="" ng-controller="Channel_Chat_Controller_not">
            <div class="row">

             

                <div class="col-md-6">
                    <!-- DIRECT CHAT -->
                    <div class="box box-danger direct-chat direct-chat-danger">

                        <div class="box-header with-border">
              <h3 class="box-title">Notification To All</h3>

            
              <!-- /.box-tools -->
            </div>
                        <div class="box-footer">
                            


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
        'receiver_id': '6',
        'message_body': '',
        'message_file': '',
        'admin_seen': '1',
        'channel_id': '0',
        'message_title': 'New Message'
    };


    var chatsend = "http://app.padhaivadhai.com/padhaiVadhaiApp/api/index.php/notificationAll";
</script>
