<!-- begin #sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets_main/image/icon.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <?php
                $session_data = $this->session->userdata('logged_in');
                ?>
                <p><?php echo $session_data['first_name']; ?></p>


            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
           <?php if($session_data['user_type'] == 'Admin'){ ?>


           <li>
                <a href="<?php echo base_url(); ?>index.php/QueryHandler/add_user">
                    <i class="active fa fa-plus "></i> <span>Add User</span>

                </a>
            </li>
            <li class="active treeview ">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="<?php echo base_url(); ?>index.php/QueryHandler/app_users"><i class="fa fa-arrow-right"></i> Register  Users</a></li>
                    <li class=""><a href="<?php echo base_url(); ?>index.php/QueryHandler/app_downloads"><i class="fa fa-arrow-right"></i> Downloads</a></li>

                </ul>
            </li>
     
                        
            <li>
                <a href="<?php echo base_url(); ?>index.php/QueryHandler/all_query">
                    <i class="active fa fa-calendar "></i> <span>All Queries</span>

                </a>
            </li>
            

            <li>
                <a href="<?php echo base_url(); ?>index.php/QueryHandler/sendNotification">
                    <i class="active fa fa-bell "></i> <span>Send Notification</span>

                </a>
            </li>
<?php } else {?>
 <li>
                <a href="<?php echo base_url(); ?>index.php/QueryHandler/all_query">
                    <i class="active fa fa-calendar "></i> <span>All Queries</span>

                </a>
            </li>
<?php }?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
