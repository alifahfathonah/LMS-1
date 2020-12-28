<?php session_start();
include "../db.php";
include "layout/header.php";
$data = mysqli_query($conn, "SELECT * FROM admin ");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM admin where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$role=$output2['role'];
if(strcmp($role, "super admin")!== 0)
{
    echo "<script> alert('Error! Only Super Admin can access this page');window.location.href='login.php' </script>";
}

//Add new admin Form Submit
if(isset($_POST['add']))
  {  
     $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $role= $_POST['role'];
    $status= $_POST['status'];
    $insert = mysqli_query($conn,"INSERT INTO `admin`(`name`, `email`,`password`,`role`,`status`)
	VALUES('$name','$email','$password','$role','$status')");
     if($insert){
        echo "<script> alert('Admin is Added Successfully!');window.location.href='admins.php' </script>";
    }
}
 //Delete admin
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM admin WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('admin is Deleted Successfully!');window.location.href='admins.php' </script>";
        }
 }
 //UPDATE admin
 if(isset($_POST['up']))
 { $aid =  $_POST['aid'];
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $role= $_POST['role'];
    $status= $_POST['status'];
    $sql = "UPDATE `admin` SET `name`='$name',`email`='$email' ,`password`='$password' ,`role`='$role' ,`status`='$status'  WHERE id='$aid'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('Admin Details is Updated Successfully!');window.location.href='admins.php' </script>";
        }
 }
?>   

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
<?php include "layout/sidebar.php";?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        <?php include "layout/topbar.php";?>

   <!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manage Admins</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
<button class='btn btn-success mr-2'  data-toggle="modal" data-target="#AddempModal">Add New admin</button> <br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Owner admins</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        <td><?php echo $out['name']?></td>
                        <td><?php echo $out['email']?></td>
                        <td><?php echo $out['password']?></td>
                        <td><?php echo $out['role']?></td>
                        <td><?php echo $out['status']?></td>
                        <td> 
                       
                             <a class="btn btn-warning btn-circle"  onclick="GetEModal('<?php echo $out['id']?>','<?php echo $out['name']?>','<?php echo $out['email']?>','<?php echo $out['password']?>'
                             ,'<?php echo $out['role']?>','<?php echo $out['status']?>')" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-edit"></i>
                          </a> 
                          <a href=""  class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delModal">
                                        <i class="fas fa-trash"></i>
                          </a></td>
                    
                     <!-- Delete Confirmation Modal-->
 <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Are you sure you want to delete!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center ">
                <i class="fas fa-exclamation-triangle btn-warning btn-lg  btn-circle"></i> <br>
                    After Click on delete you cannot retrive back this admin.
                    Also relevent information admin from system will remove 
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $out['id']?>">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="del" class="btn btn-danger" value="Yes, Delete">
                    </form>
                </div>
            </div>
        </div>
    </div> <?php }?>
    </tr>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid end-->
 <!-- Add admin Modal-->
 <div class="modal fade" id="AddempModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Add New admin</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                     
                        <input type="text" name="name" class=" form-control form-control-user" placeholder="Enter Admin Name" required> <br>
                        <input type="email" name="email" class=" form-control form-control-user"     placeholder="Admin Email" >  <br>
                        <input type="text" name="password" class=" form-control form-control-user"     placeholder="Admin Password" 
                        pattern=".{8,}" required  title="Passwod must contain 8 characters">  <br>
                         <div class="row">
                         <div class="col-md-6">
                             <label for="">Select Role:</label>
                         <select name="role" id="" class="  form-control form-control-user">
                          <option value="admin">Admin </option>
                          <option value="super admin">Super Admin </option>
                            </select>  <br>
                            </div>
                            <div class="col-md-6">
                            <label for="">Select Status:</label>
                            <select name="status" id="" class="  form-control form-control-user">
                          <option value="active">Active </option>
                          <option value="inactive">Inactive</option>
                            </select> 
                            </div>
                         </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="add" class="btn btn-success" value="Add New">
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Update admin  Modal-->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Update Admin Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                    <input type="hidden" name="aid" id='aid'  >
                    <input type="text" id="name" name="name" class=" form-control form-control-user" placeholder="Enter Admin Name" required> <br>
                        <input type="email" id="email" name="email" class=" form-control form-control-user"     placeholder="Admin Email" >  <br>
                        <input type="text" name="password" id="password"  class=" form-control form-control-user"     placeholder="Admin Password" 
                        pattern=".{8,}" required  title="Passwod must contain 8 characters">  <br>
                         <div class="row">
                         <div class="col-md-6">
                             <label for="">Select Role:</label>
                         <select name="role" id="role" class="  form-control form-control-user">
                          <option value="admin">Admin </option>
                          <option value="super admin">Super Admin </option>
                            </select>  <br>
                            </div>
                            <div class="col-md-6">
                            <label for="">Select Status:</label>
                            <select name="status" id="status" class="  form-control form-control-user">
                          <option value="active">Active </option>
                          <option value="inactive">Inactive</option>
                            </select>  </div>
                </div> </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="up" class="btn btn-warning" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php include "layout/footer.php"?>

</div>
<script>
    onclick


function GetEModal(aid,name,email,pass,role,status) {
    document.getElementById("aid").value=aid ;
    document.getElementById("name").value =name;
    document.getElementById("email").value =email;
    document.getElementById("password").value =pass;
    document.getElementById("role").value =role;
    document.getElementById("status").value =status;
}

</script>

</div>