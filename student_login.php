<?php 
   session_start();
?>
<!DOCTYPE html>
  <head>
        <title>Student</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/login.css" type="text/css">
  </head>
  <body>
       <div class = "login">
            <h1>Student Log in</h1>
            <form method="post" action="student_process_login.php" name="login">
                <div class="input">
                    <label>Student ID</label><br>
                    <input type="text" name ="s_id" required><br>
                </div>
                <div class="input">
                    <label>Password</label><br>
                    <input type="password" name = "pass" required> 
                
                </div>
                
                <div class="submit">
                <input type="submit" value="Login" name= "submit">
                </div>
                <?php
                    if(isset($_SESSION['error'])){
                ?>
                <div class="erorr">
                    Login failed!!! incorect user name or password 
                </div>
                <?php 
                }
                 ?>
            </form>
       </div>
  </body>
</html>

<?php
    unset($_SESSION['error']);
    
?>