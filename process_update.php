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
            <?php
                       include 'dbconnect.php';
                       $id = $_GET['id'];
                       $_SESSION['sfid'] = $id;
                       $sql = "select * from student where student_f_id = '$id'";
                       $result = mysqli_query($conn,$sql);
                       $row = mysqli_fetch_array($result);
                       $_SESSION['email'] = $row['email'];
                   ?>
               <form method="POST" action="updated.php" id = "srform">
                  
                   <div class="textfield">
                        <label >Student Name</label><br>
                        <input type="text" name="name" value = "<?php echo $row['Name'] ?>"id="sname"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Email</label><br>
                        <input type="text" name="email" value="<?php echo $row['email'] ?>" id="email"required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Password</label><br>
                        <input type="text" name="password" value="<?php echo $row['password'] ?>" id="password"required>
                        <small>error message</small>
                   </div>
                   
                   <div class="textfield">
                        <label>Gender</label>
                   </div>
                   <div class = "select_field1">
                       <select name="gender" id="" value="<?php echo $row['gender'] ?>">
                           <option>Male</option>
                           <option>Female</option>
                       </select>

                   </div>
                  
                   
                   
                   <div class="textfield">
                        <label>Birth Date</label><br>
                        <input type="date" name="dob" id="date" value="<?php echo $row['dob'] ?>" required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Phone Number</label><br>
                        <input type="text" name="pno" id= "Phone_no" value="<?php echo $row['phone_no'] ?>" required>
                        <small>error message</small>
                   </div>
                   <div class="textfield">
                        <label>Address</label><br>
                        <input type="text" name="add" value="<?php echo $row['address'] ?>" required>
                        <small>error message</small>
                   </div>
                   <div class="submit">
                         <input type="submit" id="submit" value="update" name="submit">
                   </div>
                   <?php
                    
                    if(isset($_SESSION['success'])){
                   ?>
                   <div class="success">
                    Successfully Added!!!
                  </div>
                    <?php 
                    }
                     
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