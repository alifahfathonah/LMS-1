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
$data2 = mysqli_query($conn, "SELECT * FROM student where email='$email'");
$output2 = mysqli_fetch_assoc($data2); $sid=$output2['id'];
$data4 = mysqli_query($conn, "SELECT * FROM workbook_submit where sid='$sid' and  chid='$chid'");
$output4 = mysqli_fetch_assoc($data4); 
if($output4){
    $dh='d-block';
    $df='d-none';
}
else{
    $df='d-block';
    $dh='d-none';
}
//Add new workbook_qs Form Submit
if(isset($_POST['submit']))
  {  $z=1;
      while($z<= mysqli_num_rows($data)){
          $gans='ans'.$z;
     $ansarr[]= $_POST[$gans];
     $z++;}
     $ans = implode(" , ", $ansarr) ;
    $insert = mysqli_query($conn,"INSERT INTO `workbook_submit`(`ans`, `wid`, `chid`, `sid`)
	VALUES('$ans','$wid','$chid','$sid')"); 
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
        <h1 class="text-success <?php echo $dh?>">Workbook is Already Submitted!</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4 <?php echo $df?>">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Solve Workbook Questions</h6>
    </div>
    <div class="card-body">
    <form action="" method="POST">
    <?php $i=1;$j=1; foreach($output as $out){ ?>
      <div class="Question mt-3"> <br>
      <h5>Q#<?php echo $i++?>: <?php echo $out['question']; ?></h5>
      <?php   $option = explode(" , ",$out['options']); 
       if($out['options']) { 
       foreach($option as $opt){?>
          <input type="radio" id="male" class='ml-5 m-2' required style=' width: 2%; height: 1em;' name="ans<?php echo $j?>" value="<?php echo $opt?>"><?php echo $opt?>
          <?php } } else{?>
          <textarea name="ans<?php echo $j?>"class='form-control m-3 w-75' id="" cols="30" rows="5" required></textarea>
      </div>
      <?php } $j++;}?>
    </div> <br>
    <input type="submit" class="btn btn-success btn-lg ml-5 w-25" name='submit' value="Submit"></form>
</div>
</div>
</div></div>
<!-- /.container-fluid end-->

    
    
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