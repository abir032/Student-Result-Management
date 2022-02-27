
<?php
   session_start();
   if(isset($_SESSION['loggedin'])){
?>

<!DOCTYPE html>
    <head>
        <title>Add Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/mark2.css" type="text/css">
        
    </head>
    <body>
        <div class= "header">
                <h1>Student result Management</h1>
                <h2>Admin Panel-Result</h2>
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
                <form method="POST" action="studentfullresult.php" > 
                <div class="textfield">
                        <label>Student ID</label><br>
                        <input type="text" name="id" placeholder="year-semester(1,2,3)-dept_code-id"required>
                        <small>error message</small>
                </div>
                <div class="sub">
                         <input type="submit" id="submit" name="select" value="Search">
                </div>
                </form>
            </div>
           
            <div class= "add_student">
               <form method="POST" action="semesterresult.php">
               
                    <div class="textfield">
                        <label>Student ID</label><br>
                        <input type="text" name="id" placeholder="year-semester(1,2,3)-dept_code-id"required>
                        <small>error message</small>
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
                   <div class="submit">
                         <input type="submit" id="submit" value="Search" name="Add">
                   </div>
                </div>   
                    <?php
                    if(isset($_SESSION['wrongid'])){
                   ?>
                   <div class="success">
                   invalid id
                  </div>
                    <?php }
                 ?>
               </form>
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
<?php
    unset($_SESSION['wrongid']);
    
?>