<?php /* 
    Document Code   : STPL043
    Last Updated on : 09-June-2015
    Description: show trial status for order is taken by customer or not
*/ ?>
<?php
include('controllers/includer.php');
include 'include/header.php'; 
include 'include/css.php';
$myclass = new Myclass;
include("Account/account_class.php");
$groups = new groups;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $myclass->change_order_status($_REQUEST['id']);
        if (isset($_POST['allot_all'])) {
            //get all the checked inputs with name skills
            $id = $_POST['selector'];
            $N = count($id);
            $order_id = $_REQUEST['id'];
            if ($N == '0') {
                echo '<div id="add_msg1">Please select at least one order</div>';
                ?>
                <script>$('#add_msg1').fadeOut(10000);</script>
                <?php
            } elseif ($_POST['change_status'] == '') {
                echo '<div id="add_msg1">Please select status</div>';
                ?>
                <script>$('#add_msg1').fadeOut(10000);</script>
                <?php
            } elseif ($_POST['change_status'] != 0) {
                  for ($i = 0; $i <= $N; $i++) {
                    $sql_c = mysql_query("select status from sub_order where sub_order_id='$id[$i]' and status IN ('1','4','5')");
                    $checked = $id[$i];
                    if ($sql_c && mysql_fetch_array($sql_c) > 0) {
                       if ($_POST['change_status'] == 2) {
                            $date = date("Y-m-d");
                            if ($sql_c['status'] == '5') {
                                mysql_query("update return_order set ready_worker_date='$date', status='1' where sub_order_id='" . $_REQUEST['id'] . "'");
                            }
                            $newstaus = 2;
/*************************** START STPL043 *** Modified On - 05-June-2015 *** Purpose - insert stitching commission when change status in bulk   ***************************************************************/
                            $com = mysql_query("select it.price, s_o.payment, s_o.extra from sub_order as s_o join item as it on s_o.item_id=it.item_id where s_o.sub_order_id=" . $id[$i] . "");
                            $row_com = mysql_fetch_array($com);
                            $com1 = mysql_query("select * from commission");
                            $row_com1 = mysql_fetch_array($com1);
                            $price1 = $row_com['payment'];
                            $comission = $price1 * ($row_com1['stitching'] / 100);
                            $result = mysql_query("update sub_order set status= $newstaus , stitching_commission='$comission' , ready_date='$date' WHERE sub_order.sub_order_id = '$id[$i]'");
/**************************** END STPL043 **********************************************************************************************************************************************************************/
//*********** ledger entry ***********
    $sql_worker = mysql_query("select worker_stitching from sub_order where sub_order_id = '$id[$i]'");
    $row_wor = mysql_fetch_array($sql_worker);
    $sql_bar = mysql_query("select bar_code from customer_order where customer_order_id=".$_REQUEST['id']."");
    $row_bar = mysql_fetch_array($sql_bar);
    $barcode = $row_bar['bar_code'];
    $type = get_worker_salary_type($row_wor['worker_stitching']);
    if($type == 'Commission Basis' || $type == 'Per Item Basis'){
    $cr = $groups->get_ledger_id('worker_'.$row_wor['worker_stitching'].'');
    $comm = mysql_query("select * from commission ");
    $row_comm = mysql_fetch_array($comm);
    $price = mysql_query("select payment from sub_order where customer_order_id='" . $_REQUEST['id'] . "'");
    $row_price = mysql_fetch_array($price);
    $amount = $row_price['payment'] * ($row_comm['stitching']/100);
    $vcno=$groups->last_vc_no('SLR');
    $v=$vcno + 1;
    $vc_no="SLR".$v;
    $groups->ledger_entry('6', $cr, $amount, $vc_no, $barcode);
    }
                            
//*********** End ledger entry ***********                            
                            $s_order_id = $id[$i];
                            rack_allotment("$order_id", "$s_order_id");
                            
                            
                        }
                    } else {                        
                    }
                }
              $cnt = 0;
              for ($i = 0; $i <= $N; $i++) {
                    $cnt = $cnt+1;
                    if ($_POST['change_status'] == 3) {
                        $sql_c = mysql_query("select status from sub_order where sub_order_id='$id[$i]' and status='2'");
                        if ($sql_c && mysql_fetch_row($sql_c) > 0) {
                            $newstaus = 3;
                            $result = mysql_query("update sub_order set status= $newstaus WHERE sub_order.sub_order_id = '$id[$i]'");
                            if($cnt == 1){
 //*************************************************** START STPL043 *** Modified on - 15-june-2015 *** purpose - send mail to customer for updating order status REady to deliver***************************************************************************************
                            $mail = mysql_query("select c.email_id from customer_order as co join customer as c on co.customer_id = c.customer_id where customer_order_id='".$_REQUEST['id']."'");
                            $mail_row = mysql_fetch_array($mail); 
                            $sql = mysql_query("select * from company");
                            $row = mysql_fetch_array($sql);
                            $order_id = $_REQUEST['id'];
                            $order = mysql_query("select * from customer_order where customer_order_id='$order_id'");
                            $row4 = mysql_fetch_array($order); 
                            $discount = mysql_query("select discount, total from payment where customer_order_id='$order_id'");
                            $row_dis = mysql_fetch_array($discount);
                            $items = mysql_query("select distinct item_id from sub_order where customer_order_id='$order_id'");
                            while ($row_item = mysql_fetch_array($items)) {
                            $title = get_item_name_bystyle($row_item['item_id']); 
                            $item = $item.' '.$title;
                            }
                            $status = 'ready to Deliver';
                            $email = $mail_row['email_id'];
                            $compay_email = $row['mailid'];
                            $pay = $row_dis['total'];
                            $logo = $row['logo'];
                            $cust_name = get_customer_name($row4['customer_id']);
                            $company_name = $row['company_name'];
                            $order_id = $row4['customer_order_id'];
                            $dscnt = $row_dis['discount'];
                            $order_date = $row4['order_date'];
                            $trial_date = $row4['trial_date'];
                            $delivery_date = $row4['deliver_date'];
                            require("php_mailer/shristitch_mail.php");
//************************************************** END STPL043 ****************************************************************************************************************************************************************************************     
                            }
                        } else {
                            
                        }
                    }
                }
            }
        }
        else{
              if (isset($_REQUEST['status'])) {
            $old_stat = $_REQUEST['status'];
            $order_id = $_REQUEST['id'];
            $s_order_id = $_REQUEST['id1'];
            if ($old_stat == 1) {
                $new_stat = 2;
                $date = date("Y-m-d");
//******** modified by kalyani ***********    
    $com = mysql_query("select it.price, s_o.worker_stitching, s_o.extra from sub_order as s_o join item as it on s_o.item_id=it.item_id where s_o.sub_order_id=" . $_REQUEST['id1'] . "");
    $row_com = mysql_fetch_array($com);
    $sql_bar = mysql_query("select bar_code from customer_order where customer_order_id=".$_REQUEST['id']."");
    $row_bar = mysql_fetch_array($sql_bar);
    $barcode = $row_bar['bar_code'];
    $type = get_worker_salary_type($row_com['worker_stitching']);
    if($type == 'Commission Basis' || $type == 'Per Item Basis'){
    $cr = $groups->get_ledger_id('worker_'.$row_com['worker_stitching'].'');
    $comm = mysql_query("select * from commission ");
    $row_comm = mysql_fetch_array($comm);
    $price = mysql_query("select payment from sub_order where customer_order_id='" . $_REQUEST['id'] . "'");
    $row_price = mysql_fetch_array($price);
    $amount = $row_price['payment'] * ($row_comm['stitching']/100);
    $vcno=$groups->last_vc_no('SLR');
    $v=$vcno+1;
    $vc_no="SLR".$v;
    $groups->ledger_entry('6', $cr, $amount, $vc_no, $barcode);
    }      
 //******** End modification ***********                 
                $com1 = mysql_query("select * from commission");
                $row_com1 = mysql_fetch_array($com1);
                $price1 = $row_com['price'] + $row_com['extra'];
                $comission = $price1 * ($row_com1['stitching'] / 100);
                mysql_query("update sub_order set ready_date='$date', stitching_commission='$comission' where sub_order_id='" . $_REQUEST['id1'] . "'");
                rack_allotment("$order_id", "$s_order_id");
               
             } elseif ($old_stat == 2) {
                $tot = $_REQUEST['tot'] - 1;
                if ($_REQUEST['ready'] != $tot) {
                   $new_stat = 3;
//*************************************************** START STPL043 *** Modified on - 15-june-2015 *** purpose - send mail to customer for updating order status REady to deliver***************************************************************************************
                            $mail = mysql_query("select c.email_id from customer_order as co join customer as c on co.customer_id = c.customer_id where customer_order_id='".$_REQUEST['id']."'");
                            $mail_row = mysql_fetch_array($mail); 
                            $sql = mysql_query("select * from company");
                            $row = mysql_fetch_array($sql);
                            $order_id = $_REQUEST['id'];
                            $order = mysql_query("select * from customer_order where customer_order_id='$order_id'");
                            $row4 = mysql_fetch_array($order); 
                            $discount = mysql_query("select discount, total from payment where customer_order_id='$order_id'");
                            $row_dis = mysql_fetch_array($discount);
                            $items = mysql_query("select distinct item_id from sub_order where customer_order_id='$order_id'");
                            while ($row_item = mysql_fetch_array($items)) {
                            $title = get_item_name_bystyle($row_item['item_id']); 
                            $item = $item.' '.$title;
                            }
                            $status = 'ready to Deliver';
                            $email = $mail_row['email_id'];
                            $compay_email = $row['mailid'];
                            $pay = $row_dis['total'];
                            $logo = $row['logo'];
                            $cust_name = get_customer_name($row4['customer_id']);
                            $company_name = $row['company_name'];
                            $order_id = $row4['customer_order_id'];
                            $dscnt = $row_dis['discount'];
                            $order_date = $row4['order_date'];
                            $trial_date = $row4['trial_date'];
                            $delivery_date = $row4['deliver_date'];
                            require("php_mailer/shristitch_mail.php");
//************************************************** END STPL043 ****************************************************************************************************************************************************************************************     
           } else {
                    $new_stat = 3;
                    $date = date("Y-m-d");
                    mysql_query("update customer_order set status='3', ready_date='$date' where customer_order_id='" . $_REQUEST['id'] . "'");
                    alert_msg('msg');
                }
            } elseif ($old_stat == 3) {
                $new_stat = 3;
            } elseif ($old_stat == 5) {
                $new_stat = 2;
                $date = date("Y-m-d");
                mysql_query("update return_order set ready_worker_date='$date', status='1' where sub_order_id='" . $_REQUEST['id1'] . "'");
            } elseif ($old_stat == 4) {
                $new_stat = 4;
            }
            mysql_query("update sub_order set status='$new_stat' where sub_order_id='" . $_REQUEST['id1'] . "'");
            alert_msg('msg');
        }
     
        }
        if(isset($_REQUEST['change']))
            {
           $sub_order_id = $_REQUEST['s_id'];
           $sub_order=mysql_query(" select status from sub_order where sub_order_id='$sub_order_id'");
           $row=  mysql_fetch_array($sub_order);
           if($row['status']==='3' || $row['status']==='4')
              { 
              $myclass->change_status($sub_order_id, $_REQUEST['id']);
              $query = "update rack set flag='0', customer_order_id='0', sub_order_id='0' where customer_order_id='" . $_REQUEST['id'] . "' and sub_order_id='$sub_order_id' ";
              mysql_query($query);
              }
            else{
            }
   }
    $sql_c5 = mysql_query("select status from sub_order where customer_order_id='" . $_REQUEST['id'] . "'");
       while ($sql_c10 = mysql_fetch_array($sql_c5)) {
           if ($sql_c10['status'] == '3') {
            } else {
                $flag = 1;
            }
            if ($sql_c10['status'] == '4') {
                
            } else {
                $flag1 = 1;
            }
        }
        if ($flag == '1') {
            
        } else {
            $date = date("Y-m-d");
            mysql_query("update customer_order set status='3', ready_date='$date' where customer_order_id='" . $_REQUEST['id'] . "'");
        }
        if ($flag1 == '1') {
            
        } else {
            $date = date("Y-m-d");
            mysql_query("update customer_order set status='4', final_date='$date' where customer_order_id='" . $_REQUEST['id'] . "'");
            ?>
            <script>window.open('order_detail.php?sub_order_id='.$rows['sub_order_id'])</script>
            <?php
        }
        
        function rack_allotment($o_id,$s_id){
                $counter = 64;
                $check =0;
                $letter;
//                echo $o_id.','.$s_id;
                for($i=0; $i<27; $i++)
                {
                    $counter = $counter+1; 
                    $letter = chr($counter);
                    $query = "select rack_id, rack_label, flag from rack where rack_label ='$letter' and status=1";
                    $result = mysql_query($query);
                    while ($row2 = mysql_fetch_array($result)) {
                        if($row2['flag']==0)
                        { 
                        $check = 1;
                        break;
                        }
                   }
                   if($check == 1)
                  {
                   mysql_query("update rack set modified_date='$date', customer_order_id='" . $o_id . "', sub_order_id='" . $s_id . "', flag='1' where rack_id='" .$row2['rack_id']. "'");
                   mysql_query("update sub_order set rack_label='$letter' where sub_order_id='" . $s_id . "'");
                   break;
                  }
                }
//        echo '<div id="add_msg1">Sub Order No. '.$_REQUEST['id1'].' is alloted to Rack No. '.$letter.'</div>';
             ?>            
<!--  <script>$('#add_msg1').fadeOut(10000);</script>-->
       <?php    
        }
        $queryo = mysql_query("select * from customer_order where customer_order_id='".$_REQUEST['id']."'");
        $rowo = mysql_fetch_array($queryo);
        $cust_name = get_customer_name($rowo['customer_id']);
