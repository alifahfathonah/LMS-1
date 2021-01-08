<?php session_start();
include "../db.php";
include "layout/header.php";
$email=$_SESSION['email'];
$data = mysqli_query($conn, "SELECT * FROM instructor where email='$email'");
if($_GET['sid']){
  $sid=$_GET['sid'];
}

if($_GET['lesson']){
    $lesson=$_GET['lesson'];
    if($lesson==1.1){$dlesson1='';$dlesson2="d-none"; $dlesson3=" d-none";
        $title="Options & Choices";  $nlesson=1.2;$plesson=1.1; $includeless=1;
        $sql = mysqli_query($conn, "SELECT * FROM lesson1_1 where sid='$sid'");
       }
        elseif($lesson==1.2){$dlesson1='d-none';$dlesson2="" ;$dlesson3="d-none ";$sql = mysqli_query($conn, "SELECT * FROM lesson1_2 where sid='$sid'");
            $title="Keepin' it Real"; $nlesson=1.3 ;$plesson=1.1 ;$includeless=1;
        }
       elseif($lesson==1.3){$dlesson1='d-none';$dlesson2="d-none"; $dlesson3=" "; $sql = mysqli_query($conn, "SELECT * FROM lesson1_3 where sid='$sid'");
          $title="Choices"; $nlesson=2.1 ;$plesson=1.2 ;$includeless=1;
      }
  elseif($lesson==2.1){$dlesson1='';$dlesson2="d-none"; $dlesson3=" d-none";$sql = mysqli_query($conn, "SELECT * FROM lesson2_1 where sid='$sid'");
    $title="The Guessing Game"; $nlesson=2.2 ;$plesson=1.3;$includeless=2; }
    elseif($lesson==2.2){$dlesson1='d-none';$dlesson2=""; $dlesson3=" d-none";$sql = mysqli_query($conn, "SELECT * FROM lesson2_2 where sid='$sid'");
      $title="Risks in Everyday Life"; $nlesson=3.1 ;$plesson=2.1; $includeless=2;}
    elseif($lesson==3.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";$sql = mysqli_query($conn, "SELECT * FROM lesson3_1 where sid='$sid'");
      $title="Conflict Stories"; $nlesson=3.2 ;$plesson=2.2; $includeless=3;}
      elseif($lesson==3.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";$sql = mysqli_query($conn, "SELECT * FROM lesson3_2 where sid='$sid'");
        $title='Practise with "I Statements"'; $nlesson=3.3 ;$plesson=3.1; $includeless=3;}
    elseif($lesson==3.3){$dlesson1='d-none';$dlesson2="d-none"; $dlesson3=""; $sql = mysqli_query($conn, "SELECT * FROM lesson3_3 where sid='$sid'");
      $title="Singing About Conflict"; $nlesson=4.1 ;$plesson=3.2; $includeless=3;}
   elseif($lesson==4.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none"; $sql = mysqli_query($conn, "SELECT * FROM lesson4_1 where sid='$sid'");
        $title="Refuse"; $nlesson=4.2 ;$plesson=3.3; $includeless=4;}
     elseif($lesson==4.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none"; $sql = mysqli_query($conn, "SELECT * FROM lesson4_2 where sid='$sid'");
      $title="Refuse"; $nlesson=5.1 ;$plesson=4.1; $includeless=4;}
      elseif($lesson==5.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none"; $sql = mysqli_query($conn, "SELECT * FROM lesson5_1 where sid='$sid'");
        $title="Explain"; $nlesson=5.2 ;$plesson=4.2; $includeless=5;}
     elseif($lesson==5.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none"; $sql = mysqli_query($conn, "SELECT * FROM lesson5_2 where sid='$sid'");
      $title="Explain"; $nlesson=6.1 ;$plesson=5.1; $includeless=5;}
      elseif($lesson==6.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none"; $sql = mysqli_query($conn, "SELECT * FROM lesson6_1 where sid='$sid'");
        $title="Avoid Scenarios"; $nlesson=6.2 ;$plesson=5.2; $includeless=6;}
     elseif($lesson==6.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none"; $sql = mysqli_query($conn, "SELECT * FROM lesson6_2 where sid='$sid'");
      $title="Practising Avoid"; $nlesson=7.1 ;$plesson=6.1; $includeless=6;}
      elseif($lesson==7.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";$sql = mysqli_query($conn, "SELECT * FROM lesson7_1 where sid='$sid'");
        $title="Leave Scenarios"; $nlesson=7.2 ;$plesson=6.2; $includeless=7;}
     elseif($lesson==7.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";$sql = mysqli_query($conn, "SELECT * FROM lesson7_2 where sid='$sid'");
      $title="Real in Real Life"; $nlesson=8.1 ;$plesson=7.1; $includeless=7;}
      elseif($lesson==8.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none"; $dlesson4="d-none"; 
        $title="Norms"; $nlesson=8.2 ;$plesson=7.2; $includeless=8;}
     elseif($lesson==8.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none"; $dlesson4="d-none";
      $title="Name Acrostic"; $nlesson=8.3 ;$plesson=8.1; $includeless=8;}
      elseif($lesson==8.3){$dlesson1='d-none';$dlesson2="d-none"; $dlesson3=" "; $dlesson4="d-none";
        $title="Personal Decision Making"; $nlesson=8.4 ;$plesson=8.2; $includeless=8;}
        elseif($lesson==8.4){$dlesson1='d-none';$dlesson2="d-none"; $dlesson3="d-none"; $dlesson4="";
          $title="Complete the Sentences"; $nlesson=9.1 ;$plesson=8.3; $includeless=8;}
          elseif($lesson==9.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";
              $title="Norms"; $nlesson=9.2 ;$plesson=8.4; $includeless=9;}
           elseif($lesson==9.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";
            $title="Name Acrostic"; $nlesson=10.1 ;$plesson=9.1; $includeless=9;}
            elseif($lesson==10.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";
              $title="Eco Map"; $nlesson=10.2 ;$plesson=9.2; $includeless=10;}
           elseif($lesson==10.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";
            $title="Real Review Pt.1&sid=<?php echo $sid?>"; $nlesson=10.3 ;$plesson=10.1; $includeless=10;}
            elseif($lesson==10.3){$dlesson1='d-none';$dlesson2="d-none"; $dlesson3="";
              $title="Real Review Pt.2&sid=<?php echo $sid?>"; $nlesson=10.3 ;$plesson=10.2; $includeless=10;}
}
$result = mysqli_fetch_assoc($sql);
 
