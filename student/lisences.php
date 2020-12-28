<?php session_start();
include "../db.php";
include "layout/header.php";
$sql = mysqli_query($conn, "SELECT * FROM student ");
$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
$sql2 = mysqli_query($conn, "SELECT * FROM instructor ");
$result2 = mysqli_fetch_all($sql2,MYSQLI_ASSOC);
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM student where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$sid=$output2['id'];
if(!$output2)
{
    echo "<script> alert('Sorry! You need to login first');window.location.href='login.php' </script>";
}

$data = mysqli_query($conn, "SELECT * FROM lisence where sid='$sid'");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);

 //Delete lisence
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM lisence WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('lisence is Deleted Successfully!');window.location.href='lisences.php' </script>";
        }
 }
 //UPDATE lisence
 if(isset($_POST['up']))
 { $id =  $_POST['id'];
    $lkey =  $_POST['lkey'];
    $exp_date =  $_POST['exp_date'];
    $status = $_POST['status'];
    $sid= $_POST['sid'];
    $sid= $_POST['sid'];
    $sql = "UPDATE `lisence` SET `lkey`='$lkey',`exp_date`='$exp_date' ,`status`='$status' ,`sid`='$sid',`sid`='$sid'   WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('lisence Details is Updated Successfully!');window.location.href='lisences.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800">Manage lisences</h1>
<p class="mb-4">Here is All the lisences that are assigned by the admin to instructor or students. You can  Assign Lisence to<a 
        href="students.php"> Students</a>. Or assign a lisence to <a   href="students.php">instructor </a></p>
           <!-- Buy New Lisence - User Information -->
    <!-- <li class="nav-item dropdown no-arrow">
        <a class="btn btn-success mr-2 text-white" href="#" id="validDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline ">Buy New Lisence</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="validDropdown">
            <a class="dropdown-item" href="../stripe_payment_getway_php/index.php?valid=30">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Validity 30 days-$5
            </a> <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../stripe_payment_getway_php/index.php?valid=60">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                 60 days-$8
            </a>
           
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../stripe_payment_getway_php/index.php?valid=90" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                90 days-$10
            </a>
        
        <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../stripe_payment_getway_php/index.php?valid=infinite" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Lifetime-$15
            </a>
        </div>
    </li> -->
<!-- <a class='btn btn-success mr-2'  href="../stripe_payment_getway_php/index.php">Buy New Lisence</a> <br><br> -->
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage lisences</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th>Lisence Key</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                            
                        <td><?php echo $out['lkey']?></td>
                        <td><?php echo $out['exp_date']?></td>
                        <td><?php echo $out['status']?></td>
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
                    After Click on delete you cannot retrive back this lisence.
                    Also relevent information lisence from system will remove 
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


    
<?php include "layout/footer.php"?>

</div>
<script>
   
function makekey() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 8; i++){
    text += possible.charAt(Math.floor(Math.random() * possible.length));}
    document.getElementById("lkey").value=text ;
 
}

function GetEModal(id,lkey,exp_date,status,sid,sid) {
    document.getElementById("id").value=id ;
    document.getElementById("lkey").value =lkey;
    document.getElementById("exp_date").value =exp_date;
    document.getElementById("status").value =status;
    if(sid){
     document.getElementById("sid").classList.add("d-none")
     document.getElementById("sid").value =sid;
    
    }
    else{
        document.getElementById("sid").classList.add("d-none")
     document.getElementById("sid").value =sid;
    }
}

</script>

</div>