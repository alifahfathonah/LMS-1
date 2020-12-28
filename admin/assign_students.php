<?php session_start();
include "../db.php";
include "layout/header.php";
$data = mysqli_query($conn, "SELECT * FROM assign_students ");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$data3 = mysqli_query($conn, "SELECT * FROM instructor ");
$output3 = mysqli_fetch_all($data3,MYSQLI_ASSOC);
$data4 = mysqli_query($conn, "SELECT * FROM student ");
$output4 = mysqli_fetch_all($data4,MYSQLI_ASSOC);
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM admin where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$role=$output2['role'];
if(strcmp($role, "super admin")!== 0)
{
    echo "<script> alert('Error! Only Super Admin can access this page');window.location.href='login.php' </script>";
}

//Add new assign_students Form Submit
if(isset($_POST['add']))
  {  
     $sidarr =  $_POST['sid'];
     $iid =  $_POST['iid'];
    foreach($sidarr as $sid){
        $data5= mysqli_query($conn, "SELECT * FROM assign_students where sid='$sid' and iid='$iid'");
    $output5 = mysqli_fetch_assoc($data5);
    if($output5){
        echo "<script> alert('Sorry! Student is already assigned to this instructor. Try Another!');window.location.href='assign_students.php' </script>";
    }
    else{
    $insert = mysqli_query($conn,"INSERT INTO `assign_students`(`iid`, `sid`)
    VALUES('$iid','$sid')");
     if($insert){
        echo "<script> alert('assign_students is Added Successfully!');window.location.href='assign_students.php' </script>";
    } 
} 
}
}
 //Delete assign_students
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM assign_students WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('assign_students is Deleted Successfully!');window.location.href='assign_students.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800">Manage Assign Students</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
<button class='btn btn-success mr-2'  data-toggle="modal" data-target="#AddempModal"> Assign New Student</button> <br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Assign Students</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th>Instructor</th>
                        <th> Assign Student</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        
                        <td><?php $iid=$out['iid']; $sql1 = mysqli_query($conn, "SELECT * FROM instructor where id='$iid' ");
                        $result1 = mysqli_fetch_assoc($sql1); echo $result1['name'] ?></td>
                        <td><?php $sid=$out['sid']; $sql = mysqli_query($conn, "SELECT * FROM student where id='$sid' ");
                        $result = mysqli_fetch_assoc($sql); echo $result['name'] ?></td>
                        <td> 
                          
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
                    After Click on delete you cannot retrive back this assign_students.
                    Also relevent information assign_students from system will remove 
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
 <!-- Add assign_students Modal-->
 <div class="modal fade" id="AddempModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
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
                     
                             <label for="">Select Instructor:</label>
                         <select name="iid" id="" class="  form-control form-control-user">
                         <?php foreach($output3 as $out3){ ?>
                             <option value="<?php echo $out3['id']?> "><?php echo $out3['name']?> </option>
                         <?php } ?>
                            </select>  <br>
                            <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" height="100px" cellspacing="0">
               <tr class='bg-light '> <th>Student</th>
                 <th>Tick To Assign</th></tr>
                 <?php foreach($output4 as $out4){ ?>
                        <tr>
                            <td><?php echo $out4['name']?></td>
                            <td class="text-center"><input type="checkbox" style=" zoom: 1.5;" name="sid[]" value="<?php echo $out4['id']?>" id="" ></td>
                        </tr>  <?php } ?>
                </table>
                         </div>
                         </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="add" class="btn btn-success" value="Assign Now">
                    </form>
                </div>
            </div>
        </div>
    </div>
 
  <?php include "layout/footer.php"?>
    

</div>

</div>