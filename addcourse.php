<?php
   session_start();
   if(isset($_SESSION['loggedin'])){
?>

<!DOCTYPE html>
    <head>
        <title>Add Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/addstudent.css" type="text/css">
        
    </head>
    <body>
        <div class= "header">
                <h1>Student result Management</h1>
                <h2>Admin Panel-Add Course</h2>
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
            <div class= "add_student">
               <form method="POST" action="courseadd.php">
                   <div class="textfield">
                        <label >Course Code</label><br>
                        <input type="text" name="c_code"required>
                   </div>
                   <div class="textfield">
                        <label>Course Name</label><br>
                        <input type="text" name="c_name"required>
                   </div>
                   <div class="textfield">
                        <label>Course Credit</label><br>
                        <input type="Number" name="credit"required>
                   </div>
                   <div class="submit">
                         <input type="submit" id="submit" name="Add">
                   </div>
                   <?php
                    if(isset($_SESSION['success'])){
                   ?>
                   <div class="success">
                    Successfully Added!!!
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
    unset($_SESSION['success']);
    
?>