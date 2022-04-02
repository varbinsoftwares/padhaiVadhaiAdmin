<?php
$this->load->view('layout/layoutTop');
?>
<link href="<?php echo base_url(); ?>assets_main/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets_main/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets_main/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets_main/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">Home</a></li>
    <li class="active">Dashboard</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Dashboard </h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
            <div class="stats-info">
                <h4>TOTAL ACTIVE PRODUCTS</h4>
                <p>3,291,922</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
            <div class="stats-info">
                <h4>TOTAL SALE</h4>
                <p>20.44%</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4>TOTAL ACTIVE VISITORS</h4>
                <p>1,291,922</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-clock-o"></i></div>
            <div class="stats-info">
                <h4>AVG TIME ON SITE</h4>
                <p>00:12:23</p>	
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
</div>
<!-- end row -->
<!-- begin row -->
<div class="row">
    <!-- begin col-8 -->
    <div class="col-md-8 ui-sortable">
        <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Website Traffic (Last 7 Days)</h4>
            </div>
            <div class="panel-body">
                <div id="interactive-chart" class="height-sm" style="padding: 0px; position: relative;"><canvas class="flot-base" width="685" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 685px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 34px; top: 284px; left: 75px; text-align: center;">May&nbsp;15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 34px; top: 284px; left: 176px; text-align: center;">May&nbsp;19</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 34px; top: 284px; left: 278px; text-align: center;">May&nbsp;22</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 34px; top: 284px; left: 380px; text-align: center;">May&nbsp;25</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 34px; top: 284px; left: 482px; text-align: center;">May&nbsp;28</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 34px; top: 284px; left: 583px; text-align: center;">May&nbsp;31</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 272px; left: 13px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 244px; left: 7px; text-align: right;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 217px; left: 7px; text-align: right;">40</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 190px; left: 7px; text-align: right;">60</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 163px; left: 7px; text-align: right;">80</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 136px; left: 1px; text-align: right;">100</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 109px; left: 1px; text-align: right;">120</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 82px; left: 1px; text-align: right;">140</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 55px; left: 1px; text-align: right;">160</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 28px; left: 1px; text-align: right;">180</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">200</div></div></div><canvas class="flot-overlay" width="685" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 685px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 88px; height: 44px; top: 18px; right: 27px; opacity: 0.85; background-color: rgb(255, 255, 255);"> </div><table style="position:absolute;top:18px;right:27px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #348fe2;overflow:hidden"></div></div></td><td class="legendLabel">Page Views</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ddd;padding:1px"><div style="width:4px;height:0;border:5px solid #00acac;overflow:hidden"></div></div></td><td class="legendLabel">Visitors</td></tr></tbody></table></div></div>
            </div>
        </div>

        <!--        <ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
                    <li class=""><a href="#latest-post" data-toggle="tab" aria-expanded="false"><i class="fa fa-picture-o m-r-5"></i> <span class="hidden-xs">Latest Post</span></a></li>
                    <li class=""><a href="#purchase" data-toggle="tab" aria-expanded="false"><i class="fa fa-shopping-cart m-r-5"></i> <span class="hidden-xs">Purchase</span></a></li>
                    <li class="active"><a href="#email" data-toggle="tab" aria-expanded="true"><i class="fa fa-envelope m-r-5"></i> <span class="hidden-xs">Email</span></a></li>
                </ul>-->
        <!--        <div class="tab-content" data-sortable-id="index-3">
                    <div class="tab-pane fade" id="latest-post">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="height-sm" data-scrollbar="true" style="overflow: hidden; width: auto; height: 300px;">
                                <ul class="media-list media-list-with-divider">
                                    <li class="media media-lg">
                                        <a href="javascript:;" class="pull-left">
                                            <img class="media-object" src="<?php echo base_url(); ?>assets_main/img/gallery/gallery-1.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Aenean viverra arcu nec pellentesque ultrices. In erat purus, adipiscing nec lacinia at, ornare ac eros.</h4>
                                            Nullam at risus metus. Quisque nisl purus, pulvinar ut mauris vel, elementum suscipit eros. Praesent ornare ante massa, egestas pellentesque orci convallis ut. Curabitur consequat convallis est, id luctus mauris lacinia vel. Nullam tristique lobortis mauris, ultricies fermentum lacus bibendum id. Proin non ante tortor. Suspendisse pulvinar ornare tellus nec pulvinar. Nam pellentesque accumsan mi, non pellentesque sem convallis sed. Quisque rutrum erat id auctor gravida.
                                        </div>
                                    </li>
                                    <li class="media media-lg">
                                        <a href="javascript:;" class="pull-left">
                                            <img class="media-object" src="<?php echo base_url(); ?>assets_main/img/gallery/gallery-10.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Vestibulum vitae diam nec odio dapibus placerat. Ut ut lorem justo.</h4>
                                            Fusce bibendum augue nec fermentum tempus. Sed laoreet dictum tempus. Aenean ac sem quis nulla malesuada volutpat. Nunc vitae urna pulvinar velit commodo cursus. Nullam eu felis quis diam adipiscing hendrerit vel ac turpis. Nam mattis fringilla euismod. Donec eu ipsum sit amet mauris iaculis aliquet. Quisque sit amet feugiat odio. Cras convallis lorem at libero lobortis, placerat lobortis sapien lacinia. Duis sit amet elit bibendum sapien dignissim bibendum.
                                        </div>
                                    </li>
                                    <li class="media media-lg">
                                        <a href="javascript:;" class="pull-left">
                                            <img class="media-object" src="<?php echo base_url(); ?>assets_main/img/gallery/gallery-7.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Maecenas eget turpis luctus, scelerisque arcu id, iaculis urna. Interdum et malesuada fames ac ante ipsum primis in faucibus.</h4>
                                            Morbi placerat est nec pharetra placerat. Ut laoreet nunc accumsan orci aliquam accumsan. Maecenas volutpat dolor vitae sapien ultricies fringilla. Suspendisse vitae orci sed nibh ultrices tristique. Aenean in ante eget urna semper imperdiet. Pellentesque sagittis a nulla at scelerisque. Nam augue nulla, accumsan quis nisi a, facilisis eleifend nulla. Praesent aliquet odio non imperdiet fringilla. Morbi a porta nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.
                                        </div>
                                    </li>
                                    <li class="media media-lg">
                                        <a href="javascript:;" class="pull-left">
                                            <img class="media-object" src="<?php echo base_url(); ?>assets_main/img/gallery/gallery-8.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor accumsan rutrum.</h4>
                                            Fusce augue diam, vestibulum a mattis sit amet, vehicula eu ipsum. Vestibulum eu mi nec purus tempor consequat. Vestibulum porta non mi quis cursus. Fusce vulputate cursus magna, tincidunt sodales ipsum lobortis tincidunt. Mauris quis lorem ligula. Morbi placerat est nec pharetra placerat. Ut laoreet nunc accumsan orci aliquam accumsan. Maecenas volutpat dolor vitae sapien ultricies fringilla. Suspendisse vitae orci sed nibh ultrices tristique. Aenean in ante eget urna semper imperdiet. Pellentesque sagittis a nulla at scelerisque.
                                        </div>
                                    </li>
                                </ul>
                            </div><div class="slimScrollBar ui-draggable" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 105.757931844888px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                    </div>
                    <div class="tab-pane fade" id="purchase">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="height-sm" data-scrollbar="true" style="overflow: hidden; width: auto; height: 300px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th class="hidden-sm">Product</th>
                                            <th>Amount</th>
                                            <th>User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>13/02/2013</td>
                                            <td class="hidden-sm">
                                                <a href="javascript:;">
                                                    <img src="<?php echo base_url(); ?>assets_main/img/product/product-1.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6><a href="javascript:;">Nunc eleifend lorem eu velit eleifend, eget faucibus nibh placerat.</a></h6>
                                            </td>
                                            <td>$349.00</td>
                                            <td><a href="javascript:;">Derick Wong</a></td>
                                        </tr>
                                        <tr>
                                            <td>13/02/2013</td>
                                            <td class="hidden-sm">
                                                <a href="javascript:;">
                                                    <img src="<?php echo base_url(); ?>assets_main/img/product/product-2.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6><a href="javascript:;">Nunc eleifend lorem eu velit eleifend, eget faucibus nibh placerat.</a></h6>
                                            </td>
                                            <td>$399.00</td>
                                            <td><a href="javascript:;">Derick Wong</a></td>
                                        </tr>
                                        <tr>
                                            <td>13/02/2013</td>
                                            <td class="hidden-sm">
                                                <a href="javascript:;">
                                                    <img src="<?php echo base_url(); ?>assets_main/img/product/product-3.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6><a href="javascript:;">Nunc eleifend lorem eu velit eleifend, eget faucibus nibh placerat.</a></h6>
                                            </td>
                                            <td>$499.00</td>
                                            <td><a href="javascript:;">Derick Wong</a></td>
                                        </tr>
                                        <tr>
                                            <td>13/02/2013</td>
                                            <td class="hidden-sm">
                                                <a href="javascript:;">
                                                    <img src="<?php echo base_url(); ?>assets_main/img/product/product-4.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6><a href="javascript:;">Nunc eleifend lorem eu velit eleifend, eget faucibus nibh placerat.</a></h6>
                                            </td>
                                            <td>$230.00</td>
                                            <td><a href="javascript:;">Derick Wong</a></td>
                                        </tr>
                                        <tr>
                                            <td>13/02/2013</td>
                                            <td class="hidden-tablet hidden-phone">
                                                <a href="javascript:;">
                                                    <img src="<?php echo base_url(); ?>assets_main/img/product/product-5.png" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <h6><a href="javascript:;">Nunc eleifend lorem eu velit eleifend, eget faucibus nibh placerat.</a></h6>
                                            </td>
                                            <td>$500.00</td>
                                            <td><a href="javascript:;">Derick Wong</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><div class="slimScrollBar ui-draggable" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                    </div>
                    <div class="tab-pane fade active in" id="email">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="height-sm" data-scrollbar="true" style="overflow: hidden; width: auto; height: 300px;">
                                <ul class="media-list media-list-with-divider">
                                    <li class="media media-sm">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="<?php echo base_url(); ?>assets_main/img/user-1.jpg" alt="" class="media-object rounded-corner">
                                        </a>
                                        <div class="media-body">
                                            <a href="javascript:;"><h4 class="media-heading">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4></a>
                                            <p class="m-b-5">
                                                Aenean mollis arcu sed turpis accumsan dignissim. Etiam vel tortor at risus tristique convallis. Donec adipiscing euismod arcu id euismod. Suspendisse potenti. Aliquam lacinia sapien ac urna placerat, eu interdum mauris viverra.
                                            </p>
                                            <i class="text-muted">Received on 04/16/2013, 12.39pm</i>
                                        </div>
                                    </li>
                                    <li class="media media-sm"> 
                                        <a href="javascript:;" class="pull-left">
                                            <img src="<?php echo base_url(); ?>assets_main/img/user-2.jpg" alt="" class="media-object rounded-corner">
                                        </a>
                                        <div class="media-body">
                                            <a href="javascript:;"><h4 class="media-heading">Praesent et sem porta leo tempus tincidunt eleifend et arcu.</h4></a>
                                            <p class="m-b-5">
                                                Proin adipiscing dui nulla. Duis pharetra vel sem ac adipiscing. Vestibulum ut porta leo. Pellentesque orci neque, tempor ornare purus nec, fringilla venenatis elit. Duis at est non nisl dapibus lacinia.
                                            </p>
                                            <i class="text-muted">Received on 04/16/2013, 12.39pm</i>
                                        </div>
                                    </li>
                                    <li class="media media-sm">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="<?php echo base_url(); ?>assets_main/img/user-3.jpg" alt="" class="media-object rounded-corner">
                                        </a>
                                        <div class="media-body">
                                            <a href="javascript:;"><h4 class="media-heading">Ut mi eros, varius nec mi vel, consectetur convallis diam.</h4></a>
                                            <p class="m-b-5">
                                                Ut mi eros, varius nec mi vel, consectetur convallis diam. Nullam eget hendrerit eros. Duis lacinia condimentum justo at ultrices. Phasellus sapien arcu, fringilla eu pulvinar id, mattis quis mauris.
                                            </p>
                                            <i class="text-muted">Received on 04/16/2013, 12.39pm</i>
                                        </div>
                                    </li>
                                    <li class="media media-sm">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="<?php echo base_url(); ?>assets_main/img/user-4.jpg" alt="" class="media-object rounded-corner">
                                        </a>
                                        <div class="media-body">
                                            <a href="javascript:;"><h4 class="media-heading">Aliquam nec dolor vel nisl dictum ullamcorper.</h4></a>
                                            <p class="m-b-5">
                                                Aliquam nec dolor vel nisl dictum ullamcorper. Duis vel magna enim. Aenean volutpat a dui vitae pulvinar. Nullam ligula mauris, dictum eu ullamcorper quis, lacinia nec mauris.
                                            </p>
                                            <i class="text-muted">Received on 04/16/2013, 12.39pm</i>
                                        </div>
                                    </li>
                                </ul>
                            </div><div class="slimScrollBar ui-draggable" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 197.802197802198px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                    </div>
                </div>-->

        <!--        <div class="panel panel-inverse" data-sortable-id="index-4">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Quick Post</h4>
                    </div>
                    <div class="panel-toolbar">
                        <div class="btn-group m-r-5">
                            <a class="btn btn-white" href="javascript:;"><i class="fa fa-bold"></i></a>
                            <a class="btn btn-white active" href="javascript:;"><i class="fa fa-italic"></i></a>
                            <a class="btn btn-white" href="javascript:;"><i class="fa fa-underline"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-left"></i></a>
                            <a class="btn btn-white active" href="javascript:;"><i class="fa fa-align-center"></i></a>
                            <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-right"></i></a>
                            <a class="btn btn-white" href="javascript:;"><i class="fa fa-align-justify"></i></a>
                        </div>
                    </div>
                    <textarea class="form-control no-rounded-corner bg-silver" rows="14">Enter some comment.</textarea>
                    <div class="panel-footer text-right">
                        <a href="javascript:;" class="btn btn-white btn-sm">Cancel</a>
                        <a href="javascript:;" class="btn btn-primary btn-sm m-l-5">Action</a>
                    </div>
                </div>-->

        <!--        <div class="panel panel-inverse" data-sortable-id="index-5">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                        <h4 class="panel-title">Message</h4>
                    </div>
                    <div class="panel-body">
                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="height-sm" data-scrollbar="true" style="overflow: hidden; width: auto; height: 300px;">
                                <ul class="media-list media-list-with-divider media-messaging">
                                    <li class="media media-sm">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="<?php echo base_url(); ?>assets_main/img/user-5.jpg" alt="" class="media-object rounded-corner">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">John Doe</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id nunc non eros fermentum vestibulum ut id felis. Nunc molestie libero eget urna aliquet, vitae laoreet felis ultricies. Fusce sit amet massa malesuada, tincidunt augue vitae, gravida felis.</p>
                                        </div>
                                    </li>
                                    <li class="media media-sm">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="<?php echo base_url(); ?>assets_main/img/user-6.jpg" alt="" class="media-object rounded-corner">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">Terry Ng</h5>
                                            <p>Sed in ante vel ipsum tristique euismod posuere eget nulla. Quisque ante sem, scelerisque iaculis interdum quis, eleifend id mi. Fusce congue leo nec mauris malesuada, id scelerisque sapien ultricies.</p>
                                        </div>
                                    </li>
                                    <li class="media media-sm">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="<?php echo base_url(); ?>assets_main/img/user-8.jpg" alt="" class="media-object rounded-corner">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">Fiona Log</h5>
                                            <p>Pellentesque dictum in tortor ac blandit. Nulla rutrum eu leo vulputate ornare. Nulla a semper mi, ac lacinia sapien. Sed volutpat ornare eros, vel semper sem sagittis in. Quisque risus ipsum, iaculis quis cursus eu, tristique sed nulla.</p>
                                        </div>
                                    </li>
                                    <li class="media media-sm">
                                        <a href="javascript:;" class="pull-left">
                                            <img src="<?php echo base_url(); ?>assets_main/img/user-7.jpg" alt="" class="media-object rounded-corner">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="media-heading">John Doe</h5>
                                            <p>Morbi molestie lorem quis accumsan elementum. Morbi condimentum nisl iaculis, laoreet risus sed, porta neque. Proin mi leo, dapibus at ligula a, aliquam consectetur metus.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div><div class="slimScrollBar ui-draggable" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 241.286863270777px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                    </div>
                    <div class="panel-footer">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control bg-silver" placeholder="Enter message">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-pencil"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>-->
    </div>
    <!-- end col-8 -->
    <!-- begin col-4 -->
    <div class="col-md-4 ui-sortable">
        <div class="panel panel-inverse" data-sortable-id="index-6">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Analytics Details</h4>
            </div>
            <div class="panel-body p-t-0">
                <table class="table table-valign-middle m-b-0">
                    <thead>
                        <tr>	
                            <th>Source</th>
                            <th>Total</th>
                            <th>Trend</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><label class="label label-danger">Unique Visitor</label></td>
                            <td>13,203 <span class="text-success"><i class="fa fa-arrow-up"></i></span></td>
                            <td><div id="sparkline-unique-visitor"><canvas width="87" height="23" style="display: inline-block; width: 87px; height: 23px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                            <td><label class="label label-warning">Bounce Rate</label></td>
                            <td>28.2%</td>
                            <td><div id="sparkline-bounce-rate"><canvas width="87" height="23" style="display: inline-block; width: 87px; height: 23px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                            <td><label class="label label-success">Total Page Views</label></td>
                            <td>1,230,030</td>
                            <td><div id="sparkline-total-page-views"><canvas width="87" height="23" style="display: inline-block; width: 87px; height: 23px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                            <td><label class="label label-primary">Avg Time On Site</label></td>
                            <td>00:03:45</td>
                            <td><div id="sparkline-avg-time-on-site"><canvas width="87" height="23" style="display: inline-block; width: 87px; height: 23px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                            <td><label class="label label-default">% New Visits</label></td>
                            <td>40.5%</td>
                            <td><div id="sparkline-new-visits"><canvas width="87" height="23" style="display: inline-block; width: 87px; height: 23px; vertical-align: top;"></canvas></div></td>
                        </tr>
                        <tr>
                            <td><label class="label label-inverse">Return Visitors</label></td>
                            <td>73.4%</td>
                            <td><div id="sparkline-return-visitors"><canvas width="87" height="23" style="display: inline-block; width: 87px; height: 23px; vertical-align: top;"></canvas></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



    </div>
    <!-- end col-4 -->
