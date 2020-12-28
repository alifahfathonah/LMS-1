<?php session_start();
include "../db.php";
include "layout/header.php";
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM instructor where email='$email'");
$output2 = mysqli_fetch_assoc($data2); $iid=$output2['id'];
if(!$output2)
{
    echo "<script> alert('Error! You need to login first);window.location.href='login.php' </script>";
}
$data3 = mysqli_query($conn, "SELECT * FROM assign_students where iid='$iid' ");
$output3 = mysqli_fetch_all($data3,MYSQLI_ASSOC);

//Add new student Form Submit
if(isset($_POST['add']))
  {  
     $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $address= $_POST['address'];
    $gender= $_POST['gender'];
    $status= $_POST['status'];
    $insert = mysqli_query($conn,"INSERT INTO `student`(`name`, `email`,`password`,`address`,`gender`,`status`)
    VALUES('$name','$email','$password','$address','$gender','$status')");
     $get = mysqli_query($conn,"SELECT id FROM student ORDER BY id DESC LIMIT 1");
     $printarr = mysqli_fetch_assoc($get); $sid=implode(" ",$printarr);
      $insert2 = mysqli_query($conn,"INSERT INTO `assign_students`(`sid`, `iid`)
      VALUES('$sid','$iid')");
     if($insert){
        echo "<script> alert('student is Added Successfully!');window.location.href='students.php' </script>";
    }
}
 //Delete student
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM student WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('student is Deleted Successfully!');window.location.href='students.php' </script>";
        }
 }
 //UPDATE student
 if(isset($_POST['up']))
 { $aid =  $_POST['aid'];
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $address= $_POST['address'];
    $gender= $_POST['gender'];
    $status= $_POST['status'];
    $sql = "UPDATE `student` SET `name`='$name',`email`='$email' ,`password`='$password' ,`address`='$address',`gender`='$gender' ,`status`='$status'  WHERE id='$aid'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('student Details is Updated Successfully!');window.location.href='students.php' </script>";
        }
 }
 //Assign LISENCE to Student
if(isset($_POST['assign']))
{  
   $sid =  $_POST['sid'];
  $lkey =  $_POST['lkey'];
  $date =  $_POST['date'];
  $insert1 = mysqli_query($conn,"INSERT INTO `lisence`(`lkey`, `sid`,`exp_date`)
  VALUES('$lkey','$sid','$date')");
   if($insert1){
      echo "<script> alert('Lisence is Assigned Successfully!');window.location.href='students.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800">Manage students</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
<button class='btn btn-success mr-2'  data-toggle="modal" data-target="#AddempModal">Add New student</button> 
<button class='btn btn-primary mr-2'  data-toggle="modal" data-target="#assignModal">Assign lisence</button><br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage students</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output3 as $out3) {?>
                    <tr>
                    <?php $sid=$out3['sid']; $data = mysqli_query($conn, "SELECT * FROM student where id='$sid' ");
                            $final = mysqli_fetch_assoc($data,);?>
                        <td><?php echo $final['name']?></td>
                        <td><?php echo $final['email']?></td>
                        <td><?php echo $final['password']?></td>
                        <td><?php echo $final['address']?></td>
                        <td><?php echo $final['gender']?></td>
                        <td><?php echo $final['status']?></td>
                       
                    
                        <td>  <a class="btn btn-warning btn-circle"  onclick="GetEModal('<?php echo $final['id']?>','<?php echo $final['name']?>','<?php echo $final['email']?>','<?php echo $final['password']?>'
                             ,'<?php echo $final['address']?>','<?php echo $final['gender']?>','<?php echo $final['status']?>')" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-edit"></i>
                          </a> 
                          <a href=""  class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delModal">
                                        <i class="fas fa-trash"></i>
                          </a></td>
                    
                     <!-- Delete Confirmation Modal-->
 <div class="modal fade" id="delModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Are you sure you want to delete!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center ">
                <i class="fas fa-exclamation-triangle btn-warning btn-lg  btn-circle"></i> <br>
                    After Click on delete you cannot retrive back this student.
                    Also relevent information student from system will remove 
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
 
     <!-- Assign Lisence  Modal-->
 <div class="modal fade" id="assignModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Assign Lisence to Student</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                <label for="">Select Student:</label>
                         <select name="sid" id="" class="  form-control form-control-user">
                             <?php foreach($output as $out){?>
                          <option value="<?php echo $out['id'] ?>"><?php echo $out['name'] ?></option>
                          <?php }?>
                            </select>  <br>
                        <button class="btn btn-info" type="button" onclick="makekey()">Generate Key</button> <br>
                        <div class="row">
                            <div class="col-md-6">
                             <label for="">Lisence Key</label>
                            <input type="text" class=' form-control ' name="lkey" id="lkey" readonly>
                            </div>
                            <div class="col-md-6">
                            <label for="">Expiry Date:</label> 
                           <input type="date" name="date" id="" class=' form-control' required>
                                </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="assign" class="btn btn-success" value="Assign lisence">
                    </form>
                    </div>
            </div>
        </div>
    </div>
 <!-- Add student Modal-->
 <div class="modal fade" id="AddempModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Add New student</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                     
                        <input type="text" name="name" class=" form-control form-control-user" placeholder="Enter student Name" required> <br>
                        <input type="email" name="email" class=" form-control form-control-user"     placeholder="student Email" >  <br>
                        <input type="text" name="password" class=" form-control form-control-user"     placeholder="student Password" 
                        pattern=".{8,}" required  title="Passwod must contain 8 characters">  <br>
                        <input type="text" name="address" placeholder="Enter Address"  class=" form-control form-control-user" >  <br>
                         <div class="row">
                         <div class="col-md-6">
                             <label for="">Select Gender:</label>
                         <select name="gender" id="" class="  form-control form-control-user">
                          <option value="male">Male </option>
                          <option value="female">Female </option>
                          <option value="other">Other </option>
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
     <!-- Update student  Modal-->
 <div class="modal fade" id="editModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Update student Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                    <input type="hidden" name="aid" id='aid'  >
                    <input type="text" id="name" name="name" class=" form-control form-control-user" placeholder="Enter student Name" required> <br>
                        <input type="email" id="email" name="email" class=" form-control form-control-user"     placeholder="student Email" >  <br>
                        <input type="text" name="password" id="password"  class=" form-control form-control-user"     placeholder="student Password" 
                        pattern=".{8,}" required  title="Passwod must contain 8 characters">  <br>
                        <input type="text" name="address" id="address"  class=" form-control form-control-user" >  <br>
                         <div class="row">
                         <div class="col-md-6">
                         <label for="">Select Gender:</label>
                            <select name="gender" id="gender" class="  form-control form-control-user">
                          <option value="male">Male </option>
                          <option value="Female">Female </option>
                          <option value="other">Other </option>
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
      $(document).ready(function() {
if(window.location.href.indexOf('#viewModal') != -1) {
  $('#viewModal').modal('show');
}
});
function makekey() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 8; i++){
    text += possible.charAt(Math.floor(Math.random() * possible.length));}
    document.getElementById("lkey").value=text ;
 
}

function GetEModal(aid,name,email,pass,address,gender,status) {
    document.getElementById("aid").value=aid ;
    document.getElementById("name").value =name;
    document.getElementById("email").value =email;
    document.getElementById("password").value =pass;
    document.getElementById("address").value =address;
    document.getElementById("status").value =status;
}

</script>

</div>