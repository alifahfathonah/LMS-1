<?php session_start();
include "../db.php";
include "layout/header.php";
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM instructor where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$iid=$output2['id'];
if(!$output2)
{
    echo "<script> alert('Error! You need to login first)');window.location.href='login.php' </script>";
}

$data = mysqli_query($conn, "SELECT * FROM groups WHERE iid='$iid'");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$data3 = mysqli_query($conn, "SELECT * FROM assign_students WHERE iid='$iid'");
$output3 = mysqli_fetch_all($data3,MYSQLI_ASSOC);
//Add new group Form Submit
if(isset($_POST['add']))
  {  
     $name =  $_POST['name'];
    $status= $_POST['status'];
    $insert = mysqli_query($conn,"INSERT INTO `groups`(`name`, `iid`,`status`)
    VALUES('$name','$iid','$status')");
     if($insert){
        echo "<script> alert('Group is Added Successfully!');window.location.href='groups.php' </script>";
    }
}
//Assign New Student
if(isset($_POST['assign']))
  {  
     $sidarr =  $_POST['sid'];
     $gid =  $_POST['gid'];
    foreach($sidarr as $sid){
        $data5= mysqli_query($conn, "SELECT * FROM assign_group where sid='$sid' and gid='$gid'");
    $output5 = mysqli_fetch_assoc($data5);
    if($output5){
        echo "<script> alert('Sorry! Student is already assigned to this instructor. Try Another!');window.location.href='assign_students.php' </script>";
    }
    else{
    $insert = mysqli_query($conn,"INSERT INTO `assign_group`(`gid`, `sid`)
    VALUES('$gid','$sid')");
     if($insert){
        echo "<script> alert('Group is Assigned Successfully!');window.location.href='groups.php' </script>";
    } 
} 
}
}
 //Delete groups
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM groups WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('Group is Deleted Successfully!');window.location.href='groups.php' </script>";
        }
 }
 //UPDATE groups
 if(isset($_POST['up']))
 { $id =  $_POST['id'];
    $name =  $_POST['name'];
    $status= $_POST['status'];
    $sql = "UPDATE `groups` SET `name`='$name',`status`='$status'   WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('Group Details is Updated Successfully!');window.location.href='groups.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800">Manage Groups</h1>
<p class="mb-4">Here is All the Group that have purchased lisence You can  Assign groups to<a 
        href="Groups.php"> Groups</a>. Or assign a groups to <a   href="Groups.php">Student </a></p>
        
<button class='btn btn-success mr-2'  data-toggle="modal" data-target="#AddempModal">Add New Group</button> ><br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Groups</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Group Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        <td><?php echo $out['name']?></td>
                        <td><?php echo $out['status']?></td>
                        <td>  <a class="btn btn-warning btn-circle"  onclick="GetEModal('<?php echo $out['id']?>','<?php echo $out['name']?>','<?php echo $out['status']?>'
                             )" data-toggle="modal" data-target="#editModal">
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
                    After Click on delete you cannot retrive back this groups.
                    Also relevent information groups from system will remove 
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
 <!-- Add Group Modal-->
 <div class="modal fade" id="AddempModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Add New Group</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                     
                        <input type="text" name="name" class=" form-control form-control-user" placeholder="Enter Group Name" required> <br>
                        
                            <label for="">Select Status:</label>
                            <select name="status" id="" class="  form-control form-control-user">
                          <option value="active">Active </option>
                          <option value="inactive">Inactive</option>
                            </select> 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="add" class="btn btn-success" value="Add New">
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Add assign_students Modal-->
 <div class="modal fade" id="assignModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Add New assign_students</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                     
                             <label for="">Select Group:</label>
                         <select name="gid" id="" class="  form-control form-control-user">
                         <?php foreach($output as $out){ ?>
                             <option value="<?php echo $out['id']?> "><?php echo $out['name']?> </option>
                         <?php } ?>
                            </select>  <br>
                            <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" height="100px" cellspacing="0">
               <tr class='bg-light '> <th>Student</th>
                 <th>Tick To Assign</th></tr>
                 <?php foreach($output3 as $out3){ ?>
                        <tr>
                            <td><?php $sid=$out3['sid']; $data4 = mysqli_query($conn, "SELECT * FROM student WHERE id='$sid'");
                                $output4 = mysqli_fetch_assoc($data4); echo $output4['name']?></td>
                            <td class="text-center"><input type="checkbox" style=" zoom: 1.5;" name="sid[]" value="<?php echo $out3['sid']?>" id="" ></td>
                        </tr>  <?php } ?>
                </table>
                         </div>
                         </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="assign" class="btn btn-success" value="Assign Now">
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Update groups  Modal-->
 <div class="modal fade" id="editModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Update groups Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                    <input type="hidden" name="id" id='id'  >
                    <input type="text" name="name"  id='name' class=" form-control form-control-user" placeholder="Enter Group Name" required> <br>
                        
                            <label for="">Select Status:</label>
                            <select name="status" id="status" class="  form-control form-control-user">
                          <option value="active">Active </option>
                          <option value="inactive">Inactive</option>
                            </select> 
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
<script>
   

function GetEModal(id,name,status) {
    document.getElementById("id").value=id ;
    document.getElementById("name").value =name;
    document.getElementById("status").value =status;
    
}

</script>

</div>