/******************************* START STPL043 **** Modified On - 09-June-2015 **** Purpose - show trial for order is taken by customer or not  **************/                                   
                                   if($rowo['trial_status'] == 0)
                                       { 
                                       $trial_date = 'NO TAKEN';
                                       }
                                   else{ 
                                       $trial_date = $rowo['trial_date']; 
                                       }
/*******************************  END STPL043  **************************************************************************************************************/

        ?>             
 </head>
    <body onload="load();">
        <div id="content" class="span10">
            <!-- content starts -->
            <div >
                <ul class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a> <span class="divider">|</span>
                    </li>
                    <li>
                        <a href="search_ordre_detail.php">Search Order Detail</a><span class="divider">|</span>
                    </li>
                    <li>
                        <a href="#"> View Sub Order</a>
                    </li>
                </ul>
            </div>

            <form method="post" name="form1" class="form-horizontal">
                <div class="box span12">
                    <div class="box-header well" data-original-title>
                        <h2><i class="icon-zoom-in"></i> Select Status</h2>
                    </div>
<!--**************************** START STPL043 **** Modified On-23-june-2015 ***** Purpose show common Sub order details ******************************************************************************************************************************-->
                    <div class="span6 well" style="margin: 10px;width: 48%;height: 170px;">
                        <legend><i class="fa fa-check-square-o"></i> Change Worker Status in Bulk</legend>
                        <span>Order Status</span>
                        <select style="width:170px; margin-left:12px;" name='change_status' id="change_status">
                            <option value="">--Select Status--</option>
                            <option value="2">Ready from worker</option>
                            <option value="3">Ready to deliver</option>
                        </select>
                            <input type="submit" name="allot_all" class="btn btn-success" onclick="show_msgallot();" value="Allot">
                            <a  href="suborderPartialPay.php"></a><button  class="btn btn-info" id="payment_all" style="width: 120px;margin-top: 4px;">Go To payment</button>
                     </div>
                    <div class="span6 well" style="margin: 10px;width: 48%;">
                        <legend style="margin-top: -10px;"><i class="fa fa-file-text-o"></i> Order Detail</legend>
                        <div style="color: #bd4247;"><span style="font-size: 22px;"> <i class="fa fa-user" style="color: rgb(85, 85, 85);"></i> <span class="myclass" style="font-size: 22px;color: rgb(55, 139, 190);"><?php echo $cust_name; ?></span></span> ( Order No. - SHRIST00<?php echo $_REQUEST[id] ?> ) </div>
                        <div><i style="margin-left: 3px;margin-right: 7px;color: rgb(85, 85, 85);" class="fa fa-calendar"></i><span style="margin-right: 8px;">Order Date</span> : <?php echo $rowo['order_date']; ?></div>
                        <div><i style="margin-left: 3px; margin-right: 7px;color: rgb(85, 85, 85);" class="fa fa-calendar"></i><span style="margin-right: 18px;">Trial Date</span> : <?php echo $trial_date; ?></div>
                        <div><i style="margin-left: 3px; margin-right: 7px;color: rgb(85, 85, 85);" class="fa fa-calendar"></i><span>Deliver Date</span> : <?php echo $rowo['deliver_date']; ?></div>
                    </div>
