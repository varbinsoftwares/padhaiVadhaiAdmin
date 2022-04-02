<?php
$this->load->view('layout/layoutTop');
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
                            <th>SN</th>
                            <th>Model</th>
                            <th>Manufacturer</th>
                             <th>User</th>
                            <th>Uuid</th>
                           
                            <th>Date Time</th>
                          

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
                                    <td><?php echo $count; ?> </td>
                                    <td><?php echo $value['model']; ?> <br/>
                                        #<?php echo $value['id']; ?>
                                    </td>
                                    <td><?php echo $value['manufacturer']; ?> </td>
                                    <td>
                                        <?php echo $value['name']; ?><br/>
                                        <p><?php echo $value['mobile_no']; ?> (<?php echo $value['mobile_no']; ?> )</p>

                                    </td>
                                     <td><?php echo $value['uuid']; ?>  </td>
                                    <td><?php echo $value['datetime']; ?>  </td>

                                  


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