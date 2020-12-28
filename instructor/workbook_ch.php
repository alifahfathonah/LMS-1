<?php session_start();
include "../db.php";
include "layout/header.php";
if($_GET['wid']){
    $wid=$_GET['wid'];
}
$data = mysqli_query($conn, "SELECT * FROM workbook_ch where wid='$wid'");
$output = mysqli_fetch_all($data,MYSQLI_ASSOC);
$data3 = mysqli_query($conn, "SELECT * FROM  workbook where id='$wid'");
$output3 = mysqli_fetch_assoc($data3);
$email=$_SESSION['email'];
$data2 = mysqli_query($conn, "SELECT * FROM instructor where email='$email'");
$output2 = mysqli_fetch_assoc($data2);

//Add new workbook_ch Form Submit
if(isset($_POST['add']))
  {  
     $ch =  $_POST['ch'];
    $insert = mysqli_query($conn,"INSERT INTO `workbook_ch`(`ch`, `wid`)
	VALUES('$ch','$wid')");
     if($insert){
        echo "<script> alert('workbook_ch is Added Successfully!');window.location.href='workbook_ch.php?wid=$wid' </script>";
    }
}
 //Delete workbook_ch
  if(isset($_POST['del']))
 {
    $id = $_POST['id'];
    $sql = "DELETE FROM workbook_ch WHERE id='$id'";
    $del=mysqli_query($conn, $sql);
        if($del){
            echo "<script> alert('workbook_ch is Deleted Successfully!');window.location.href='workbook_ch.php?wid=<?php echo $wid?>.php' </script>";
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
<h1 class="h3 mb-2 text-gray-800">Manage workbook chapters</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
 <a class='btn btn-info mr-2' href='workbooks.php'>< Back to Workbooks</a>  <br><br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Workbook Chepters</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Workbook</th>
                        <th>Chapter</th>
                        <th>View Submission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($output as $out) {?>
                    <tr>
                        <td><?php echo $output3['title']?></td>
                        <td>Ch# <?php echo $out['ch']; ?></td>
                        <td> 
                         <a class="btn btn-info btn-circle"  href='workbook_qs.php?wid=<?php echo $output3['id']?>&ch=<?php echo $out['id']?>'>
                                 <i class="fas fa-eye"></i>  </a></td>
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
         
 
    
<?php include "layout/footer.php"?>

</div>
<script>
   function Getdel(did) {
    document.getElementById("did").value=did ;
}

</script>

</div>