?>
<style>

.sidebar {
  position: absolute; display: none;
height: 100%; 
width:270px !important;
z-index: 1;
margin:-120px 0px 0px 0rem;
left: 0; border: 3px solid  skyblue;
background-color: white;
overflow-x: hidden;
transition: 0.5s;
}

.sidebar .closebtn {
position: absolute;  color: black;
font-size: 36px;
margin: -10px 0px 0px 200px;
}
.openbtn {
font-size: 30px;
cursor: pointer;
background-color: transparent;
color: white;
padding: 10px 15px;
border: none;
}
#main {
position: absolute; margin: -120px 0px 0px 50px;
}
  #triangle-side {
    width:0px; position: absolute;
    height: 0px;
    border-bottom: 70rem solid transparent;
    border-left: 2.5rem solid #9EC1E6;
  }
.hd-img{
  margin-left: auto;
margin-right: auto; width: 50%;display: block;
margin-top:8rem !important;
}
  .h2{color:goldenrod;    font-family: cursive; font-style: italic;
  font-weight: 600;text-align: center; font-size: 36px;}
  .hd1{font-family:auto; top:10px;position: absolute;color: white; margin-left:20rem;}
  .title{font-family:auto; color: #3f3f3f; margin-top:-70px; text-align: center; }
  .title2{font-family:auto; color: black; margin-top:-60px; font-size:30px; margin-left:3.6rem}
  .txtarea{border-radius: 8px;} .qs{color:black; }
  .menu-hd{ background-color: #9E6ED6; color:white; font-weight: bold;padding:8px}
  .menu-text{  color:black ; font-weight: 800 !important;padding:5px; border-bottom: 1px solid gray;
  font-size: 16px;}
  .menu-text a{text-decoration: none; color: black;}
  .footericon{
    font-size: 50px; color: white; 
     padding: 20px; margin-top:20px ; cursor:pointer;
    float: right;
  }
  .rboxs{
      padding:5px 0px; border-radius:10px; font-size:18px;  ;
  }
  .boxes{ margin-top:-65px;padding-bottom:30px; margin-left:100px}
  .qno, .qno2, .qno3, .qno4{
  background-color:#294AA3; color:white; font-weight:bolder; font-size:26px; text-align:center;
}
.qno2{ background-color:#F69523;  }
.qno3{ background-color:#458FCC; }   .qno4{ background-color:#7BC142; }
 td{ background-color:white; border:1px solid gray; 
   padding:10px; font-size:18px;color:black; font-weight:bold; 
 }
 select{
  overflow:auto; border:none;padding-top:21px;margin-bottom:-10px;height:68px;
}
option{display:block; border:1px solid gray; display:inline;font-size:18px;padding:20px 10px;font-weight:bold}
span{font-size:25px; }
input[type=radio] {
  border: 0px;
  width:1.5rem;
  height: 1.5em;
}
input[type=checkbox]
{
width:40px; height:40px; margin:0px 0px 5px 80px;}
.namin{ position:absolute; }
    </style>
<body class="bg-light">
    <div class="container  bg-white " >
        <!-- WorkBook Section -->
        <section>
          <div class="header" style="position: fixed;">
            <!-- <div id="triangle-up"> <h2 style="margin-left:-60rem" class="text-white hd1 pt-2&sid=">Lesson 1.1</h2></div>
            <div class='float-right' id="triangle-down" style='top:0; position: absolute; z-index:-1'>
            <img src="../img/workbook logo.png" class="" style='margin-left:60rem; width:190px' alt=""></div> -->
            <img src="../img/head.png" alt="">
            <h2 class="hd1 " >Lesson <?php echo $lesson?></h2>
            <h2 class="h2 " style="margin-top: -50px;"><?php echo $title?></h2> <br>
            <div id="triangle-side" style="margin-top: -30px;z-index: 1;"> </div>
            <!-- Sidebar -->
        <div id="mySidebar" class="sidebar overflow-auto">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">× </a>
            <img src="../img/new.PNG" alt=""> <br> <br>
            <h6 class="menu-hd">LESSON 1- Options & Choices</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=1.1&sid=<?php echo $sid?>" >1.1 Introduction</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=1.2&sid=<?php echo $sid?>" >1.2 Refusal Strategies</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=1.3" >1.3 Choices Reflection</a></h6>
           
            <h6 class="menu-hd">LESSON 2- Risks</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=2.1&sid=<?php echo $sid?>" >2.1 The Guessing Game</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=2.2&sid=<?php echo $sid?>" >2.2 Risks in Everyday life</a></h6>
            
            <h6 class="menu-hd">LESSON 3- Communication</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=3.1&sid=<?php echo $sid?>" >3.1 Conflict Stories</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=3.2&sid=<?php echo $sid?>" >3.2 Practice "I Statments"</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=3.3" >3.3 Singning About Conflicts</a></h6>
            <h6 class="menu-hd">LESSON 4- Refuse</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=4.1&sid=<?php echo $sid?>" >4.1 Saying "No" Assertively</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=4.2&sid=<?php echo $sid?>" >4.2 Observing "No"</a></h6>
            <h6 class="menu-hd">LESSON 5- Explain</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=5.1&sid=<?php echo $sid?>" >5.1 I Don't Like...</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=5.2&sid=<?php echo $sid?>" >5.2 My Explanation</a></h6>
            <h6 class="menu-hd">LESSON 6- Avoid</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=6.1&sid=<?php echo $sid?>" >6.1 I Avoid Scenarios</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=6.2&sid=<?php echo $sid?>" >6.2 Practise Avoid</a></h6>
            <h6 class="menu-hd">LESSON 7- Leave</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=7.1&sid=<?php echo $sid?>" >7.1 I Leave Scenarios</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=7.2&sid=<?php echo $sid?>" >7.2 REAL in Real Life</a></h6>
            <h6 class="menu-hd">LESSON 8- Norms</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=8.1&sid=<?php echo $sid?>" >8.1 Norms</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=8.2&sid=<?php echo $sid?>" >8.2 Norms Acrostic</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=8.3" >8.3 Personal Decision Making</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=8.4" >8.4 Complete The Sentences</a></h6>
            <h6 class="menu-hd">LESSON 9- Feelings</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=9.1&sid=<?php echo $sid?>" >9.1 Feelings Role Play</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=9.2&sid=<?php echo $sid?>" >9.2 "I Disagree"</a></h6>
            <h6 class="menu-hd">LESSON 10- Support Network</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=10.1&sid=<?php echo $sid?>" >10.1 Eco Map</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=10.2&sid=<?php echo $sid?>" >10.2 REAL Review Pt.1</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=10.3" >10.3 REAL Review Pt.2</a></h6>

         
        </div>
  
            <div id="main">
                <button class="openbtn" onclick="openNav(); "> <i class="fas fa-bars w-100"></i></button>  
              </div>
            </div>
       <?php include "workbook_lesson$includeless.php"; ?>
       <div class="footer">
              <div class="footer-icons">
              <a href="workbook_template.php?lesson=<?php echo $nlesson."&sid=".$sid?>">  <i class="fas fa-greater-than footericon"></i></a>
              <button  class="footericon" style="background:transparent; padding:0px;border:none; margin-top:0px !important"> <i class="fas fa-save footericon"></i>  </button>
             
              <a href="workbook_template.php?lesson=<?php echo $plesson."&sid=".$sid?>">   <i class="fas fa-less-than footericon"></i></a>
              </div>
                <img src="../img/footer.png" style='position: absolute; z-index:-1'  alt="">
          </div>
        </section>
     

    </div>
  <script>
   
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("mySidebar").style.display = "block";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("mySidebar").style.display = "none";
}
</script>
    
                    <!-- End of Footer -->
            <!-- Bootstrap core JavaScript-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
            <!-- Core plugin JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        
            <!-- Custom scripts for all pages-->
            <script src="../js/sb-admin-2.min.js"></script>
        
            <!-- Charts plugins -->
            <script src="../vendor/chart.js/Chart.min.js"></script>
            <!-- Charts custom scripts -->
            <script src="../js/demo/chart-area-demo.js"></script>
            <script src="../js/demo/chart-pie-demo.js"></script>
        
               <!-- Data Tables plugins -->
               <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
            <!-- Data Tables custom scripts -->
            <script src="../js/demo/datatables-demo.js"></script>
        
        </body>
        
        </html>