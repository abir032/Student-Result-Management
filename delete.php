<?php
   include 'dbconnect.php';
   session_start();
   if(isset($_SESSION['loggedin'])){
?>
<!DOCTYPE html>
    <head>
        <title>Delete</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/admin.css" type="text/css">

    </head>
    <body>
        <div class= "header">
                <h1>Student result Management</h1>
                <h2>Admin Panel-Delete</h2>
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
            <a href="admin_logout.php">
                <li>logout</li>
            </a>
        </ul>
        
        </div>
        <div class= "content">
                
                <?php
                    if(isset($_SESSION['delete'])){
                ?>
                <div class="delete">
                   Successfully deleted...
                </div>
                
                <?php } ?>
                <div class="all_student" >
                     <table border="0" cellpadding = "15px" cellspacing="10px">
                         <tr>
                             <th>
                                ID
                             </th>
                             <th>
                                 Name
                             </th>
                             <th>
                                 Email
                             </th>
                             <th>
                                Department Name
                             </th>
                             <th>
                                 Gender
                             </th>
                             <th>
                                 BirthDate
                             </th>
                             <th>
                                 Phone Number
                             </th>
                             <th>
                                 Address
                             </th>
                             <th>
                                 Admited Semester
                             </th>
                         </tr>
                         <?php
                             $sql="select * from student";
                             $result=mysqli_query($conn,$sql);   
                             if($output=mysqli_num_rows($result) > 0)
                             {
                                //echo "sign in";
                                
                             while($row=mysqli_fetch_assoc($result))
                             {
                             ?>
                              <tr>
                                  <td>
                                      <?php echo $row['student_f_id']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['Name']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['email']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['dept_name']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['gender']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['dob']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['phone_no']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['address']; ?>
                                  </td>
                                  <td>
                                      <?php echo $row['admited_semester']; ?>
                                  </td>
                                  <td>
                                  <a href="delete_process.php?id=<?php echo $row['student_f_id'];?>">
                                   <button>delete</button>
                                 </a> 
                                  </td>
                              </tr>
                        <?php
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
   unset($_SESSION['delete']);
  
?>

