<?php
   session_start();
   if(isset($_SESSION['sloggedin'])){
?>

<!DOCTYPE html>
    <head>
        <title>Change Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/addstudent.css" type="text/css">
        
    </head>
    <body>
        <div class= "header">
                <h1>Student result Management</h1>
                <h2>Admin Panel-Change Password</h2>
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
            <div class= "add_student">
               <form method="POST" action="password_change.php" id = "srform">
                   
                  
                   <div class="textfield">
                        <label>Old Password</label><br>
                        <input type="password" name="password" id="password"required>
                        
                   </div>
                   <div class="textfield">
                        <label>New Password</label><br>
                        <input type="password" name="newpassword" id="npassword"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Retype New Password</label><br>
                        <input type="password" name="renewpassword" id="rpassword"required>
                        <small>error message</small>
                   </div>
                   
                   <div class="submit">
                         <input type="submit" id="submit" name="submit">
                        
                   </div>
                   <?php
                    if(isset($_SESSION['update'])){
                   ?>
                   <div class="success">
                    Successfully updated
                  </div>
                    <?php }
                 ?>
               </form>
            </div>
        </div>
        <script src="js/schangepass.js"></script>
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
    unset($_SESSION['update']);
   
?>