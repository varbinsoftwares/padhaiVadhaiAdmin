<?php
$this->load->view('layout/layoutTop');
?>
<!-- Main content -->
<section class="content">
    <div class="">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Add User</h3>
            </div>
            <div class="box-body">
<form action="#" method="post">
<div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" class="form-control"  name="last_name" id="exampleInputPassword1" placeholder="Last Name">
  </div>
   <div class="form-group">
    <label for="exampleFormControlSelect1">User Type</label>
    <select class="form-control" id="exampleFormControlSelect1" name="user_type">
      <option>Admin</option>
      <option>Manager</option>
   
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
        </div>


    </div>
</section>
<!-- end col-6 -->
</div>


<?php
$this->load->view('layout/layoutFooter');
?> 

