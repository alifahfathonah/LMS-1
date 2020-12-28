<?php session_start();
include "../db.php";
include "layout/header.php";
$data = mysqli_query($conn, "SELECT * FROM subscribers ");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);

$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM admin where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$role=$output2['role'];
if(strcmp($role, "super admin")!== 0)
{
    echo "<script> alert('Error! Only Super Admin can access this page');window.location.href='login.php' </script>";
}

 //Delete subscribers
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM subscribers WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('Subscriber is Deleted Successfully!');window.location.href='subscribers.php' </script>";
        }
 }
 //UPDATE subscribers
 if(isset($_POST['up']))
 { $id =  $_POST['id'];
    $name =  $_POST['name'];
    $user_type =  $_POST['user_type'];
    $l_type = $_POST['l_type'];
    $validity= $_POST['validity'];
    $status= $_POST['status'];
    $sql = "UPDATE `subscribers` SET `name`='$name',`user_type`='$user_type' ,`l_type`='$l_type' ,`validity`='$validity',`status`='$status'   WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('Subscriber Details is Updated Successfully!');window.location.href='subscribers.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800">Manage Subscriptions</h1>
<p class="mb-4">Here is All the subscriber that have purchased lisence You can  Assign subscribers to<a 
        href="students.php"> Students</a>. Or assign a subscribers to <a   href="students.php">instructor </a></p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Subscriptions</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Full Name</th>
                        <th>User Type</th>
                        <th>Lisence Type</th>
                        <th>Validity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        <td><?php echo $out['name']?></td>
                        <td><?php echo $out['user_type']?></td>
                         <td><?php echo $out['l_type']?></td> 
                         <td><?php echo $out['validity']?></td>
                        <td><?php echo $out['status']?></td>
                        <td>  <a class="btn btn-warning btn-circle"  onclick="GetEModal('<?php echo $out['id']?>','<?php echo $out['name']?>','<?php echo $out['user_type']?>'
                             ,'<?php echo $out['l_type']?>','<?php echo $out['validity']?>','<?php echo $out['status']?>')" data-toggle="modal" data-target="#editModal">
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
                    After Click on delete you cannot retrive back this subscribers.
                    Also relevent information subscribers from system will remove 
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

     <!-- Update subscribers  Modal-->
 <div class="modal fade" id="editModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Update subscribers Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                    <input type="hidden" name="id" id='id'  >
                    <input type="text" class=' form-control ' name="name" id="name" required> <br>
                        <div class="row">
                            <div class="col-md-6">
                            <label for="">Select User Type:</label>
                            <select name="user_type" id="user_type" class="  form-control form-control-user">
                          <option value="student">Student </option>
                          <option value="instructor">Instructor</option>
                            </select> 
                            <label for="">Valid Till :</label> 
                           <input type="date" name="validity" id="validity" class=' form-control' required>
                           
                            </div>
                            <div class="col-md-6">
                            <label for="">Select Lisence Type:</label>
                            <select name="l_type" id="l_type" class="  form-control form-control-user">
                          <option value="weekly">Weekly </option>
                          <option value="monthly">Monthly</option>
                          <option value="yearly">Yearly</option>
                            </select> 
                            
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
   

function GetEModal(id,name,user_type,l_type,validity,status) {
    document.getElementById("id").value=id ;
    document.getElementById("name").value =name;
    document.getElementById("user_type").value =user_type;
    document.getElementById("l_type").value =l_type;
    document.getElementById("validity").value =validity;
    document.getElementById("status").value =status;
    
}

</script>

</div>