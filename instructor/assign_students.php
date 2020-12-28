<?php session_start();
include "../db.php";
include "layout/header.php";
$data = mysqli_query($conn, "SELECT * FROM assign_group ");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM instructor where email='$email'");
$output2 = mysqli_fetch_assoc($data2); $iid=$output2['id'];
if(!$output2)
{
    echo "<script> alert('Error! You need to login first);window.location.href='login.php' </script>";
}
$data4 = mysqli_query($conn, "SELECT * FROM assign_students where iid='$iid' ");
$output4 = mysqli_fetch_all($data4,MYSQLI_ASSOC);


//Add new assign_group Form Submit
if(isset($_POST['add']))
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
        echo "<script> alert('assign_group is Added Successfully!');window.location.href='assign_students.php' </script>";
    } 
} 
}
}
 //Delete assign_group
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM assign_group WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('assign_group is Deleted Successfully!');window.location.href='assign_students.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800"> Assign Groups to Students</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
<button class='btn btn-primary mr-2'  data-toggle="modal" data-target="#AddempModal"> Assign New Group</button> <br><br>
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
                        <th>Group Name</th>
                        <th> Assign Student</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr><?php $gid=$out['gid']; $sql1 = mysqli_query($conn, "SELECT * FROM groups where id='$gid' and iid='$iid'");
                        $result1 = mysqli_fetch_assoc($sql1); 
                        if($result1) { ?>
                        <td> <?php echo $result1['name'] ?></td>
                        <td><?php $sid=$out['sid']; $sql = mysqli_query($conn, "SELECT * FROM student where id='$sid' ");
                        $result = mysqli_fetch_assoc($sql); echo  $result['name']?></td>
                        <td> 
                          <a href=""  class="btn btn-danger btn-circle" data-toggle="modal" data-target="#delModal">
                                        <i class="fas fa-trash"></i>
                          </a></td>
                          <?php }?>
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
                    After Click on delete you cannot retrive back this assign_group.
                    Also relevent information assign_group from system will remove 
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
 <!-- Add assign_group Modal-->
 <div class="modal fade" id="AddempModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Assign New Group to Students</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                     
                             <label for="">Select Group:</label>
                         <select name="gid" id="" class="  form-control form-control-user">
                         <?php foreach($output as $out){  $gid=$out['gid'];$sql4=mysqli_query($conn, "SELECT * FROM groups where id='$gid' and iid='$iid'");
                        $result4 = mysqli_fetch_assoc($sql4); 
                        if($result4) { ?>
                             <option value="<?php echo $result4['id']?> "><?php echo $result4['name']?> </option>
                        <?php } } ?>
                            </select>  <br>
                            <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" height="100px" cellspacing="0">
               <tr class='bg-light '> <th>Student</th>
                 <th>Tick To Assign</th></tr>
                 <?php foreach($output4 as $out4){ ?>
                        <tr>
                            <td><?php  $sid=$out4['sid']; $sql5=mysqli_query($conn, "SELECT * FROM student where id='$sid'");
                        $result5 = mysqli_fetch_assoc($sql5); echo $result5['name'] ?></td>
                            <td class="text-center"><input type="checkbox" style=" zoom: 1.5;" name="sid[]" value="<?php echo $result5['id']?>" id="" ></td>
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