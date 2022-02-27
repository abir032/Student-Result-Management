<?php 
   session_start();
?>
<!DOCTYPE html>
  <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/login.css" type="text/css">
  </head>
  <body>
       <div class = "login">
            <h1>Log in</h1>
            <form method="post" action="admin_process_login.php" name="login">
                <div class="input">
                    <label>User Name</label><br>
                    <input type="text" name ="u_name" required><br>
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
                <?php }
                 ?>
            </form>
       </div>
  </body>
</html>

<?php
    unset($_SESSION['error']);
    
?>