</div>
<div class="col-md-12" style="padding: 0px;">
    <div class="panel panel-inverse" data-sortable-id="index-7">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title">Visitors User Agent</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-5">
                <div id="donut-chart" class="height-sm" style="padding: 0px; position: relative;"><canvas class="flot-base" width="318" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 318px; height: 300px;"></canvas><canvas class="flot-overlay" width="318" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 318px; height: 300px;"></canvas><div class="legend"><div style="position: absolute; width: 71px; height: 104px; top: 5px; right: 5px; opacity: 0.85; background-color: rgb(255, 255, 255);"> </div><table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #5b6392;overflow:hidden"></div></div></td><td class="legendLabel">Chrome</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #727cb6;overflow:hidden"></div></div></td><td class="legendLabel">Firefox</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #8e96c5;overflow:hidden"></div></div></td><td class="legendLabel">Safari</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #348fe2;overflow:hidden"></div></div></td><td class="legendLabel">Opera</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #1993E4;overflow:hidden"></div></div></td><td class="legendLabel">IE</td></tr></tbody></table></div><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 82px; left: 247.5px;"><div style="font-size:x-small;text-align:center;padding:2px;color:#5b6392;">Chrome<br>37%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 261px; left: 111px;"><div style="font-size:x-small;text-align:center;padding:2px;color:#727cb6;">Firefox<br>32%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 123px; left: 6.5px;"><div style="font-size:x-small;text-align:center;padding:2px;color:#8e96c5;">Safari<br>16%</div></span><span class="pieLabel" id="pieLabel3" style="position: absolute; top: 33px; left: 54px;"><div style="font-size:x-small;text-align:center;padding:2px;color:#348fe2;">Opera<br>11%</div></span><span class="pieLabel" id="pieLabel4" style="position: absolute; top: 7px; left: 120px;"><div style="font-size:x-small;text-align:center;padding:2px;color:#1993E4;">IE<br>5%</div></span></div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('layout/layoutBottom');
?> 
<script src="<?php echo base_url(); ?>assets_main/plugins/gritter/js/jquery.gritter.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets_main/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets_main/js/dashboard.min.js"></script>
<script src="<?php echo base_url(); ?>assets_main/js/apps.min.js"></script> 
<script>
    $(document).ready(function () {
        App.init();
        TableManageDefault.init();
        Dashboard.init();
    });
</script> 

<?php
$this->load->view('layout/layoutFooter');
?>