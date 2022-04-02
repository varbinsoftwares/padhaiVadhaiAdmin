<?php
$this->load->view('layout/layoutTop');
?>
<!-- begin col-6 -->
<div class="col-md-6">
    <div class="panel panel-inverse" data-sortable-id="tree-view-1">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Default Tree</h4>
        </div>
        <div class="panel-body">
            <div id="jstree-default">
                <ul>
                    <li data-jstree='{"opened":true}' >
                        Root node 1
                        <ul>
                            <li data-jstree='{"opened":true, "selected":true }'>Initially Selected</li>
                            <li>Folder 1</li>
                            <li>Folder 2</li>
                            <li>Folder 3</li>
                            <li data-jstree='{"opened":true}' >
                                Initially open
                                <ul>
                                    <li data-jstree='{"disabled":true}' >Disabled node</li>
                                    <li>Another node</li>
                                </ul>
                            </li>
                            <li data-jstree='{ "icon" : "fa fa-warning fa-lg text-danger" }'>custom icon class (fontawesome)</li>
                            <li data-jstree='{ "icon" : "fa fa-link fa-lg text-primary" }'><a href="http://www.jstree.com">Clickable link node</a></li>
                        </ul>
                    </li>
                    <li>Root node 2</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end col-6 -->
<?php
$this->load->view('layout/layoutBottom');
?> 
<script src="form/assets/plugins/jstree/dist/jstree.min.js"></script>
<script src="form/assets/js/ui-tree.demo.min.js"></script>

<script src="<?php echo base_url(); ?>assets_main/js/apps.min.js"></script> 
<script>
    $(document).ready(function () {
        App.init();

        TableManageDefault.init();
        TreeView.init();
//         FormMultipleUpload.init();
//         FormPlugins.init();

    });
</script>
<?php
$this->load->view('layout/layoutFooter');
?>