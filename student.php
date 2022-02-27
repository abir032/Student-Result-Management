<?php
   include 'dbconnect.php';
   session_start();
   if(isset($_SESSION['sloggedin'])){
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
                <h2>Student-Profile</h2>
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
                
                <div class="studentProfile" >
                      <?php
                             $id =  $_SESSION['sid'];
                             $sql="select * from student where student_f_id = '$id'";
                             $result=mysqli_query($conn,$sql);   
                             if($output=mysqli_num_rows($result) > 0)
                             {
                                //echo "sign in";   
                             while($row=mysqli_fetch_assoc($result))
                             {

                           ?>
                           <div class = "profile">
                               <label>ID: <?php echo $row['student_f_id']; ?></label>
                           </div>
                          
                           <div class = "profile">
                               <label>Name: <?php echo $row['Name']; ?></label>
                           </div>
                           
                           <div class = "profile">
                               <label>Email: <?php echo $row['email']; ?></label>
                           </div>
                           
                           <div class = "profile">
                               <label>Deptartment: <?php echo $row['dept_name']; ?></label>
                           </div>
                           <div class = "profile">
                               <label>Gender: <?php echo $row['gender']; ?></label>
                           </div>
                           <div class = "profile">
                               <label>Date of Birth: <?php echo $row['dob']; ?></label>
                           </div>
                           <div class = "profile">
                               <label>Phone No: <?php echo $row['phone_no']; ?></label>
                           </div>
                           <div class = "profile">
                               <label>Address: <?php echo $row['address']; ?></label>
                           </div>
                           <div class = "profile">
                               <label>Semester: <?php echo $row['admited_semester']; ?></label>
                           </div>
                    <?php }
                             }
                    ?>
                <div>
                    
                </div>
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
