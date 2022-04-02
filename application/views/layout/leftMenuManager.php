<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?php echo base_url(); ?>assets_main/img/user-13.jpg" alt="" /></a>
                </div>
                <div class="info">
                    <?php
                    $session_data = $this->session->userdata('logged_in');
                    echo $session_data['first_name'];
                    ?>
                </div>
                <small><?php echo $session_data['user_type']; ?></small>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="has-sub ">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-laptop"></i>
                    <span>Dashboard</span> 
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="<?php echo base_url(); ?>index.php/Dashboard_management">Dashboard</a></li>
                </ul>
            </li>



            <li class="has-sub"> 
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-sitemap"></i>
                    <span>Product Management</span> 
                </a>
                <ul class="sub-menu">
                    <!--<li><a href="<?php echo base_url(); ?>index.php/ProductHandler/add_product">Add New Product</a></li>-->
                    <li><a href="<?php echo base_url(); ?>index.php/ProductHandler/product_list">Product Reports</a></li>
                </ul>
            </li>
            <li class="has-sub"> 
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-reorder"></i> 
                    <span>Order Details</span> 
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/UserRecordManagement/user_current_order">Order Reports</a></li>
<!--                    <li><a href="<?php echo base_url(); ?>index.php/UserRecordManagement/user_order_history">Order History</a></li>-->
                    <li><a href="<?php echo base_url(); ?>index.php/Reports/user_order_date">Order Collection Reports</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a  href="javascript:;">
                    <b class="caret pull-right"></b> 
                    <i class="fa fa-list"></i>
                    <span>System Reports</span>  
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/Reports/user_item_date">Customization Reports</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/ProductHandler/product_filtering/1">Product Filter Reports </a></li>

                </ul>
            </li>

            <li>
                <a href="<?php echo base_url(); ?>index.php/UserRecordManagement/coupon_generate">

                    <i class="fa fa-gift"></i>
                    <span>Coupon Management</span>  
                </a>
            </li>

            <!--            <li class="has-sub"> 
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-cogs"></i>
                                <span>Configuration</span> 
                            </a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/ProductHandler/productColor">Add Color</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/ProductHandler/add_category/0">Add Category</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/ProductHandler/productTag">Add Product Tag</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/ProductHandler/category_tag_connection">Add Category Tag</a></li>
                            </ul>
                        </li>-->
            <!--            <li class="has-sub"> 
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                <i class="fa fa-newspaper-o"></i> 
                                <span>CMS</span>  
                            </a> 
                            <ul class="sub-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/ProductHandler/product_menu_information">Menu Style</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php/ProductHandler/featureProduct">Featured Products</a></li>
            
                            </ul>
                        </li>-->
            <li class="has-sub"> 
                <a href="javascript:;">
                    <b class="caret pull-right"></b> 
                    <i class="fa fa-envelope"></i> 
                    <span>Message Book</span> 
                </a> 
                <ul class="sub-menu">
<!--                    <li><a href="<?php echo base_url(); ?>index.php/Message_management/inbox_information">Inbox</a></li> 
                    <li><a href="<?php echo base_url(); ?>index.php/Message_management/compose_mail_information">Compose Mail</a></li>-->
                    <li><a href="<?php echo base_url(); ?>index.php/Message_management/message_send">Compose Mail</a></li>

                    <li><a href="<?php echo base_url(); ?>index.php/Message_management/news_letter">News Letters</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-user"></i>
                    <span>Clients Management</span>  
                </a>
                <ul class="sub-menu">
                    <li><a href="<?php echo base_url(); ?>index.php/UserRecordManagement/user_login_record">Login Record</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/UserRecordManagement/user_profile_record">Profile Record</a></li>
                </ul>
            </li>


        </ul> 

        <!-- end sidebar nav --> 
    </div>
    <!-- end sidebar scrollbar -->
</div>