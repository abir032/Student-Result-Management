<?php
   include 'dbconnect.php';
   session_start();
   if(isset($_SESSION['sloggedin'])){
             $id = $_SESSION['sid'];
?>
<!DOCTYPE html>
    <head>
        <title>Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/admin.css" type="text/css">

    </head>
    <body>
        <div class= "header">
                <h1>Student result Management</h1>
                <h2>Grade Report</h2>
        </div>
        <div class= "side_bar">
        <ul>
        <a href="student.php">
                <li>Home</li>
            </a>
            <a href="change_password.php">
                <li>Change Password</li>
            </a>
            <a href="studentgradereport.php">
                <li>Grade Report</li>
            </a>
            <a href="print_gradereport.php">
                <li>Print Grade Report</li>
             </a>
            <a href="student_logout.php">
                <li>logout</li>
            </a>
        </ul>
        
        </div>
        <div class= "content">
                <div class="all_student" >
                     <table border="0" cellpadding = "20px" cellspacing="30px">
                         <tr>
                             <th>
                               Course
                             </th>
                             <th>
                                 Course Title
                             </th>
                             <th>
                                Semester
                             </th>
                             <th>
                                cr
                             </th>
                             <th>
                                 grade
                             </th>
                             <th>
                                gp
                             </th>
                         </tr>
                         <?php
                            
                             
                            $total = mysqli_query($conn,"SELECT student_f_id,semester, semesterinno,
                            sum(course.credit_p_course) as total 
                            FROM result NATURAL join course 
                            where student_f_id='$id' GROUP by(result.semester) order by result.semesterinno asc");
                            
                            $cgpa = Null;
                            $credit_complete = NULL;
                             while( $total_credit = mysqli_fetch_assoc($total) ){
                               $semester =  $total_credit['semester'];
                               $credit_complete += $total_credit['total'];
                              $term_gpa = NULL;
                              $sql="SELECT * FROM result NATURAL join
                              course where student_f_id='$id' and semester = '$semester'";
                             $result=mysqli_query($conn,$sql);   
                             if(mysqli_num_rows($result) > 0)
                             {
                             while($row=mysqli_fetch_assoc($result))
                             {     
                                
                             ?>
                              <tr>
                                  <td>
                                      <?php echo $row['Course_code']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['course_name']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['semester']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['credit_p_course']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['grade']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['gpa']; ?>
                                  </td>
                                   
                              </tr>
                                
                                
                        <?php
                              $term_gpa+=($row['gpa']*$row['credit_p_course'])/$total_credit['total'];
                              $cgpa+=($row['gpa']*$row['credit_p_course']);
                             }
                            }
                            
                             
                               ?>
                              
                                  <tr style="color:aliceblue">
                                      <td>
                                          Term GPA:
                                          <?php
                                            echo round($term_gpa,2);
                                          ?>
                                      </td>
                                      
                                      <td>
                                          CGPA:
                                          <?php
                                            echo round($cgpa/$credit_complete,2);
                                          ?>
                                      </td>
                                      
                                      <td>
                                          Credit Complete:
                                          <?php
                                            echo $credit_complete;
                                          ?>
                                      </td>
                                      
                                  </tr>
                              
                               <?php
                             }
                              
                         ?>
                     </table> 
                </div>
        </div>
    </body>
</html>
<?php
   
   }
   else{
       echo"<h1>Page not found</h1>";
   }
   //unset($_SESSION['loggedin']);
  
?>