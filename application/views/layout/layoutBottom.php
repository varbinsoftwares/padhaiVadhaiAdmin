
    <!-- /.content -->
 
<?php ob_end_clean(); ?>
<!-- end #content -->  
<!-- begin theme-panel -->

<style type="text/css"> 
    .capitalize{
        text-transform: capitalize;
    }
</style>
<!-- end theme-panel -->

<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->

<!-- end page container -->
<!--
 ================== BEGIN BASE JS ================== 
<script src="<?php echo base_url(); ?>assets_main/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/bootstrap/js/bootstrap.min.js"></script>
[if lt IE 9]>
        <script src="<?php echo base_url(); ?>assets_main/crossbrowserjs/html5shiv.js"></script>
        <script src="<?php echo base_url(); ?>assets_main/crossbrowserjs/respond.min.js"></script>
        <script src="<?php echo base_url(); ?>assets_main/crossbrowserjs/excanvas.min.js"></script>
<![endif]
<script src="<?php echo base_url(); ?>assets_main/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/jquery-cookie/jquery.cookie.js"></script>
 ================== END BASE JS ================== 

<script src="<?php echo base_url(); ?>assets_main/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/DataTables/js/dataTables.tableTools.js"></script>

<script src="<?php echo base_url(); ?>assets_main/js/table-manage-default.demo.min.js"></script>
 ================== END PAGE LEVEL JS ==================  	
<script>
    var handleDataTableTools = function () {
        "use strict";
        if ($("#data-table").length !== 0) {
            $("#data-table").DataTable({dom: 'T<"clear">lfrtip', tableTools: {sSwfPath: "<?php echo base_url(); ?>assets_main/plugins/DataTables/swf/copy_csv_xls_pdf.swf"}})
        }
    };
    var TableManageTableTools = function () {
        "use strict";
        return{init: function () {
                handleDataTableTools()
            }}
    }()
</script>-->