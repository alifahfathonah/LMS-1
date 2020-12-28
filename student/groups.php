<?php session_start();
include "../db.php";
include "layout/header.php";
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM student where email='$email'");
$output2 = mysqli_fetch_assoc($data2);
$sid=$output2['id'];
if(!$output2)
{
    echo "<script> alert('Error! You need to login first)');window.location.href='login.php' </script>";
}

$data3 = mysqli_query($conn, "SELECT * FROM assign_group WHERE sid='$sid'");
$output3 = mysqli_fetch_all($data3,MYSQLI_ASSOC);

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
<h1 class="h3 mb-2 text-gray-800">Assigned Groups</h1>
<p class="mb-4">Here is All the Group that have purchased lisence You can  Assign groups to<a 
        href="Groups.php"> Groups</a>. Or assign a groups to <a   href="Groups.php">Student </a></p>
        <br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Assigned Groups</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Group Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
              
                <tbody>
                    <?php foreach($output3 as $out3) {?>
                    <tr>
                        <td><?php $gid=$out3['gid']; $data4 = mysqli_query($conn, "SELECT * FROM groups where id='$gid'");
                            $output4 = mysqli_fetch_assoc($data4); echo $output4['name']?></td>
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