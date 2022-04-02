<?php
$this->load->view('layout/layoutTop');
?>
<!-- Main content -->
<section class="content">
    <div class="">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Users Report</h3>
            </div>
            <div class="box-body">

                <table id="tableData" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Password</th>
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
                                    <td><?php echo $value['name']; ?> <br/>
                                        #<?php echo $value['id']; ?>
                                    </td>
                                    <td><?php echo $value['mobile_no']; ?> </td>
                                    <td>
                                        <?php echo $value['email']; ?><br/>
                                    </td>
                                    <td><?php echo $value['password']; ?>  </td>
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