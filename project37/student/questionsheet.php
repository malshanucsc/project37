<?php
session_start();


include ('../db.php');
$quizId = $_GET['quizId'] ;
$mod_Id = $_GET['modID'] ;

?>


<!DOCTYPE html>
         <html>
          <head>
            <title>Answer the questions</title>

            <link href="css/style.css" rel="stylesheet" media="screen">

          <script src="js/scripts.js"></script>

          </head>
          <body >
           


                 
            <div class="container question">
               <script src="js/countdown.js"></script>
            <div id='timer'>
            <script type="application/javascript">
            var myCountdownTest = new Countdown({
                                    time: 60*5, 
                                    width:200, 
                                    height:80, 
                                    rangeHi:"minute"
                                    });
            setTimeout(function() {
             $("form").submit();
          }, 60000*5);
     
              </script>
          </div>

                <form class="form-horizontal" role="form" id='login' method="post" action="results.php?quizId=<?php echo $quizId;?>&modID=<?php echo $mod_Id;?>" >
                  <?php
                  
                  $sql = "SELECT * FROM question join quiz_questions on question.question_Id = quiz_questions.question_Id where quiz_Id = $quizId ORDER BY RAND() limit 10 ";
                  $res = mysqli_query($conn, $sql) or die(mysql_error());
                  $rows = mysqli_num_rows($res);
                  $i=1;
                         while($result=mysqli_fetch_array($res)){?>
                             
                             
                             <?php if($i==1){
                                
                              ?> 
                             <div id='question<?php echo $i;?>' class='cont'>
                              <?php echo "Question " . $i. " of 10";?>
                             <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['question'];?></p>
                             <table class="question-table">
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="1" id='radio1_<?php echo $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer1']);?>
                                 </td>
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="2" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer2']);?>
                                 </td>
                                 
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="3" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer3']);?>
                                 </td>
                                 
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="4" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer4']);?>
                                   
                                 </td>
                                 
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/>                                                                      
                                   
                                 </td>
                                 
                               </tr>
                             </table>  <br>      

                             <button id='<?php echo $i;?>' class='next' type='button'>Next</button>
                             </div>     
                               
                              <?php }elseif($i<1 || $i<$rows){
                                ?>
                              
                                <div id='question<?php echo $i;?>' class='cont'>
                                  <?php echo "Question " . $i. " of 10";?>
                                 <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question'];?></p>
                                 <table class="question-table">
                                   <tr>
                                      <td>
                                   
                                   <input type="radio" value="1" id='radio1_<?php echo $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer1']);?>
                                 </td>
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="2" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer2']);?>
                                 </td>
                                 
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="3" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer3']);?>
                                 </td>
                                 
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="4" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer4']);?>
                                   
                                 </td>
                                     
                                   </tr>
                                   <tr>
                                     <td>
                                       
                                       <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/>                                                                      
                                       
                                     </td>
                                     
                                   </tr>
                                 </table>
                                 <br>
                                 <button id='<?php echo $i;?>' class='previous ' type='button'>Previous</button>                    
                                 <button id='<?php echo $i;?>' class='next' type='button' >Next</button>
                             </div>
                                
                                
                                
                                 
                                 
                            <?php }elseif($i==$rows){
                              ?>
                             <div id='question<?php echo $i;?>' class='cont'>
                              <?php echo "Question " . $i. " of 10";?>
                             <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question'];?></p>
                             <table class="question-table">
                               <tr>
                                  <td>
                                   
                                   <input type="radio" value="1" id='radio1_<?php echo $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer1']);?>
                                 </td>
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="2" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer2']);?>
                                 </td>
                                 
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="3" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer3']);?>
                                 </td>
                                 
                               </tr>
                               <tr>
                                 <td>
                                   
                                   <input type="radio" value="4" id='radio1_<?php echo  $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/><?php echo htmlspecialchars($result['answer4']);?>
                                   
                                 </td>
                                   
                                   <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['question_Id'];?>' name='<?php echo $result['question_Id'];?>'/>                                                                      
                                   
                                 </td>
                                 
                               </tr>
                             </table>
                             <br>
                             
                             <button id='<?php echo $i;?>' class='previous' type='button'>Previous</button>                    
                             <button id='<?php echo $i;?>' class='next' type='submit'>Finish</button>
                             </div>
                  <?php } $i++;} ?>
                  
                </form>
            </div>


            <script>

            



            $('.cont').addClass('hide');
            count=$('.questions').length;
             $('#question'+1).removeClass('hide');
             
             $(document).on('click','.next',function(){
                 last=parseInt($(this).attr('id'));     
                 nex=last+1;
                 $('#question'+last).addClass('hide');
                 
                 $('#question'+nex).removeClass('hide');
             });
             
             $(document).on('click','.previous',function(){
                      last=parseInt($(this).attr('id'));     
                      pre=last-1;
                      $('#question'+last).addClass('hide');
                      
                      $('#question'+pre).removeClass('hide');
                  });
                     
            </script>
          </body>
         </html>
         <?php 
         //   echo "ERROR";
         
         
     
 
?>