<!--**************************** END STPL043 ***********************************************************************************************************************************************************************************************************-->
               </div>

                <div class="row-fluid sortable">
                    <div class="box span12">
                        <div class="box-header well" data-original-title>
                            <h2><i class="icon-user"></i> Sub Order</h2>
                            <a href="search_ordre_detail.php">  
                                <button type="button" name="Back" value="Back" id="Back" class="btn btn-success" style="float:right"><i class="fa fa-fast-backward"></i> Back</button>
                            </a>
                        </div>
                        <div class="box-content">
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectall" class="check"></th>
                                        <th>S.N.</th>
                                        <th>Sub Order No.</th>
                                        <th>Item Name<br />Price (Basic + Extra)</th>
                                        <th>Booking</th>
                                        <th>Cutting</th>
                                        <th>Stitching</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $detail = mysql_query("SELECT s_o.order_date, s_o.customer_order_id, s_o.trial_date, s_o.sub_order_id, s_o.deliver_date, s_o.status, c_o.customer_id, s_o.item_id, c_o.worker_booking, c_o.trial_status, s_o.worker_cutting, s_o.worker_stitching, s_o.extra FROM sub_order as s_o join customer_order as c_o on s_o.customer_order_id=c_o.customer_order_id WHERE s_o.customer_order_id='" . $_REQUEST['id'] . "'");
                                    $counter = 0;
                                    while ($rows = mysql_fetch_array($detail)) {
                                        $cust_name = get_customer_name($rows['customer_id']);
                                        $sub_order = mysql_query("SELECT COUNT(customer_order_id) as s_order FROM sub_order where customer_order_id='" . $_REQUEST['id'] . "'");
                                        $rowss = mysql_fetch_array($sub_order);
                                        $r_d = mysql_query("select COUNT(status) as status3 from sub_order where status='3' AND customer_order_id='" . $_REQUEST['id'] . "'");
                                        $row1 = mysql_fetch_array($r_d);
                                        $item = mysql_query("select item_title, price from item where item_id='" . $rows['item_id'] . "'");
                                        $row_it = mysql_fetch_array($item);
                                        $w_book = get_worker_name($rows['worker_booking']);
                                        $w_cut = get_worker_name($rows['worker_cutting']);
                                        $w_stitch = get_worker_name($rows['worker_stitching']);
                                        $sql_return = mysql_query("select * from return_order where sub_order_id='" . $rows['sub_order_id'] . "'");
                                        $row_return = mysql_fetch_array($sql_return);
                                        $counter += 1;
                                        echo "<tr>";
                                        echo'<td><input type="checkbox" class="case check" name="selector[]" id="selector'.$counter.'" value="' . $rows['sub_order_id'] . '"></td>';
                                        echo "<td>" . $counter . "</td>";
                                        echo "<td>" . $rows['sub_order_id'] . "</td>";
                                        $item_price = $row_it['price'] + $rows['extra'];
                                        echo "<td>" . $row_it['item_title'] . " ( <span style='color: rgb(61, 139, 255);font-size: 14px;'>" . $item_price . "</span> )" . "</td>";
                                        echo "<td>";
                                        if ($rows['worker_booking'] == '0') {
                                            echo "Not Alloted";
                                        } else {
                                            echo $w_book;
                                        }
                                        echo"</td>";
                                        echo "<td>";
                                        if ($rows['worker_cutting'] == '0') {
                                            echo "Not Alloted";
                                        } else {
                                            echo $w_cut;
                                        }
                                        echo"</td>";
                                        echo "<td>";
                                        if ($rows['worker_stitching'] == '0') {
                                            echo "Not Alloted";
                                        } else {
                                            echo $w_stitch;
                                        }
                                        echo"</td>";
                                       if (isset($_POST['allot_all']) AND $checked == $rows['sub_order_id']) {
                                            ?><td id="disable"><?php
                                            // echo "<td>";
                                            if($newstaus == '4') {}
                                            else{
                                            ?>           <a href="<?php echo "view_suborder.php?status=$newstaus&id=$_REQUEST[id]&id1=$rows[sub_order_id]&tot=$rowss[s_order]&ready=$row1[status3]" ?>" >

                                                <?php
                                            }
                                                if ($newstaus == '0') {
                                                    ?><a style="text-decoration: none;"><?php
                                                    echo '<span id="status'.$counter.'">Assigned</span>';
                                                    ?> </a><?php
                                                } elseif ($newstaus == '1') {
                                                    echo '<span id="status'.$counter.'">Proceed For Stitch</span>';
                                                } elseif ($newstaus == '1' && $newstaus == '2') {
                                                    echo '<a href="order_detail.php?sub_order_id=' . $rows['sub_order_id'] . '">Ready From Worker</a>';
                                                } elseif ($newstaus == '2') {
                                                    echo '<span id="status'.$counter.'">Ready From Worker</span>';
                                                } elseif ($newstaus == '3') {
                                                    ?><a style="text-decoration: none;"><?php
                                                        echo '<span>Ready To Deliver</span>';
                                                        ?> </a><?php
                                                } elseif ($newstaus == '4') {
                                                  ?><a style="text-decoration: none;"><?php 
                                                  echo '<span id="status'.$counter.'">Delivered</span>';
                                                    ?> </a><?php
                                                } elseif ($newstaus == '5') {
                                                    echo '<span id="status'.$counter.'">Return Order</span>';
                                                }
                                                ?></a><?php
                                                echo "</td>";
                                            } else {
                                                echo "<td >";
                                                ?>
                                            <a href="<?php echo "view_suborder.php?status=$rows[status]&id=$_REQUEST[id]&id1=$rows[sub_order_id]&tot=$rowss[s_order]&ready=$row1[status3]" ?>" >

                                                <?php
                                                if ($rows['status'] === '0') {
                                                    ?><a style="text-decoration: none;"><?php
                                                    echo '<span id="status'.$counter.'">Assigned</span>';
                                                    ?> </a><?php
                                                } elseif ($rows['status'] === '1') {
                                                    echo '<span id="status'.$counter.'">Proceed For Stitch</span>';
                                                } elseif ($row_return['status'] === '1' && $rows['status'] === '2') {
                                                    echo '<a href="order_detail.php?sub_order_id=' . $rows['sub_order_id'] . '">Ready From Worker</a>';
                                                } elseif ($rows['status'] === '2') {
                                                    echo '<span id="status'.$counter.'">Ready From Worker</span>';
                                                } elseif ($rows['status'] === '3') {
                                                    ?><a style="text-decoration: none;"><?php
                                                        echo '<span id="status'.$counter.'">Ready To Deliver</span>';
                                                        ?></a><?php
                                                } elseif ($rows['status'] === '4') {
                                                     ?><a style="text-decoration: none;"><?php
                                                    echo '<span id="status'.$counter.'">Delivered</span>';
                                                     ?></a><?php
                                                } elseif ($rows['status'] === '5') {
                                                    echo '<span id="status'.$counter.'">Return Order</span>';
                                                }
                                                ?>
                                            </a>
                                            <?php
                                            echo "</td>";
                                        }
                                        
                                        echo'<td><a class="btn btn-success" style="margin-right:5px;" href="sub_order_detail.php?id=' . $rows[sub_order_id] . '">Detail</a>';
                                        $check=$myclass->check_remaining($_REQUEST['id'],$rows['sub_order_id']);
                                        if($check=='1'){
                                             echo '<a style="margin-right:5px;" class="btn btn-warning" id="payment'.$counter.'" disabled="disabled">Paid</a>';
                                        }
                                        else{   echo '<a class="btn btn-info payment" id="payment'.$counter.'" href="suborderPartialPay.php?id=' . $rows[sub_order_id] . ',&order_id='.$rows[customer_order_id].'">Go To Payment</a>';
                                        }
                                          if($rows['status']==='3')
                                        {
                                           echo '<a class="btn btn-success payment" id="payment'.$counter.'" style="margin-left:5px;"  onclick="return getsubid('.$rows[sub_order_id].')" href="view_suborder.php?change=change&id='.$_REQUEST['id'].'&s_id='.$rows[sub_order_id].'">Deliver & Invoice</a>';
                                                 
                                        }
                                        else{
                                            if($rows['status']==='4')
                                        {
                                                 
                                        }
                                        else{
                                             echo'<button class="btn btn-small btn-info" style="margin-left:5px;" type="button" name="deliver" value="Not Ready" disabled="disabled">Not Ready</button>';
                                            
                                        }
                                        }
                                     
                                        echo'</td></tr>';
                                        
                                    }
                                    ?>

                                    </tbody>
                            </table>
                            <input id="count" type="hidden" value="<?php echo $counter ; ?>">
                            <input id="order_id" type="hidden" value="<?php echo $_REQUEST[id] ; ?>">
                            <input id="subid" type="hidden" name="subid">
                        </div>
                    </div>
                </div>
           </form>
        </div>
   </div><!--/fluid-row-->
     <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script>
            $(document).ready(function() {
                $('#payment_all').attr('disabled', 'disabled');
            });
            function load() {
                var disable = document.getElementById("disable").disabled = true;
            }
            function show_msgallot()
            {
                $('#add_msg1').fadeOut(10000);
            }

            $(function() {
                // add multiple select / deselect functionality
                $("#selectall").click(function() {
                    $('.case').attr('checked', this.checked);
                    $('#payment_all').removeAttr('disabled');
                    $('.payment').attr('disabled', 'disabled');
                    if (!$("#selectall").is(':checked'))
                    {
                        $('#payment_all').attr('disabled', 'disabled');
                        $('.payment').removeAttr('disabled');
                    }
                });

                // if all checkbox are selected, check the selectall checkbox
                // and viceversa
                $(".case").click(function() {
                    if ($(".case").length === $(".case:checked").length) {
                        $("#selectall").attr("checked", "checked");
                        $('#payment_all').removeAttr('disabled');
                        $('.payment').attr('disabled', 'disabled');

                    } else {
                        $("#selectall").removeAttr("checked");
                        $('#payment_all').removeAttr('disabled');
                    }
                    var s = 0;
                    var total_checkbox = document.getElementById('count').value;
                    for (var i = 1; i <= total_checkbox; i++)
                    {
                        if ($("#selector" + i).is(':checked'))
                        {
                            s = s + 1;
                            $('#payment' + i).attr('disabled', 'disabled');
                            $('#payment_all').removeAttr('disabled');
                        }
                        else {
                            $('#payment' + i).removeAttr('disabled');
                        }
                        if (s === 0)
                        {
                            $('#payment_all').attr('disabled', 'disabled');
                        }
                    }
                });
            });

            function getsubid(obj)
            {
                document.getElementById("subid").value = obj;
                  
                    var reply = confirm("Do You Want To Deliver this Sub Order And Generate Slip?");
                if (reply)
                {
                     //window.location='sub_order_invoice.php?id=<?php echo $_REQUEST['id']; ?>&s_id=<?php echo  $sub_order_id; ?>';
                    window.location='view_suborder.php?id=<?php echo $_REQUEST['id']; ?>';
                    window.open('sub_order_invoice.php?id=<?php echo $_REQUEST['id']; ?>&s_id='+obj);
                    return true;
                }
                else {
                    return false;
                }
            }
   </script>   
    <script>
        $("#payment_all").click(function() {
            var s = document.getElementById('count').value;
            var order_id = document.getElementById('order_id').value;
            var j = '';
            for (var i = 0; i <= s; i++) {
                $('#selector' + i + ':checked').each(function() {
                    var status = document.getElementById('status' + i).innerHTML;
                    var t = document.getElementById('selector' + i).value;
                    j = t + ',' + j;
                    // alert(j);

                });
            }
            // alert(j);
            window.open('suborderPartialPay.php?id=' + j + '&order_id=' + order_id + '');
        });

    </script> 
<?php include 'include/jquery_form.php';
 include 'include/footer.php'; ?>
   <script>
             $("#payment_all").click(function() {
                    var s = document.getElementById('count').value;
                    var order_id = document.getElementById('order_id').value;
                    var j = '';
                    for (var i = 0; i <= s; i++) {
                        $('#selector' + i + ':checked').each(function() {
                            var status = document.getElementById('status' + i).innerHTML;
                              var t = document.getElementById('selector' + i).value;
                              j = t + ',' + j;
                        });
                     }
                    window.open('suborderPartialPay.php?id=' + j + '&order_id='+order_id+'');
                 });
    </script> 
   <button class="btn btn-primary noty" style="display:none;" id="msg" style="" data-noty-options='{"text":"Status Changed","layout":"topRight","type":"success"}'><i class="icon-bell icon-white"></i> Top Right</button>
</body>
</html>



