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
                <h2>Admin Panel-Add Student</h2>
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
               <form method="POST" action="student_insert.php" id = "srform">
                   <div class="textfield">
                        <label >Student Name</label><br>
                        <input type="text" name="name" id="sname"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Email</label><br>
                        <input type="text" name="email" id="email"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Password</label><br>
                        <input type="text" name="password" id="password"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Department Name</label>
                   </div>
                   <div class="select_field1">
                       <select name="deptname" id="">
                          
                          <option >CSE</option>
                          <option>BBA</option>
                          <option>EEE</option>
                          <option>ECE</option>
                          <option>ICE</option>
                          <option>LAW</option>
                          <option>Pharmacy</option>
                          <option>English</option>
                          <option>Civil</option>
                         
                      </select>
                        
                   </div>
                   <div class="textfield">
                        <label>Gender</label>
                   </div>
                   <div class = "select_field1">
                       <select name="gender" id="">
                           <option>Male</option>
                           <option>Female</option>
                       </select>

                   </div>
                   <div class="textfield">
                        <label>Admission year & Semester</label>
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
                   <div class="textfield">
                        <label>Birth Date</label><br>
                        <input type="date" name="dob" id="date" required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Phone Number</label><br>
                        <input type="text" name="pno" id= "Phone_no" required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Address</label><br>
                        <input type="text" name="add" required>
                        <small>error message</small>
                   </div>
                   <div class="submit">
                         <input type="submit" id="submit" name="submit">
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
        <script src="js/formvalid.js"></script>
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