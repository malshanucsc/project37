
    
         
        <div id="listContainer">
             
            <ul id="expList" >
                <li id="li_1">
                    Users
                    <ul  >
                        <li id="li_11"  >Student
                            
                            <ul>
                                <li   id="newstulist"><a href="newstulist.php" target="_parent"><img src="image/edit.png" /> Browse Student List</a></li>
								<li   id="newadd_stu"><a href="newadd_stu.php" target="_parent"><img src="image/edit.png" /> Add Student  </a></li>
								<li   id="stuuploa"><a href="newstu_upload.php" target="_parent"><img src="image/edit.png" /> Upload Student  </a></li>
                                <li   id="removestu"><a href="removestu.php" target="_parent"><img src="image/edit.png" /> Remove Students  </a></li>
                                 
                            </ul>
                        </li>
                        <li id="li_12">Lecture
							<ul  >
								<li  ><a href="#"><img src="image/edit.png" /> Browse Lecture List  </a></li>
								<li  ><a href="#"><img src="image/edit.png" /> Add Lecture  </a></li>
								<li  ><a href="#"><img src="image/edit.png" /> Upload Licture  </a></li>
                                <li  ><a href="stuuploa.php" target="_parent"><img src="image/edit.png" /> Remove Lectures  </a></li>
							</ul>
						</li>
                        
                    </ul>
                </li>
                

                <?php 
                
                include "../db.php";
//                $connect=mysqli_connect("localhost","root","","project_db");
                $courselistq="SELECT course_id,Course_name FROM course";
                $courselist=mysqli_query($conn,$courselistq);
                mysqli_close($conn); 
                ?>
                 
                <li id="li_2">
                    Course
                     
                    <ul style="padding-left:0px;">
                        <?php 
                        while($rowdata=mysqli_fetch_assoc($courselist)){ 
                            $cname=$rowdata["Course_name"];
                            $cid=$rowdata["course_id"];  
                            ?>
                            <li id="<?php print($cname); ?>"><?php
                             
                             print($cname); ?>
                            
                                <ul  >
                                    <li  ><a href="courstulist.php?cour_id=<?php print($cid);?>"><img src="image/edit.png" />Student List</a></li>
                                    <li  ><a href="dfre.php?cour_id=<?php print($cid);?>"><img src="image/edit.png" />Enroll Students  </a></li>
                                    <li  ><a href="newadd_stu.php" target="_parent"><img src="image/edit.png" />Enroll Lectures  </a></li>
                                     
                                     
                                </ul>
                            </li><?php
                        }
                        ?>
                        <!--<li>Web Design
                            
                            <ul style="padding-left:0px;">
                                <li style="padding-left:0px;"><a href="newstulist.php" target="_parent"><img src="image/edit.png" />Student List</a></li>
								<li style="padding-left:0px;"><a href="dfre.php" target="_parent"><img src="image/edit.png" />Enroll Students  </a></li>
								<li style="padding-left:0px;"><a href="newadd_stu.php" target="_parent"><img src="image/edit.png" />Enroll Lectures  </a></li>
								 
                                 
                            </ul>
                        </li>
                        <li>SLDLC
							<ul style="padding-left:0px;">
								<li style="padding-left:0px;"><a href="newstulist.php" target="_parent"><img src="image/edit.png" />Student List</a></li>
								<li style="padding-left:0px;"><a href="newadd_stu.php" target="_parent"><img src="image/edit.png" />Enroll Students  </a></li>
								<li style="padding-left:0px;"><a href="newadd_stu.php" target="_parent"><img src="image/edit.png" />Enroll Lectures  </a></li>
								 
							</ul>
						</li>-->
                        <li><a href="addcourse.php">Add course</a></li>
                        <li><a href="courselist.php">Courses Details</a></li>
                        
                        
                    </ul>
                </li>
            </ul>
        </div>
 