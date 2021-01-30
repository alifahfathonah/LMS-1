<?php session_start();
include "../db.php";
include "layout/header.php";
$data = mysqli_query($conn, "SELECT * FROM lisence ");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$sql = mysqli_query($conn, "SELECT * FROM student ");
$result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
$sql2 = mysqli_query($conn, "SELECT * FROM instructor ");
$result2 = mysqli_fetch_all($sql2,MYSQLI_ASSOC);
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM admin where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$role=$output2['role'];
if(strcmp($role, "super admin")!== 0)
{
    echo "<script> alert('Error! Only Super Admin can access this page');window.location.href='login.php' </script>";
}

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
    $iid= $_POST['iid'];
    $sql = "UPDATE `lisence` SET `lkey`='$lkey',`exp_date`='$exp_date' ,`status`='$status' ,`sid`='$sid',`iid`='$iid'   WHERE id='$id'";
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
<h1 class="h3 mb-2 text-gray-800">Manage Licenses</h1>
<p class="mb-4">Here is All the lisences that are assigned by the admin to instructor or students. You can  Assign License to<a 
        href="students.php"> Students</a>. Or assign a License to <a   href="students.php">instructor </a></p>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage Licenses</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> User Name</th>
                        <th>User Type</th>
                        <th>License Key</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        <?php if($out['sid']){?>
                        <td><?php $sid=$out['sid']; $data3 = mysqli_query($conn, "SELECT * FROM student where id='$sid'");
                            $output3 = mysqli_fetch_assoc($data3); echo $output3['name']?></td>
                        <td>Student</td>
                        <?php }
                        else { ?> <td><?php $iid=$out['iid']; $data4 = mysqli_query($conn, "SELECT * FROM instructor where id='$iid'");
                            $output4 = mysqli_fetch_assoc($data4); echo $output4['name']?></td>
                         <td>Instructor</td> <?php } ?>
                       
                            
                        <td><?php echo $out['lkey']?></td>
                        <td><?php echo $out['exp_date']?></td>
                        <td><?php echo $out['status']?></td>
                        <td>  <a class="btn btn-warning btn-circle"  onclick="GetEModal('<?php echo $out['id']?>','<?php echo $out['lkey']?>','<?php echo $out['exp_date']?>'
                             ,'<?php echo $out['status']?>','<?php echo $out['sid']?>','<?php echo $out['iid']?>')" data-toggle="modal" data-target="#editModal">
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
                    After Click on delete you cannot retrive back this License.
                    Also relevent information license from system will remove 
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

     <!-- Update Licenses  Modal-->
 <div class="modal fade" id="editModal" tabindex="-1" address="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" address="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Update Licens Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                    <input type="hidden" name="id" id='id'  >
                    <label for="">Select User:</label>
                         <select name="sid" id="sid" class="  form-control form-control-user">
                             <?php foreach($result as $res){?>
                          <option value="<?php echo $res['id'] ?>"><?php echo $res['name'] ?></option>
                          <?php }?>
                            </select>  
                            <select name="iid" id="iid" class=" form-control form-control-user ">
                             <?php foreach($result2 as $res2){?>
                          <option value="<?php echo $res2['id'] ?>"><?php echo $res2['name'] ?></option>
                          <?php }?>
                            </select>  <br>
                        <div class="row">
                            <div class="col-md-6">
                             <label for="">License Key</label>
                            <input type="text" class=' form-control ' name="lkey" id="lkey" readonly> <br>
                            <button class="btn btn-info" type="button" onclick="makekey()">Generate New Key</button>
                            </div>
                            <div class="col-md-6">
                            <label for="">Expiry Date:</label> 
                           <input type="date" name="exp_date" id="exp_date" class=' form-control' required>
                           
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
function makekey() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 8; i++){
    text += possible.charAt(Math.floor(Math.random() * possible.length));}
    document.getElementById("lkey").value=text ;
 
}

function GetEModal(id,lkey,exp_date,status,sid,iid) {
    document.getElementById("id").value=id ;
    document.getElementById("lkey").value =lkey;
    document.getElementById("exp_date").value =exp_date;
    document.getElementById("status").value =status;
    if(sid){
     document.getElementById("iid").classList.add("d-none")
     document.getElementById("sid").value =sid;
    
    }
    else{
        document.getElementById("sid").classList.add("d-none")
        document.getElementById("iid").value =iid;
    }
}
</script>
</div>