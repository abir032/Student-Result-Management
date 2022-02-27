
<?php
   session_start();
   if(isset($_SESSION['loggedin'])){
?>

<!DOCTYPE html>
    <head>
        <title>Add Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/mark.css" type="text/css">
        
    </head>
    <body>
        <div class= "header">
                <h1>Student result Management</h1>
                <h2>Admin Panel-Add Result</h2>
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
            <div class="mark">
                <form method="GET" action="" > 
                <div class="textfield">
                     
                     <label >Course Code</label><br>
                     <select name="c_code" id="">
                     <?php
                    include 'dbconnect.php';
                    $sql = "select Course_code from course";
                    $result = mysqli_query($conn,$sql);
                   
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                    
                     
                        <option><?php echo $row['Course_code']; ?></option>
                       
                   
                   
                    <?php  
                    }
                    ?>
                     </select>
                     <div class="textfield">
                        <label>Semester</label>
                   </div>
                   
                   <div class="select_field">
                   
                       <select name="semester" id="">
                          
                           <option>Spring</option>
                           <option>Fall</option>
                           <option>Summer</option>
                          
                       </select>
                   </div>
                   <div class="year">
                    <select name="year">
                        <?php
                         for($year=1995; $year<=date('Y'); $year++){
                         echo '<option value="'.$year.'">'.$year.'</option>';
                        }
                        ?>
                    </select>
                   </div>
                </div>
                <div class="sub">
                         <input type="submit" id="submit" name="select" value="select">
                </div>
                </form>
            </div>
           
            <div class= "add_student">
               <form method="POST" action="addresult.php" id = "srform">
               <?php 
                
                if(isset($_GET['select'])){
                    $code = $_GET['c_code'];
                    $fsemester = $_GET['semester'].$_GET['year'];
                    $_SESSION['course_code'] = $code;
                    $_SESSION['semester'] = $fsemester;
                    $mark = "select * from mark_distribution where Course_code = '$code' && semester = '$fsemester'";
                    $r= mysqli_query($conn,$mark);
                    if(mysqli_num_rows($r)>0){
                    $roww = mysqli_fetch_assoc($r);
                   
                ?>
                    <div class="textfield">
                        <label>Student ID</label><br>
                        <input type="text" name="id" placeholder="year-semester(1,2,3)-dept_code-id"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Quiz</label><br>
                        <input type="Number" name="quiz" placeholder="0/<?php echo $roww['quiz']; ?>" id = "quiz"required>
                        <small>error message</small>
                   </div>
                   
                   <div class="textfield">
                        <label>Class Work</label><br>
                        <input type="Number" name="c_work" placeholder="0/<?php echo $roww['classwork']; ?>" id = "cwork"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Mid 1</label><br>
                        <input type="Number" name="mid1" placeholder="0/<?php echo $roww['mid1']; ?>" id="mid1"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Mid 2</label><br>
                        <input type="Number" name="mid2"id = "mid2" placeholder="0/<?php echo $roww['mid2']; ?>"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Final</label><br>
                        <input type="Number" name="final" placeholder="0/<?php echo $roww['final']; ?>" id="final"required>
                        <small>error message</small>
                   </div>
                   
                   <div class="submit">
                         <input type="submit" id="submit" name="Add">
                   </div>
                   <?php
                    }
                      else {
                          ?>
                           <div class="success">
                            Please insert mark for this course
                            </div>
                    <?php
                      }
                     }
                    if(isset($_SESSION['success'])){
                   ?>
                   <div class="success">
                   successfully added!!
                  </div>
                    <?php }
                 ?>
               </form>
            </div>
        </div>
        <script src="js/markcheck.js"></script>
    </body>
</html>
<?php
    
   }
   else{
       echo"<h1>Page not found</h1>";
   }
   //unset($_SESSION['loggedin']);
   
?>
<?php
    unset($_SESSION['success']);
    
?>