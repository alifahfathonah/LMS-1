<?php session_start();
include "../db.php";
include "layout/header.php";
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM student where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$sid=$output2['id'];
if(!$output2)
{
    echo "<script> alert('Sorry! You need to login first');window.location.href='login.php' </script>";
}
$data = mysqli_query($conn, "SELECT * FROM feedback where sid='$sid'");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$data3 = mysqli_query($conn, "SELECT * FROM assign_students where sid='$sid'");
$output3 = mysqli_fetch_all($data3,MYSQLI_ASSOC);
//Add feedback
if(isset($_POST['add']))
{
   $iid = $_POST['iid'];
   $feedback = $_POST['feedback'];
   $insert = mysqli_query($conn,"INSERT INTO `feedback`(`sid`, `iid`,`feedback`)
    VALUES('$sid','$iid','$feedback')");
     if($insert){
        echo "<script> alert('Student is Added Successfully!');window.location.href='feedback.php' </script>";
    }
}
 //UPDATE feedback
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
//Delete feedback
if(isset($_POST['del']))
{
   $id = $_POST['id'];
   $sql = "DELETE FROM feedback WHERE id='$id'";
   $del=mysqli_query($conn, $sql);
       if($del){
           echo "<script> alert('feedback is Deleted Successfully!');window.location.href='feedback.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800"> Feedbacks of Students</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
<button class='btn btn-success mr-2'  data-toggle="modal" data-target="#AddempModal">Add New feedback</button> <br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Students Feedbacks</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th>To Instructor </th>
                        <th>Feedback</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        <td><?php $iid=$out['iid']; $data2 = mysqli_query($conn, "SELECT * FROM instructor where id='$iid'");
                            $output2 = mysqli_fetch_assoc($data2); echo $output2['name']?></td>
                        <td><?php echo $out['feedback']?></td>
                        <td> <a class="btn btn-warning btn-circle"  onclick="GetEModal('<?php echo $final['id']?>','<?php echo $final['sid']?>','<?php echo $final['iid']?>''
                             ,'<?php echo $final['feedback']?>')" data-toggle="modal" data-target="#editModal">
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
                    After Click on delete you cannot retrive back this feedback.
                    Also relevent information feedback from system will remove 
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
<!-- Add student Modal-->
<div class="modal fade" id="AddempModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Add New Student</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                             <label for="">Select Instructor:</label>
                         <select name="iid" id="" class="  form-control form-control-user">
                             <?php foreach($output3 as $out3){ 
                                 $iid=$out3['iid']; $mysql= mysqli_query($conn, "SELECT * FROM instructor where id='$iid'");
                                 $result = mysqli_fetch_assoc($mysql); echo $result['name'];?>
                          <option value="<?php echo $result['id'];?>"><?php echo $result['name'];?> </option>
                          <?php   }?>
                            </select>  <br>
                            <textarea name="feedback" class=" form-control form-control-user"id="" cols="30" rows="5" required>Write your feedback</textarea>
                        
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
                    <label for="">Select Instructor:</label>
                         <select name="iid" id="" class="  form-control form-control-user">
                             <?php foreach($output3 as $out3){ 
                                 $iid=$out3['iid']; $mysql= mysqli_query($conn, "SELECT * FROM instructor where id='$iid'");
                                 $result = mysqli_fetch_assoc($mysql); echo $result['name'];?>
                          <option value="<?php echo $result['id'];?>"><?php echo $result['name'];?> </option>
                          <?php   }?>
                            </select>  <br>
                            <textarea name="feedback" class=" form-control form-control-user"id="" cols="30" rows="4" required>Write your feedback</textarea>
                        
               </div>
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

</div>