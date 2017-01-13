<style type="text/css">
 
tr:nth-child(even) {background-color: #f2f2f2}
</style>



<?php


include 'db.php';
$UserIDfordefault=$_SESSION['username'];
$courseforAssignment=$_SESSION['Course_ID'];
$batch_No=$_SESSION['batch_No'];

   
    $sql2 = "SELECT * FROM module WHERE module_Id='$mo_ID'";
    $result2 = $conn->query($sql2);

      if ($result2->num_rows > 0) {
   
        while($row2= $result2->fetch_assoc() ) {
         
          ?>
          <table>
          <tr>
          <th>Title</th>
          <td> <?php echo $row2['module_Title'] ;?></td>
          </tr>
          
          <tr>
          <th>Notes</th>
          <td> <?php echo $row2['body'] ;?></td>         
          </tr>
          
          </table>
          
          <br>
          <?php 
         if($row2['link']!=''){
            ?>
            <div style="width:95%;margin-left: 2%; height:40vw;border:solid;" onload="this.style.height=this.contentDocument.body.scrollHeight +'px'; href="<?php echo $row2['link']; ?>">
              
                  <object data=" <?php echo $row2['link']; ?> " type="application/pdf" width="100%" height="100%">
                  alt : <a href="<?php echo $row2['link']; ?> ">test.pdf</a>
                  </object>


            </div>
  
            <br>
            <?php
          }
          ?>
       
          <?php
        
        }
        ?> 
        <?php
      }
    
  
?>
</div>