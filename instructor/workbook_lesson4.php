     <!-- //Main Heading LESSON 1.1--> <br>
     <div class="lesson1-1 <?php echo $dlesson1?>" style="color:black">
     <img src="../img/h1.png" class="hd-img" alt="">
              <h1 class="title ">Saying "No" Assertively</h1>
              <!-- Scenarios Lesson -->
              <div class="real p-5 ml-5 "> <br><br>
              <h4><b>Directions: </b></h4>
              <h5><b>Find a partner. Look at the situations below. Take turns making requests and refusing your partner’s offer. Do three requests and three refusals each. 
              Then answer the questions at the bottom of the page with your partner. Look at the Presentation Pages/PowerPoint for examples to help you.</b></h5>
              </div> <br>
              <img src="../img/4.1.png" class=" pl-5" alt="">
              <img src="../img/4.1img.png" class=" pl-5" alt="">
              <img src="../img/h1.png" class="hd-img " style="margin-top:20px !important" alt="">
              <h1 class="title ">Questions</h1>
              <div class="scenario pt-5 ml-5 text-dark">
                <div class="qs px-5">
                <form action="" method="post">
               <img src="../img/q1.png" alt="">    <span> <b>	Which ways of refusing worked the best? Why? </b></span>
                <textarea class="txtarea ml-5" readonly name="rq1" id="" cols="100" rows="3"><?php echo $result['q1']?></textarea>
              </div>
              </div>
              <div class="scenario pt-4 ml-5 text-dark">
                <div class="qs px-5">
               <img src="../img/q2.png" alt="">    <span> <b>	Which ways of refusing didn’t work as well? Why? </b></span>
                <textarea class="txtarea ml-5" readonly name="rq2" id="" cols="100" rows="3"><?php echo $result['q2']?></textarea>
              </div>
              </div>
              <div class="scenario pt-4 ml-5 text-dark">
                <div class="qs px-5">
               <img src="../img/q3.png" alt="">    <span> <b>Which way of saying “no” did you feel the most comfortable with? Why? </b></span>
                <textarea class="txtarea ml-5" readonly name="rq3" id="" cols="100" rows="3"><?php echo $result['q3']?></textarea>
              </div>
              </div>
              <div class="scenario pt-4 ml-5 text-dark">
                <div class="qs px-5">
               <img src="../img/q4.png" alt="">    <span> <b>	Did your partner’s verbal and nonverbal cues match? </b></span>
                <textarea class="txtarea ml-5" readonly name="rq4" id="" cols="100" rows="3"><?php echo $result['q4']?></textarea>
              </div>
              </div>
              <div class="scenario pt-4 ml-5 text-dark">
                <div class="qs px-5">
               <img src="../img/q5.png" alt="">    <span> <b>	Was your partner assertive in refusing? Was he/she passive or aggressive?</b></span>
                <textarea class="txtarea ml-5" readonly name="rq5" id="" cols="100" rows="3"><?php echo $result['q5']?></textarea>
              </div>
              </div>
              <div class="scenario pt-4 ml-5 text-dark">
                <div class="qs px-5">
               <img src="../img/q6.png" alt="">    <span> <b>	Did your partner say “no” in a way that was clear without humiliating you?</b></span>
                <textarea class="txtarea ml-5" readonly name="rq6" id="" cols="100" rows="3"><?php echo $result['q6']?></textarea>
              </div>
              </div>

            
    </div>
       <!-- //Main Heading LESSON 4.2--> 
     <div class="bg" style='background-image:url(../img/bg2.jpg); background-size:cover; '>
        <div class="lesson4-2 <?php echo $dlesson2?>" style='background-color:rgba(0,0,0,0.7)'>
              <!-- Scenarios Lesson 4.2 --> <br>
              <img src="../img/h1.png" class="hd-img" alt="">
              <h1 class="title ">Observing "No" </h1>
              <div class="real p-5 ml-5 text-white"> <br><br>
              <h4><b>Directions: </b></h4>
              <h5><b>During the week, pay attention whenever you hear someone refuse something. Fill out the chart below to record your observations </b></h5>
              </div> <br>
              <div class="r  px-5  " style="display:flex; color:black">
     
                <div class="clm1" style="flex:1"> <br>  <br> 
                <img src="../img/title5.png" class='mt-5'alt="">
                <h1 class='title2 ml-4'style='margin-top:-39px;'>Person </h1>  <br> 
                <img src="../img/title.png" class='mt-5'alt="">
                <h1 class='title2 ml-4'style='margin-top:-39px;'>Situation </h1>
                <br> 
                <img src="../img/title3.png" class='mt-5 ' style='height:70px; width:170px'alt="">
                <h4 class='title2 ml-4'style='margin-top:-59px; font-size:23px'><b>How They <br> Said "No" </b> </h4>
                <br> 
                <img src="../img/title4.png" class='mt-5'alt="" style='height:70px; width:170px'>
                <h1 class='title2 ml-4'style='margin-top:-59px; font-size:23px'><b> Style of <br> their response </b></h1>
                </div>
                <div class="clm2" style="flex:1">
                <img src="../img/q1.png" class='ml-5 pl-3' alt="">
                <input type="text" readonly name="bq1" value='<?php echo $result['q1']?>' class='txtarea mt-4' size="20">
                <textarea readonly name="bq2"  class='txtarea mt-4'id="" cols="21" rows="5"><?php echo $result['q2']?></textarea>
                <textarea readonly name="bq3"  class='txtarea mt-4'id="" cols="21" rows="5"><?php echo $result['q3']?></textarea> <br> <br> 

               <span class='text-white mt-5'> <input type="radio" readonly name='bq4' <?php if($result['q4']=='Assertive'){ echo "checked";}?>> Assertive <br>
                <input type="radio" readonly name='bq4'<?php if($result['q4']=='Passive'){ echo "checked";}?>> Passive <br>
                <input type="radio" readonly name='bq4' <?php if($result['q4']=='Aggressive'){ echo "checked";}?>>Aggressive </span>
                </div>
                <div class="clm3" style="flex:1">
                <img src="../img/q2.png" class='ml-5 pl-3' alt="">
                <input type="text" readonly name="bq5"  value='<?php echo $result['q5']?>' class='txtarea mt-4' size="20">
                <textarea readonly name="bq6" class='txtarea mt-4'id="" cols="21" rows="5"><?php echo $result['q6']?></textarea>
                <textarea readonly name="bq7" class='txtarea mt-4'id="" cols="21" rows="5"><?php echo $result['q7']?></textarea>
                <br> <br> 

               <span class='text-white mt-5'> <input type="radio" readonly name='bq8' <?php if($result['q8']=='Assertive'){ echo "checked";}?> > Assertive <br>
                <input type="radio" readonly name='bq8' <?php if($result['q8']=='Passive'){ echo "checked";}?>  > Passive <br>
                <input type="radio" readonly name='bq8' <?php if($result['q8']=='Aggressive'){ echo "checked";}?> > Aggressive </span>
                </div>
                <div class="clm3" style="flex:1">
                <img src="../img/q3.png"  class='ml-5 pl-3'alt="">
                <input type="text" readonly name="bq9" value='<?php echo $result['q9']?>' class='txtarea mt-4' size="20">
                <textarea readonly name="bq10" class='txtarea mt-4'id="" cols="21" rows="5"><?php echo $result['q10']?></textarea>
                <textarea readonly name="bq11" class='txtarea mt-4'id="" cols="21" rows="5"><?php echo $result['q11']?></textarea>
                <br> <br> 

               <span class='text-white mt-5'> <input type="radio" readonly name='bq12' <?php if($result['q12']=='Assertive'){ echo "checked";}?> > Assertive <br>
                <input type="radio" readonly name='bq12'<?php if($result['q12']=='Passive'){ echo "checked";}?> > Passive <br>
                <input type="radio" readonly name='bq12' <?php if($result['q12']=='Aggressive'){ echo "checked";}?> > Aggressive </span>
                </div>
                <div class="clm3" style="flex:1">
                <img src="../img/q4.png"class='ml-5 pl-3' alt="">
                <input type="text" readonly name="bq13" value='<?php echo $result['q13']?>'  class='txtarea mt-4' size="20">
                <textarea readonly name="bq14" class='txtarea mt-4'id="" cols="21" rows="5"><?php echo $result['q14']?></textarea>
                <textarea readonly name="bq15" class='txtarea mt-4'id="" cols="21" rows="5"><?php echo $result['q15']?></textarea>
                <br> <br> 

               <span class='text-white mt-5'> <input type="radio" readonly name='bq16'<?php if($result['q16']=='Assertive'){ echo "checked";}?>> Assertive <br>
                <input type="radio" readonly name='bq16' <?php if($result['q16']=='Passive'){ echo "checked";}?> > Passive <br>
                <input type="radio" readonly name='bq16'<?php if($result['q16']=='Aggressive'){ echo "checked";}?>> Aggressive </span> 
                </div>
              </div>
            <br> <br>
           
             
    </div>
    </div>
   
       
   