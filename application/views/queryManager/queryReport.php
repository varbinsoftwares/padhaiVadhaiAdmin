<?php
$this->load->view('layout/layoutTop');
?>
<?php
                $session_data = $this->session->userdata('logged_in');
                ?>
<!-- Main content -->
<section class="content">
    <div class="">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Query Report</h3>
            </div>
            <div class="box-body">



                <table id="tableData" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Query</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        ;
                        if ($data) {
                            $count = 1;
                            foreach ($data as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td>
                                        <div class="attachment-block clearfix" style="margin-bottom:0px">
                                            <a href="<?php echo base_url(); ?>index.php/QueryHandler/query_chat/<?php echo $value['id']; ?>">

                                                <?php
                                                if ($value['upload_file']) {
                                                    ?>
                                                    <img class="attachment-img" src="http://app.padhaivadhai.com/padhaiVadhaiApp/original/<?php echo $value['upload_file']; ?>" alt="Attachment Image" style="width:70px;height:70px"/>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <img class="attachment-img" src="<?php echo base_url(); ?>assets_main/image/icon.png" alt="Attachment Image" style="width:70px;height:70px"/>

                                                    <?php
                                                }
                                                ?>
                                                <div class="attachment-pushed">
                                                    <h4 class="attachment-heading">
                                                        <a href="<?php echo base_url(); ?>index.php/QueryHandler/query_chat/<?php echo $value['id']; ?>">
                                                            <?php echo $value['topic']; ?></a>
                                                    </h4>
<?php
if($value['unseen']){
?>
<span class="text-muted pull-right" style="    background: #f00;
    padding: 10px;
    margin-top: -10px;
    margin-left: 10px;
    font-size: 17px;
    border-radius: 50%;
    color: #fff;
    height: 35px;
    width: 35px;
    text-align: center;
    line-height: 13px;"><?php echo $value['unseen']; ?> </span>
<?php }?>

                                                    <span class="text-muted pull-right"><?php echo $value['qry_date']; ?> <?php echo $value['qry_time']; ?> </span>

                                                    
                                                    <div class="attachment-text">
                                                        <?php echo $value['name']; ?><br/>
                                                            <?php if($session_data['user_type'] == 'Admin'){ ?>
                                                        <p><?php echo $value['mobile_no']; ?> (<?php echo $value['mobile_no']; ?> )</p>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <!-- /.attachment-text -->
                                                </div>
                                                <!-- /.attachment-pushed -->
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</section>
<!-- end col-6 -->
</div>


<?php
$this->load->view('layout/layoutFooter');
?> 
<script>
    $(function () {

        $('#tableData').DataTable({
//      'paging'      : true,
//      'lengthChange': false,
//      'searching'   : false,
//      'ordering'    : true,
//      'info'        : true,
//      'autoWidth'   : false
        })
    })

</script>