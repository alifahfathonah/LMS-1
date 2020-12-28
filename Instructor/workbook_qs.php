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
$data2 = mysqli_query($conn, "SELECT * FROM instructor where email='$email'");
$output2 = mysqli_fetch_assoc($data2); $sid=$output2['id'];
$data4 = mysqli_query($conn, "SELECT * FROM workbook_submit where  chid='$chid'");
$output4 = mysqli_fetch_all($data4,MYSQLI_ASSOC); 

//Add new workbook_qs Form Submit
if(isset($_POST['submit']))
  {  $z=1;
      while($z<= mysqli_num_rows($data)){
          $gans='ans'.$z;
     $ans= $_POST[$gans];
     $z++;
      
    $insert = mysqli_query($conn,"INSERT INTO `workbook_submit`(`ans`, `wid`, `chid`, `sid`)
	VALUES('$ans','$wid','$chid','$sid')"); }
     if($insert){
        echo "<script> alert('Workbook  is Submited Successfully!');window.location.href='workbook_qs.php?wid=$wid&ch=$chid' </script>";
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
        <a class='btn btn-info mr-2' href='workbook_ch.php?wid=<?php echo $wid?>'>< Back to Chapters</a> <br><br>
      
<!-- DataTales Example -->
<div class="card shadow mb-4 <?php echo $df?>">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Submitted Workbooks </h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class='bg-light '>
                        <th> Student</th>
                        <th>View Submission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sid=0; foreach($output4 as $out4) {?>
                    <tr>
                        <td><?php   $sid=$out4['sid']; $data5 = mysqli_query($conn, "SELECT * FROM student where  id='$sid'");
                        $output5 = mysqli_fetch_assoc($data5); echo $output5['name'] ?></td>
                        <td> 
                         <a class="btn btn-info btn-circle" data-toggle="modal" data-target="#viewModal">
                                 <i class="fas fa-eye"></i>  </a></td>
                          </tr>
                                 
  
    
                   
                </tbody>
            </table>
        </div>
</div>
</div>
<!-- /.container-fluid end-->
             <!-- View  Modal-->
             <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-purpose" id="exampleModalLabel">Workbooks Submission of Student!</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center ">
                                        <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class='bg-light '>
                                                    <th> Answers</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  foreach($output4 as $out4) {?>
                                               
                                                    <?php  $ans=explode(" ,",$out4['ans']);$i=1; foreach($ans as $an){ ?>
                                                        <tr>  <td><b>Ans<?php echo $i++?>:</b>   <?php echo $an?></td> </tr>
                                                    <?php }?>
                                                   
                                         <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?php echo $out['id']?>">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <?php }?>
<?php include "layout/footer.php"?>

</div>
<script>

function Getmodal(did) {
    document.getElementById("did").value=did ;
}

</script>

</div>