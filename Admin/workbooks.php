<?php session_start();
include "../db.php";
include "layout/header.php";
$data = mysqli_query($conn, "SELECT * FROM workbook ");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$data3 = mysqli_query($conn, "SELECT * FROM instructor ");
$output3 = mysqli_fetch_all($data3,MYSQLI_ASSOC);
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM admin where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$role=$output2['role'];
if(strcmp($role, "super admin")!== 0)
{
    echo "<script> alert('Error! Only Super workbook can access this page');window.location.href='login.php' </script>";
}

//Add new workbook Form Submit
if(isset($_POST['add']))
  {  
     $title =  $_POST['title'];
    $iid =  $_POST['iid'];
    $status= $_POST['status'];
    $insert = mysqli_query($conn,"INSERT INTO `workbook`(`title`, `iid`,`status`)
	VALUES('$title','$iid','$status')");
     if($insert){
        echo "<script> alert('workbook is Added Successfully!');window.location.href='workbooks.php' </script>";
    }
}
 //Delete workbook
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM workbook WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('workbook is Deleted Successfully!');window.location.href='workbooks.php' </script>";
        }
 }
 //UPDATE workbook
 if(isset($_POST['up']))
 { $aid =  $_POST['aid'];
    $title =  $_POST['title'];
    $iid =  $_POST['iid'];
    $status= $_POST['status'];
    $sql = "UPDATE `workbook` SET `title`='$title',`iid`='$iid'  ,`status`='$status'  WHERE id='$aid'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('workbook Details is Updated Successfully!');window.location.href='workbooks.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800">Manage workbooks</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
<button class='btn btn-success mr-2'  data-toggle="modal" data-target="#AddempModal">Add New workbook</button> <br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Owner workbooks</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Title</th>
                        <th>Instructor</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        <td><?php echo $out['title']?></td>
                        <td><?php $iid=$out['iid']; $nsql = mysqli_query($conn, "SELECT * FROM instructor where id='$iid' ");
                            $result = mysqli_fetch_assoc($nsql); echo $result['name']?></td>
                        <td><?php echo $out['status']?></td>
                        <td>  <a class="btn btn-info btn-circle"  href='workbook_ch.php?wid=<?php echo $out['id']?>'>
                                 <i class="fas fa-eye"></i>  </a> </td>
                        <td> 
                             <a class="btn btn-warning btn-circle"  onclick="GetEModal('<?php echo $out['id']?>','<?php echo $out['title']?>','<?php echo $out['iid']?>',
                            '<?php echo $out['status']?>')" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-edit"></i> </a> 
                          <a href=""  class="btn btn-danger btn-circle" onclick="Getdel('<?php echo $out['id']?>')" data-toggle="modal" data-target="#delModal">
                                        <i class="fas fa-trash"></i>
                          </a></td>
                          </tr>
                  <?php }?>
   
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid end-->
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
                    After Click on delete you cannot retrive back this workbook.
                    Also relevent information workbook from system will remove 
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <input type="hidden" name="id" id='did'>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="del" class="btn btn-danger" value="Yes, Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
 <!-- Add workbook Modal-->
 <div class="modal fade" id="AddempModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Add New workbook</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="text" name="title" class=" form-control form-control-user" placeholder="Enter workbook Title" required> <br>
                        <label for="">Select Instructor:</label>
                            <select name="iid" id="" class="  form-control form-control-user">
                            <?php foreach($output3 as $out3){?>
                          <option value="<?php echo $out3['id']?>"><?php echo $out3['name']?> </option>
                          <?php }?>
                            </select> 
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
     <!-- Update workbook  Modal-->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Update workbook Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                   <input type="hidden" name='aid' id='aid' >
                    <input type="text" name="title" id="title" class=" form-control form-control-user" placeholder="Enter workbook Title" required> <br>
                    <label for="">Select Instructor:</label>
                            <select name="iid" id="iid" class="  form-control form-control-user">
                            <?php foreach($output3 as $out3){?>
                          <option value="<?php echo $out3['id']?>"><?php echo $out3['name']?> </option>
                          <?php }?>
                            </select> 
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
    onclick


function GetEModal(aid,title,iid,status) {
    document.getElementById("aid").value=aid ;
    document.getElementById("title").value =title;
    document.getElementById("iid").value =iid;
    document.getElementById("status").value =status;
}
function Getdel(did) {
    document.getElementById("did").value=did ;
}

</script>

</div>