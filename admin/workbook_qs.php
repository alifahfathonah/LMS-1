<?php session_start();
include "../db.php";
include "layout/header.php";
if($_GET['ch']){
     $chid=$_GET['ch'];
    $wid=$_GET['wid'];
}
$data = mysqli_query($conn, "SELECT * FROM workbook_qs where chid='$chid'");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$data1 = mysqli_query($conn, "SELECT * FROM  workbook_ch where id='$chid'");
$output1 = mysqli_fetch_assoc($data1);
$data3 = mysqli_query($conn, "SELECT * FROM  workbook where id='$wid'");
$output3 = mysqli_fetch_assoc($data3);
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM admin where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$role=$output2['role'];
if(strcmp($role, "super admin")!== 0)
{
    echo "<script> alert('Error! Only Super workbook_qs can access this page');window.location.href='login.php' </script>";
}

//Add new workbook_qs Form Submit
if(isset($_POST['add']))
  {  
     $qs =  $_POST['qs'];
     if($_POST['qs_type']==='sq'){     $options = ""; }
    else if($_POST['qs_type']==='mcq'){    $options = implode(" , ", $_POST['option']) ; }
    $insert = mysqli_query($conn,"INSERT INTO `workbook_qs`(`question`, `options`, `chid`)
	VALUES('$qs','$options','$chid')");
     if($insert){
        echo "<script> alert('Workbook Question is Added Successfully!');window.location.href='workbook_qs.php?wid=$wid&ch=$chid' </script>";
    }
}
 //Delete workbook_qs
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM workbook_qs WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('workbook_qs is Deleted Successfully!');window.location.href='workbooks.php' </script>";
        }
 }
 //UPDATE workbook_qs
 if(isset($_POST['up']))
 { $aid =  $_POST['aid'];
    $title =  $_POST['title'];
    $iid =  $_POST['iid'];
    $status= $_POST['status'];
    $sql = "UPDATE `workbook_qs` SET `title`='$title',`iid`='$iid'  ,`status`='$status'  WHERE id='$aid'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('workbook_qs Details is Updated Successfully!');window.location.href='workbooks.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800">Workbook: <?php echo $output3['title']?> (Chapter: <?php echo $output1['ch']?> ) </h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
        <a class='btn btn-info mr-2' href='workbook_ch.php?wid=<?php echo $wid?>'>< Back to Chapters</a> 
        <button class='btn btn-success mr-2'  data-toggle="modal" data-target="#AddempModal">Add New Question</button> <br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Workbook Chapter Questions</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Question</th>
                        <th>Options</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        <td><?php echo $out['question']?></td>
                        <td><?php echo $out['options']; ?></td>
                    <td>       <a href=""  class="btn btn-danger btn-circle"  onclick="Getdel('<?php echo $out['id']?>')" data-toggle="modal" data-target="#delModal">
                                        <i class="fas fa-trash"></i>
                          </a></td>
                  
    </tr><?php }?>
                   
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
                    After Click on delete you cannot retrive back this workbook_qs.
                    Also relevent information workbook_qs from system will remove 
                </div>
                <div class="modal-footer">
                    <form action="" method="post">
                        <input type="hidden" name="id"  id="did">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="del" class="btn btn-danger" value="Yes, Delete">
                    </form>
                </div>
            </div>
        </div>
    </div> 
 <!-- Add workbook_qs Modal-->
 <div class="modal fade" id="AddempModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-purpose" id="exampleModalLabel">Add New chapter</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                    <label for="">Select Question Type:</label>
                            <select name="qs_type" id="qs_type" class=" form-control form-control-user" onchange="GetQs()">
                            <option value="">Select Question Type </option>
                          <option value="sq">Short Question </option>
                          <option value="mcq">MCQ</option>
                            </select> 
                    <label for="">Write Question:</label>
                        <input type="text" name="qs"  class=" form-control form-control-user" placeholder="Write a Question" > <br>
                      <div class="options" id="options">
                      <label for=""> Option 1:</label>
                        <input type="text" name="option[]"  class=" form-control form-control-user" placeholder=" Write Option 1" >
                        <label for=""> Option 2:</label>
                        <input type="text" name="option[]" class=" form-control form-control-user" placeholder="Write Option 2" >
                        <label for=""> Option 3:</label>
                        <input type="text" name="option[]" class=" form-control form-control-user" placeholder="Write Option 3" > 
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
    
    
    
<?php include "layout/footer.php"?>

</div>
<script>
function GetQs(){
   qs_type=document.getElementById("qs_type").value ;
  
   if(qs_type==='sq'){
    document.getElementById("options").classList.add("d-none") ;
   }
   else if(qs_type==='mcq'){
    document.getElementById("options").classList.remove("d-none") ;
   }
}

function Getdel(did) {
    document.getElementById("did").value=did ;
}

</script>

</div>