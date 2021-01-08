
       <!-- //Main Heading LESSON 5.1--> <br>
   <div class=" lesson5-1 <?php echo $dlesson1?>" style='color:black; margin-top:6rem'>
              <!-- Scenarios Lesson 3.2 -->
              <div class="real px-5 ml-5 "> 
              <img src="../img/h1.png" class="hd-img"  alt="">
              <h1 class="title ">I Don't Like </h1><br>
              <h4><b>Directions: </b></h4>
              <h5><b>Answer the questions below by writing down what you do not like and why. 
              Then practice the Explain strategy by explaining to your partner the reasons why you do not like these things. </b></h5> 
              </div> 
   
              <div class="scenario " >
              <br> 
                <div class="qs px-5 ml-4">
               <br>
               <form action="" method="post">
                <img src="../img/q1.png" class='float-left p-2'alt=""> <span > <b>A food I don't like is: </b> </span> <input type="text" readonly name="q1a" value='<?php echo $result['q1a']?>' class='txtarea p-1' size="72" id=""><br>
                <span > <b>Why?</b> <textarea readonly name="q1b" class='txtarea' id="" cols="70" rows="5"><?php echo $result['q1b']?></textarea><br> <br>
                <img src="../img/q2.png" class='float-left p-2'alt=""> <span > <b>	An activity I don’t like to do is: </b> </span> <input type="text" readonly name="q2a"value='<?php echo $result['q2a']?>' class='txtarea p-1' size="35" id=""><br>
                <span > <b>Why?</b> </span> <textarea readonly name="q2b" class='txtarea' id="" cols="70" rows="5"><?php echo $result['q2b']?></textarea> <br> <br>
                <img src="../img/q3.png" class='float-left p-2'alt=""> <span > <b>Something I dislike that might hurt my future is: </b> </span> <input type="text"value='<?php echo $result['q3a']?>' readonly name="q3a" class='txtarea p-1' size="20" id=""><br>
                <span > <b>Why?</b> </span> <textarea readonly name="q3b" class='txtarea' id="" cols="70" rows="5"><?php echo $result['q3b']?></textarea> <br> <br>

              </div>
             
              </div>
            

    </div>
     <!-- //Main Heading LESSON 5.2--> <br>
        <div class="lesson3-3 <?php echo $dlesson2?>" style="color:black">
              <!-- Scenarios Lesson 5.2 -->
              <div class="real p-5 ml-5 "> <br><br>
              <h4><b>Directions: </b></h4>
              <h5><b>Think of a time when you got into trouble and you do not believe you deserved it. 
              The trouble could have been at home with parents, with your brother or sister, at school, or anywhere else. 
              Then answer the following questions based on this situation. 
              (Select a situation that you would feel comfortable sharing with your teacher or fellow classmates.) </b></h5>
              </div> 
              <div class="scenario px-5 ml-5 mt-4 ">
                <img src="../img/q1.png" class="p-3 qs-img float-left" alt=""> <br> <br>
                <div class="qs px-5 ">
                <h4> <b>	Briefly describe what happened. Why were you in trouble? </b></h4>
                <textarea class="txtarea" readonly name="qs1" id="" cols="100" rows="2"><?php echo $result['q1']?></textarea> <br><br>
              </div>
              </div>
              <div class="scenario px-5 ml-5 ">
                <img src="../img/q2.png" class="p-3 qs-img float-left" alt=""> <br> <br>
                <div class="qs px-5 ">
                <h4> <b>	What explanations did you give for your actions? </b></h4>
                <textarea class="txtarea" readonly name="qs2" id="" cols="100" rows="2"><?php echo $result['q2']?></textarea> <br><br>
              </div>
              </div>
              <div class="scenario px-5 ml-5 ">
                <img src="../img/q3.png" class="p-3 qs-img float-left" alt=""> <br> 
                <div class="qs px-5 ">
                <h4> <b>	Do you think the explanations you gave for your actions were believable to other people? Why or why not?</b></h4>
                <textarea class="txtarea" readonly name="qs3" id="" cols="100" rows="2"><?php echo $result['q3']?></textarea> <br><br>
              </div>
              </div>
              <div class="scenario px-5 ml-5">
                <img src="../img/q4.png" class="p-3 qs-img float-left" alt=""> <br> 
                <div class="qs px-5  ">
                <h4> <b>	Did you explain in a way that everyone could understand exactly what you meant?</b></h4>
                <textarea class="txtarea" readonly name="qs4" id="" cols="100" rows="2"><?php echo $result['q4']?></textarea> <br><br>
              </div>
              </div>
              <div class="scenario px-5 ml-5 ">
                <img src="../img/q5.png" class="p-3 qs-img float-left" alt=""> <br> 
                <div class="qs px-5 ">
                <h4> <b>	Is there anything you could do to make your explanation any clearer? If so, write out any changes now.</b></h4>
                <textarea class="txtarea" readonly name="qs5" id="" cols="100" rows="2"><?php echo $result['q5']?></textarea> <br><br><br><br>
              </div>
              </div>
            
    </div>
   