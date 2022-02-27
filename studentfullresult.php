<?php
   include 'dbconnect.php';
   session_start();
   if(isset($_SESSION['loggedin'])){
    function isidexist($id){
        include 'dbconnect.php';
        $sql = "select student_f_id
        from student where student_f_id = '$id' 
        ";
        $r = mysqli_query($conn,$sql);
          
          
           if(mysqli_num_rows($r)>0){
               return true;
           }
           else{
               return false;
           }

       }

      if(isset($_POST['select'])){
          $id= $_POST['id'];
         
          
?>
<!DOCTYPE html>
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/admin.css" type="text/css">

    </head>
    <body>
        <div class= "header">
                <h1>Student result Management</h1>
                <h2>Admin Panel-Grade Report</h2>
        </div>
        <div class= "side_bar">
        <ul>
            <a href="admin_panel.php">
                <li>Home</li>
            </a>
            <a href="add_student.php">
                <li>Add Student</li>
            </a>
            <a href="delete.php">
                <li>Delete Student</li>
            </a>
            <a href="update.php">
                <li>Update Student</li>
             </a>
             <a href="addcourse.php">
                <li>Add Course</li>
             </a>
            <a href="markdistribution.php">
                <li>Mark Distribution</li>
            </a>
            <a href="add_result.php">
                <li>Add Result</li>
            </a>
            <a href="Result.php">
                <li>Result</li>
            </a>
            <a href="makepdf.php">
                <li>Make Pdf</li>
            </a>
            <a href="admin_logout.php">
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
                         if(isidexist($id)){

                            
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
                            else{
                               echo"<script>
                               alert('Not Found');
                               window.location.href=' result.php'
                               </script>;";
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
                            
                            }
                             else{
                                $_SESSION['wrongid'] = "added";
                             }
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