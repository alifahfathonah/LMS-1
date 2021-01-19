<?php session_start();
include "db.php";
include "layout/header.php";
$email=$_SESSION['email'];
$data = mysqli_query($conn, "SELECT * FROM student where email='$email'");
$output = mysqli_fetch_assoc($data);
if($output){ $sid=$output['id'];}

if($_GET['lesson']){
    $lesson=$_GET['lesson'];
    if($lesson==1.1){$dlesson1='';$dlesson2="d-none"; $dlesson3=" d-none";
        $title="Options & Choices";  $nlesson=1.2 ;$plesson=1.1; $includeless=1;}
        elseif($lesson==1.2){$dlesson1='d-none';$dlesson2="" ;$dlesson3="d-none ";
            $title="Keepin' it Real"; $nlesson=1.3 ;$plesson=1.1 ;$includeless=1;
        }
       elseif($lesson==1.3){$dlesson1='d-none';$dlesson2="d-none"; $dlesson3=" ";
          $title="Choices"; $nlesson=2.1 ;$plesson=1.2 ;$includeless=1;
      }
  elseif($lesson==2.1){$dlesson1='';$dlesson2="d-none"; $dlesson3=" d-none";
    $title="The Guessing Game"; $nlesson=2.2 ;$plesson=1.3;$includeless=2; }
    elseif($lesson==2.2){$dlesson1='d-none';$dlesson2=""; $dlesson3=" d-none";
      $title="Risks in Everyday Life"; $nlesson=3.1 ;$plesson=2.1; $includeless=2;}
    elseif($lesson==3.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";
      $title="Conflict Stories"; $nlesson=3.2 ;$plesson=2.2; $includeless=3;}
      elseif($lesson==3.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";
        $title='Practise with "I Statements"'; $nlesson=3.3 ;$plesson=3.1; $includeless=3;}
    elseif($lesson==3.3){$dlesson1='d-none';$dlesson2="d-none"; $dlesson3="";
      $title="Singing About Conflict"; $nlesson=4.1 ;$plesson=3.2; $includeless=3;}
   elseif($lesson==4.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";
        $title="Refuse"; $nlesson=4.2 ;$plesson=3.3; $includeless=4;}
     elseif($lesson==4.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";
      $title="Refuse"; $nlesson=5.1 ;$plesson=4.1; $includeless=4;}
      elseif($lesson==5.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";
        $title="Explain"; $nlesson=5.2 ;$plesson=4.2; $includeless=5;}
     elseif($lesson==5.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";
      $title="Explain"; $nlesson=6.1 ;$plesson=5.1; $includeless=5;}
      elseif($lesson==6.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";
        $title="Avoid Scenarios"; $nlesson=6.2 ;$plesson=5.2; $includeless=6;}
     elseif($lesson==6.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";
      $title="Practising Avoid"; $nlesson=7.1 ;$plesson=6.1; $includeless=6;}
      elseif($lesson==7.1){$dlesson1='';$dlesson2="d-none"; $dlesson3="d-none";
        $title="Leave Scenarios"; $nlesson=7.2 ;$plesson=6.2; $includeless=7;}
     elseif($lesson==7.2){$dlesson1='d-none';$dlesson2=""; $dlesson3="d-none";
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
            $title="Real Review Pt.1"; $nlesson=10.3 ;$plesson=10.1; $includeless=10;}
            elseif($lesson==10.3){$dlesson1='d-none';$dlesson2="d-none"; $dlesson3="";
              $title="Real Review Pt.2"; $nlesson=10.3 ;$plesson=10.2; $includeless=10;}
}
if(isset($_POST['submit'])){
       if($lesson==1.1){
      eho $s1=$_POST['s1']; echo $s2=$_POST['s2']; $s3=$_POST['s3']; $s4=$_POST['s4'];
//         $insert = mysqli_query($conn,"INSERT INTO `lesson1_1`(`s1`, `s2`,`s3`,`s4`,`sid`)
//         VALUES('$s1','$s2','$s3','$s4','$sid')");
//         if($insert){
//                echo" <script> alert('Successfully Submited');</script>";
//         }
       }
        elseif($lesson==1.2){ $rwordarr=$_POST['r1'];  $ewordarr=$_POST['r2']; $awordarr=$_POST['r3']; $lwordarr=$_POST['r4'];
              $rword = implode(" , ",$rwordarr);  $eword = implode(" , ",$ewordarr); $aword = implode(" , ",$awordarr);$lword = implode(" , ",$lwordarr);
              $q1=$_POST['q1'];  $q2=$_POST['q2'];  $q3=$_POST['q3'];  $q4=$_POST['q4'];$q5=$_POST['q5'];
              $insert = mysqli_query($conn,"INSERT INTO `lesson1_2`(`rword`, `eword`,`aword`,`lword`,`q1`,`q2`,`q3`,`q4`,`q5`,`sid`)
              VALUES('$rword','$eword','$aword','$lword','$q1','$q2','$q3','$q4','$q5','$sid')");
              if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
        }
        elseif($lesson==1.3){ $title=$_POST['title'];
              $q1=$_POST['mq1'];  $q2=$_POST['mq2'];  $q3=$_POST['mq3'];  $q4=$_POST['mq4'];$q5=$_POST['mq5'];
              $insert = mysqli_query($conn,"INSERT INTO `lesson1_3`(`title`,`mq1`,`mq2`,`mq3`,`mq4`,`mq5`,`sid`)
              VALUES('$title','$q1','$q2','$q3','$q4','$q5','$sid')");
              if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
        }
        elseif($lesson==2.1){ $q1=$_POST['sq1'];  $q2=$_POST['sq2'];  $q3=$_POST['sq3'];  $q4=$_POST['sq4'];$q5=$_POST['sq5'];$q6=$_POST['sq6'];
              $q7=$_POST['sq7'];$q8=$_POST['sq8'];$q9=$_POST['sq9']; $q10=$_POST['sq10'];$q11=$_POST['sq11'];$q12=$_POST['sq12'];
              $insert = mysqli_query($conn,"INSERT INTO `lesson2_1`(`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`,`q11`,`q12`,`sid`)
              VALUES('$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$sid')");
              if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
        }
        elseif($lesson==2.2){ $q1=$_POST['rq1'];  $q2=$_POST['rq2'];  $q3=$_POST['rq3'];  $q4=$_POST['rq4'];$q5=$_POST['rq5'];$q6=$_POST['rq6'];
              $insert = mysqli_query($conn,"INSERT INTO `lesson2_2`(`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`sid`)
              VALUES('$q1','$q2','$q3','$q4','$q5','$q6','$sid')");
              if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
        }
        elseif($lesson==3.1){ $q1=$_POST['rq1'];  $q2=$_POST['rq2'];  $q3=$_POST['rq3'];  $q4=$_POST['rq4'];$q5=$_POST['rq5'];
          $insert = mysqli_query($conn,"INSERT INTO `lesson3_1`(`q1`,`q2`,`q3`,`q4`,`q5`,`sid`)
          VALUES('$q1','$q2','$q3','$q4','$q5','$sid')");
          if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    } 
     elseif($lesson==3.2){ $pq1arr=$_POST['pq1'];  $ptq1arr=$_POST['ptq1'];$ptq2arr=$_POST['ptq2'];  $ptq3arr=$_POST['ptq3'];  $ptq4arr=$_POST['ptq4'];$ptq5arr=$_POST['ptq5'];$i1=$_POST['i1'];$i2=$_POST['i2'];$i3=$_POST['i3'];
      $pq1 = implode(" , ",$pq1arr); $q1 = implode(" , ",$ptq1arr); $q2 = implode(" , ",$ptq2arr);$q3 = implode(" , ",$ptq3arr);$q4 = implode(" , ",$ptq4arr);$q5 = implode(" , ",$ptq5arr);
      $insert = mysqli_query($conn,"INSERT INTO `lesson3_2`(`pq1`,`q1`,`q2`,`q3`,`q4`,`q5`,`i1`,`i2`,`i3`,`sid`)
      VALUES('$pq1','$q1','$q2','$q3','$q4','$q5','$i1','$i2','$i3','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
}     
    elseif($lesson==3.3){   $q1=$_POST['sq1'];$q2=$_POST['sq2'];$q3=$_POST['sq3'];$q4=$_POST['sq4'];$q5=$_POST['sq5'];
      $insert = mysqli_query($conn,"INSERT INTO `lesson3_3`(`q1`,`q2`,`q3`,`q4`,`q5`,`sid`)
      VALUES('$q1','$q2','$q3','$q4','$q5','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    }
    elseif($lesson==4.1){   $q1=$_POST['rq1'];$q2=$_POST['rq2'];$q3=$_POST['rq3'];$q4=$_POST['rq4'];$q5=$_POST['rq5'];$q6=$_POST['rq6'];
      $insert = mysqli_query($conn,"INSERT INTO `lesson4_1`(`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`sid`)
      VALUES('$q1','$q2','$q3','$q4','$q5','$q6','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    }
    elseif($lesson==4.2){   $q1=$_POST['bq1'];$q2=$_POST['bq2'];$q3=$_POST['bq3'];$q4=$_POST['bq4'];$q5=$_POST['bq5'];$q6=$_POST['bq6'];$q7=$_POST['bq7'];$q8=$_POST['bq8'];
      $q9=$_POST['bq9'];$q10=$_POST['bq10'];$q11=$_POST['bq11'];$q12=$_POST['bq12'];$q13=$_POST['bq13'];$q14=$_POST['bq14'];$q15=$_POST['bq15'];$q16=$_POST['bq16'];
      $insert = mysqli_query($conn,"INSERT INTO `lesson4_2`(`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`,`q11`,`q12`,`q13`,`q14`,`q15`,`q16`,`sid`)
      VALUES('$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    }
    elseif($lesson==5.1){   $q1a=$_POST['q1a'];$q1b=$_POST['q1b'];$q2a=$_POST['q2a'];$q2b=$_POST['q2b'];$q3a=$_POST['q3a'];$q3b=$_POST['q3b'];
      $insert = mysqli_query($conn,"INSERT INTO `lesson5_1`(`q1a`,`q1b`,`q2a`,`q2b`,`q3a`,`q3b`,`sid`)
      VALUES('$q1a','$q1b','$q2a','$q2b','$q3a','$q3b','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    }
    elseif($lesson==5.2){   $q1=$_POST['qs1'];$q2=$_POST['qs2'];$q3=$_POST['qs3'];$q4=$_POST['qs4'];$q5=$_POST['qs5'];
      $insert = mysqli_query($conn,"INSERT INTO `lesson5_2`(`q1`,`q2`,`q3`,`q4`,`q5`,`sid`)
      VALUES('$q1','$q2','$q3','$q4','$q5','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    }
    elseif($lesson==6.1){   $q1=$_POST['q1'];$q2=$_POST['q2'];$q3=$_POST['q3'];$qa=$_POST['qa'];$qb=$_POST['qb'];
      $insert = mysqli_query($conn,"INSERT INTO `lesson6_1`(`q1`,`q2`,`q3`,`qa`,`qb`,`sid`)
      VALUES('$q1','$q2','$q3','$qa','$qb','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    }
    elseif($lesson==6.2){  $q1arr=$_POST['qb1'];$q2arr=$_POST['qb2'];  $q3arr=$_POST['qb3'];  $q4arr=$_POST['qb4'];$q5arr=$_POST['qb5'];
      $q1 = implode(" , ",$q1arr); $q2 = implode(" , ",$q2arr);$q3 = implode(" , ",$q3arr);$q4 = implode(" , ",$q4arr);$q5 = implode(" , ",$q5arr);
      $insert = mysqli_query($conn,"INSERT INTO `lesson6_2`(`q1`,`q2`,`q3`,`q4`,`q5`,`sid`)
      VALUES('$q1','$q2','$q3','$q4','$q5','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
}       elseif($lesson==7.1){   $s1=$_POST['s1'];$s2=$_POST['s2'];
          $insert = mysqli_query($conn,"INSERT INTO `lesson7_1`(`s1`,`s2`,`sid`)
          VALUES('$s1','$s2','$sid')");
          if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
        }
        elseif($lesson==7.2){  $cb1arr=$_POST['cb1'];$cb2arr=$_POST['cb2'];  $cb3arr=$_POST['cb3'];  $cb4arr=$_POST['cb4'];$cb5arr=$_POST['cb5'];$cb6arr=$_POST['cb6'];$cb7arr=$_POST['cb7'];
          $cb8arr=$_POST['cb8'];$cb9arr=$_POST['cb9'];  $cb10arr=$_POST['cb10'];  $cb11arr=$_POST['cb11'];$cb12arr=$_POST['cb12'];$cb13arr=$_POST['cb13'];$cb14arr=$_POST['cb14']; $q1=$_POST['q1'];$q2=$_POST['q2'];$q3=$_POST['q3'];$q4=$_POST['q4']; 
          $cb1 = implode(" , ",$cb1arr); $cb2 = implode(" , ",$cb2arr);$cb3 = implode(" , ",$cb3arr);$cb4 = implode(" , ",$cb4arr);$cb5 = implode(" , ",$cb5arr);$cb6 = implode(" , ",$cb6arr);$cb7 = implode(" , ",$cb7arr);
          $cb8 = implode(" , ",$cb8arr); $cb9 = implode(" , ",$cb9arr);$cb10 = implode(" , ",$cb10arr);$cb11 = implode(" , ",$cb11arr);$cb12 = implode(" , ",$cb12arr);$cb13 = implode(" , ",$cb13arr);$cb14 = implode(" , ",$cb14arr);
          $insert = mysqli_query($conn,"INSERT INTO `lesson7_2`(`cb1`,`cb2`,`cb3`,`cb4`,`cb5`,`cb6`,`cb7`,`cb8`,`q1`,`q2`,`q3`,`q4`,`sid`)
          VALUES('$q1','$q2','$q3','$q4','$q5','$sid')");
          if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    }   
    elseif($lesson==8.1){ $q1=$_POST['q1'];$q2=$_POST['q2'];$q3=$_POST['q3'];$q4=$_POST['q4'];$q5=$_POST['q5'];$q6=$_POST['q6'];$q7=$_POST['q7'];$q8=$_POST['q8'];
      $q9=$_POST['q9'];$q10=$_POST['q10'];$q11=$_POST['q11'];$q12=$_POST['q12'];$q13=$_POST['q13'];$q14=$_POST['q14'];$q15=$_POST['q15'];
      $insert = mysqli_query($conn,"INSERT INTO `lesson8_1`(`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`,`q11`,`q12`,`q13`,`q14`,`q15`,`sid`)
       VALUES('$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
    }
    elseif($lesson==8.2){ 
      $n1arr=$_POST['n1'];$n2arr=$_POST['n2'];  $n3arr=$_POST['n3'];  $n4arr=$_POST['n4'];$n5arr=$_POST['n5'];$n6arr=$_POST['n6'];$n7arr=$_POST['n7']; $n8arr=$_POST['n8'];$n9arr=$_POST['n9'];  $n10arr=$_POST['n10']; 
      $n1 = implode(" , ",$n1arr); $n2 = implode(" , ",$n2arr);$n3 = implode(" , ",$n3arr);$n4 = implode(" , ",$n4arr);$n5 = implode(" , ",$n5arr);$n6 = implode(" , ",$n6arr);$n7 = implode(" , ",$n7arr);
      $n8 = implode(" , ",$n8arr); $n9 = implode(" , ",$n9arr);$n10 = implode(" , ",$n10arr);
      $insert = mysqli_query($conn,"INSERT INTO `lesson8_2`(`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`,`sid`)
      VALUES('$n1','$n2','$n3','$n4','$n5','$n6','$n7','$n8','$n9','$n10','$sid')");
      if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
}     elseif($lesson==8.3){ $o1=$_POST['o1'];$o2=$_POST['o2'];$o3=$_POST['o3'];$s1arr=$_POST['s1'];$s2arr=$_POST['s2'];$s3arr=$_POST['s3'];
         $s1 = implode(" , ",$s1arr); $s2 = implode(" , ",$s2arr);$s3 = implode(" , ",$s3arr);
        $insert = mysqli_query($conn,"INSERT INTO `lesson8_3`(`o1`,`o2`,`o3`,`s1`,`s2`,`s3`,`sid`)
        VALUES('$o1','$o2','$o3','$s1','$s2','$s3','$sid')");
        if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
}        elseif($lesson==8.4){   $q1=$_POST['xq1'];$q2=$_POST['xq2'];$q3=$_POST['xq3'];$q4=$_POST['xq4'];
          $insert = mysqli_query($conn,"INSERT INTO `lesson8_4`(`q1`,`q2`,`q3`,`q4`,`sid`)
          VALUES('$q1','$q2','$q3','$q4','$sid')");
          if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
            }
          elseif($lesson==9.1){   $q1=$_POST['q1'];$q2=$_POST['q2'];$q3=$_POST['q3'];$q4=$_POST['q4'];$q5=$_POST['q5'];
            $insert = mysqli_query($conn,"INSERT INTO `lesson9_1`(`q1`,`q2`,`q3`,`q4`,`q5`,`sid`)
            VALUES('$q1','$q2','$q3','$q4','$q5','$sid')");
            if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
              }
            elseif($lesson==9.2){   $q1=$_POST['nq1'];$q2=$_POST['nq2'];$q3=$_POST['nq3'];$q4=$_POST['nq4'];$q5=$_POST['nq5'];
              $insert = mysqli_query($conn,"INSERT INTO `lesson9_2`(`q1`,`q2`,`q3`,`q4`,`q5`,`sid`)
              VALUES('$q1','$q2','$q3','$q4','$q5','$sid')");
              if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
                }
                elseif($lesson==10.1){   $q1arr=$_POST['iq1'];$q2arr=$_POST['iq2'];$q3arr=$_POST['iq3'];$q4arr=$_POST['iq4'];
            $q1 = implode(" , ",$q1arr); $q2 = implode(" , ",$q2arr);$q3 = implode(" , ",$q3arr);$q4 = implode(" , ",$q4arr);
                  $insert = mysqli_query($conn,"INSERT INTO `lesson10_1`(`q1`,`q2`,`q3`,`q4`,`sid`)
                  VALUES('$q1','$q2','$q3','$q4','$sid')");
                  if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
                    }
          elseif($lesson==10.2){    $q1arr=$_POST['sq1'];  $q2arr=$_POST['sq2'];$q3arr=$_POST['sq3'];$q4arr=$_POST['sq4'];$q5=$_POST['sq5'];
            $q1 = implode(" , ",$q1arr); $q2 = implode(" , ",$q2arr);$q3 = implode(" , ",$q3arr);$q4 = implode(" , ",$q4arr);
            $insert = mysqli_query($conn,"INSERT INTO `lesson10_2`(`q1`,`q2`,`q3`,`q4`,`q5`,`sid`)
            VALUES('$q1','$q2','$q3','$q4','$q5','$sid')");
            if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
              }
          elseif($lesson==10.3){ $q1=$_POST['nq1'];$q2=$_POST['nq2'];$q3=$_POST['nq3'];$q4=$_POST['nq4'];$q5=$_POST['nq5'];$q6=$_POST['nq6'];$q7=$_POST['nq7'];$q8=$_POST['nq8'];
            $q9=$_POST['nq9'];$q10=$_POST['nq10'];$q11=$_POST['nq11'];$q12=$_POST['nq12'];
            $insert = mysqli_query($conn,"INSERT INTO `lesson10_3`(`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`q7`,`q8`,`q9`,`q10`,`q11`,`q12`,`sid`)
            VALUES('$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$sid')");
            if($insert){ echo" <script> alert('Successfully Submited');</script>"; }
              }

 }
 
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
              <a href="student/dashboard.php" class="btn btn-info d-block" style="position:absolute; margin-top:2rem;margin-left:300px">&lt; Back to Dashboard</a>
          <div class="header" style="position: fixed;">
            <!-- <div id="triangle-up"> <h2 style="margin-left:-60rem" class="text-white hd1 pt-2">Lesson 1.1</h2></div>
            <div class='float-right' id="triangle-down" style='top:0; position: absolute; z-index:-1'>
            <img src="img/workbook logo.png" class="" style='margin-left:60rem; width:190px' alt=""></div> -->
            <img src="img/head.png" alt="">
            <h2 class="hd1 " >Lesson <?php echo $lesson?></h2>
            <h2 class="h2 " style="margin-top: -50px;"><?php echo $title?></h2> <br>
            <div id="triangle-side" style="margin-top: -30px;z-index: 1;"> </div>
            
            <!-- Sidebar -->
        <div id="mySidebar" class="sidebar overflow-auto">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">× </a>
            <img src="img/new.PNG" alt=""> <br> <br>
            <h6 class="menu-hd">LESSON 1- Options & Choices</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=1.1" >1.1 Introduction</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=1.2" >1.2 Refusal Strategies</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=1.3" >1.3 Choices Reflection</a></h6>
           
            <h6 class="menu-hd">LESSON 2- Risks</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=2.1" >2.1 The Guessing Game</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=2.2" >2.2 Risks in Everyday life</a></h6>
            
            <h6 class="menu-hd">LESSON 3- Communication</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=3.1" >3.1 Conflict Stories</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=3.2" >3.2 Practice "I Statments"</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=3.3" >3.3 Singning About Conflicts</a></h6>
            <h6 class="menu-hd">LESSON 4- Refuse</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=4.1" >4.1 Saying "No" Assertively</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=4.2" >4.2 Observing "No"</a></h6>
            <h6 class="menu-hd">LESSON 5- Explain</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=5.1" >5.1 I Don't Like...</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=5.2" >5.2 My Explanation</a></h6>
            <h6 class="menu-hd">LESSON 6- Avoid</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=6.1" >6.1 I Avoid Scenarios</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=6.2" >6.2 Practise Avoid</a></h6>
            <h6 class="menu-hd">LESSON 7- Leave</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=7.1" >7.1 I Leave Scenarios</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=7.2" >7.2 REAL in Real Life</a></h6>
            <h6 class="menu-hd">LESSON 8- Norms</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=8.1" >8.1 Norms</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=8.2" >8.2 Norms Acrostic</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=8.3" >8.3 Personal Decision Making</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=8.4" >8.4 Complete The Sentences</a></h6>
            <h6 class="menu-hd">LESSON 9- Feelings</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=9.1" >9.1 Feelings Role Play</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=9.2" >9.2 "I Disagree"</a></h6>
            <h6 class="menu-hd">LESSON 10- Support Network</h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=10.1" >10.1 Eco Map</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=10.2" >10.2 REAL Review Pt.1</a></h6>
            <h6 class="menu-text pl-4"><a href="workbook_template.php?lesson=10.3" >10.3 REAL Review Pt.2</a></h6>

         
        </div>
  
            <div id="main">
                <button class="openbtn" onclick="openNav(); "> <i class="fas fa-bars w-100"></i></button>  
              </div>
            </div>
       <?php include "workbook_lesson$includeless.php"; ?>
       <div class="footer">
              <div class="footer-icons">
              <a href="workbook_template.php?lesson=<?php echo $nlesson?>">  <i class="fas fa-greater-than footericon"></i></a>
              <button type="submit"name='submit' class="footericon" style="background:transparent; padding:0px;border:none; margin-top:0px !important"> <i class="fas fa-save footericon"></i>  </button>
              <a href="" onclick="submit()" >  </a>
              <a href="workbook_template.php?lesson=<?php echo $plesson?>">   <i class="fas fa-less-than footericon"></i></a>
              </div>
                <img src="img/footer.png" style='position: absolute; z-index:-1'  alt="">
          </div>
          </form>
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
