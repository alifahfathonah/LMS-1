     <!-- //Main Heading LESSON 2.1--> <br>
     <div class="lesson2-1 <?php echo $dlesson1?>" style=' background-image: linear-gradient(#AFB1CA, whitesmoke);'>
                    <br><br><br>
                    <form action="" method="post">
              <h5 class="ml-5 pl-5 " style="margin-top:6rem !important;color:black"><b> Select the answer you think is correct for the questions and statements below. </b> </h5> <br>
            <br>
            <div class="r1" style="display:flex" >
                <div class="col9" style="flex:3" >
                <h5 class=" ml-5" style="color:black;font-weight:bold"> Questions</h5>
              <h5 class="float-right" style="color:black;font-weight:bold; margin:-2rem 2rem 0px 0px"> Your Answers</h5>
                </div>
                <div class="col1" style="flex:1">
                <h5 class='w-25 '  style="color:black;font-weight:bold;"> Points Ranked</h5>
              <h5 class=" float-right w-50" style="color:black;font-weight:bold;margin:-4rem 0rem 0px 0px "> Correct Answers</h5>
                </div>
            </div>
              <!-- Scenarios Lesson -->
              <div class="scenario px-5 " >
            <div  class="r1" style="display:flex"  >
                <div class="col9" style="flex:3">
                <table>
               <tr>
               <td class='qno'> 1</td>
               <td class='ques'>	What percent of 10th grade students prefer to date a non-smoker?</td>
               <td><select size="3" readonly name="sq1">
                <option <?php if($result['q1']==28){ echo "selected";}?> > 28%</option>
                <option <?php if($result['q1']==56){ echo "selected";}?> >56%</option>
                <option <?php if($result['q1']==81){ echo "selected";}?>>81%</option>
              </select></td>

               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 2</td>
               <td class='ques'>What percent of 8th grade students have ever smoked a cigarette?</td>
               <td><select size="3" readonly name="sq2">
                <option <?php if($result['q2']==9){ echo "selected";}?>> 9%</option>
                <option <?php if($result['q2']==20){ echo "selected";}?>>20%</option>
                <option <?php if($result['q2']==39){ echo "selected";}?>>39%</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 3</td>
               <td class='ques'>	Use of marijuana by 8th grade students has increased in the last 10 years.</td>
               <td><select size="2" readonly name="sq3">
                <option <?php if($result['q3']=='true'){ echo "selected";}?>> True</option>
                <option <?php if($result['q3']=='false'){ echo "selected";}?> >False</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 4</td>
               <td class='ques'>	What percent of 8th grade students used alcohol in the last 30 days?</td>
               <td><select size="3"  readonly name="sq4">
                <option <?php if($result['q4']==8){ echo "selected";}?>> 8%</option>
                <option <?php if($result['q4']==13){ echo "selected";}?>>13%</option>
                <option <?php if($result['q4']==45){ echo "selected";}?>>45%</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 5</td>
               <td class='w-100'>	Which three drugs are most commonly used by teens? <span style="padding-left:6rem"></span> <br>                    
                    a.	   Alcohol, marijuana, and vaping <br>
                    b.	    Alcohol, tobacco, and marijuana <br>
                    c.	 Marijuana, alcohol, and prescription drugs
                    </td>
                <td><select size="3" name='sq5'>
                <option <?php if($result['q5']=='A'){ echo "selected";}?>>A</option>
                <option <?php if($result['q5']=='B'){ echo "selected";}?> >B</option>
                <option <?php if($result['q5']=="C"){ echo "selected";}?>>C</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 6</td>
               <td>		Drinking alcohol leads to a loss of coordination, poor judgment, slowed reflexes and memory lapses.</td>
               <td><select size="2" name='sq6'>
               <option <?php if($result['q6']=='true'){ echo "selected";}?>> True</option>
                <option <?php if($result['q6']=='false'){ echo "selected";}?> >False</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 7</td>
               <td>	What percent of 8th grade students used smokeless tobacco (“snuff” or “chew”) in thepast 30 days?</td>
               <td><select size="3" name='sq7'>
                <option <?php if($result['q1']==1.7){ echo "selected";}?>> 1.7%</option>
                <option <?php if($result['q1']==12.2){ echo "selected";}?>>12.2%</option>
                <option <?php if($result['q1']==23){ echo "selected";}?>>23%</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 8</td>
               <td>	Taking someone else’s prescription drugs isn’t as bad for you as street drugs because a doctor has prescribed them.</td>
               <td><select size="2" name='sq8'>
               <option <?php if($result['q8']=='true'){ echo "selected";}?>> True</option>
                <option <?php if($result['q8']=='false'){ echo "selected";}?> >False</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 9</td>
               <td class='w-100'>	What percent of 8th graders have not used marijuana?</td>
               <td><select size="3" name='sq9'>
                <option <?php if($result['q9']==51){ echo "selected";}?>> 51%</option>
                <option <?php if($result['q9']==75){ echo "selected";}?>>75%</option>
                <option <?php if($result['q9']==81){ echo "selected";}?>>81%</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 10</td>
               <td>		Someone who drinks or does drugs alone may have a problem with drugs and alcohol.</td>
               <td><select size="2" name='sq10'>
               <option <?php if($result['q10']=='true'){ echo "selected";}?>> True</option>
                <option <?php if($result['q10']=='false'){ echo "selected";}?> >False</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 11</td>
               <td class='w-100'>	Beer and wine are safer than liquor.</td>
               <td><select size="2" name='sq11'>
               <option <?php if($result['q11']=='true'){ echo "selected";}?>> True</option>
                <option <?php if($result['q11']=='false'){ echo "selected";}?> >False</option>
              </select></td>
               </tr> </table>
               <table> <br>
               <tr >
               <td class='qno'> 12</td>
               <td>	In most states it is illegal to buy or possess alcohol if you are under the age of 21..</td>
               <td><select size="2" name='sq12'>
               <option <?php if($result['q12']=='true'){ echo "selected";}?>> True</option>
                <option <?php if($result['q12']=='false'){ echo "selected";}?> >False</option>
              </select></td>
               </tr> </table>
                </div>
                <div class="col1" style="flex:1">
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'> <br><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'><br><br><br>
                <input class='txtarea p-2 mx-4' type="text" size='4'> <input class='txtarea p-2 float-right' type="text" size='10'>
                </div>
            </div>
              </div> <br>
               
              
             
    </div>
         <!-- //Main Heading LESSON 2.2--> <br>
         <div class="lesson2-2 <?php echo $dlesson2?>" >
        <div class="head" style='margin-top:8rem; margin-left:100px; color:black !important'>
         <h4 ><b>Directions: </b></h4>
              <h5><b>Think of at least three activities you did yesterday or one day this week in the morning, afternoon, and night. Write them in the ACTIVITIES boxes. 
              In the RISK boxes, write the risks which may have been possible during the activities. </b></h5> <br>
               </div>
              <!-- Scenarios Lesson 2.2 --> <br>
              <img src="../img/a.png" class='pl-5' alt="">
              <div class="real pl-5 ml-5 text-dark">
                <div class="r " style="color:black;display:flex">
                  <div class="col6 px-5" style="flex:1" >
                  <h6><b>EXAMPLE: At 9:00 in the morning I got up and took a bath. Then I went into the kitchen to eat some leftover pizza from last night </b> </h6>
                  </div>
                  <div class="col6 px-4 "style="flex:1">
                  <h6><b>Example: I could have slipped when I got into the bathtub. The food could have made me sick if it wasn’t good anymore.</b> </h6>
                  </div>
                </div>
              </div>
             
             <div class="r" style="display:flex">
                <div class="col2" style="flex:1">
                <img src="../img/b.png" class="pl-5" alt="">
                <img src="../img/c.png" class="pl-5" alt="">
                </div>
                <div class="col5" style="flex:2">
                <textarea class="txtarea" readonly name="rq1" id="" cols="40" rows="7"><?php echo $result['q1']?></textarea> <br> <br>
                <textarea class="txtarea" readonly name="rq2" id="" cols="40" rows="7"><?php echo $result['q2']?></textarea> <br> <br>
                <textarea class="txtarea" readonly name="rq3" id="" cols="40" rows="7"><?php echo $result['q3']?></textarea> 
                </div>
                <div class="col5" style="flex:2">
                <textarea class="txtarea" readonly name="rq4" id="" cols="40" rows="7"><?php echo $result['q4']?></textarea>  <br> <br>
                <textarea class="txtarea" readonly name="rq5" id="" cols="40" rows="7"><?php echo $result['q5']?></textarea>  <br> <br>
                <textarea class="txtarea" readonly name="rq6" id="" cols="40" rows="7"><?php echo $result['q6']?></textarea> 
                </div>
             </div>
        
    </div>
     
  
   