<?php
   include 'dbconnect.php';
   include 'validate.php';
   session_start();

  

 if(isset($_SESSION['loggedin'])){
      
      if(isset($_POST['submit']))
      {   
         $uname=$_POST['name'];
         $email=$_POST['email'];
         $pass=($_POST['password']);     
         $dob = $_POST['dob'];
         $gender=$_POST['gender'];
         $pno=$_POST['pno'];
         $address = $_POST['add'];
         $currentdate = date("y-m-d");
         $age = date_diff(date_create($dob),date_create($currentdate));
         $update = new validation($uname,$email,$pass,$age,$pno);
        if($update->unamecheck() && $update->emailcheck()&& $update->passwordcheck()&& $update->phone_no_check()&& $update->agecheck()){
           $id = $_SESSION['sfid'];
          if($_SESSION['email']==$email){
            unset($_SESSION['email']);
            $sql = "UPDATE `student` SET 
            `Name`='$uname',
            `email`='$email',`password`='$pass',
            `gender`='$gender',
            `dob`='$dob',`phone_no`='$pno',
            `address`='$address'
            WHERE student_f_id = '$id'";
            unset($_SESSION['sfid']);
            if(mysqli_query($conn,$sql)){
                $_SESSION['update'] = "added";

                header("location: update.php");

           }
            else{
 
               echo "Error: ".$sql."<br>". mysqli_error($conn);
            }
          }
          else{
            $email_check = "select email from student";
            $r = mysqli_query($conn,$email_check);
            $flag = 0;
            if(mysqli_num_rows($r) > 0)
            {
             while($row=mysqli_fetch_assoc($r))
             {
                $a_email = $row['email'];
                
                if($a_email == $email)
                {
                   $flag = 1;
                   break;
                }
                 
             }
            }
            if($flag == 0)
            {
            $id = $_SESSION['sfid'];
           
            $sql = "UPDATE `student` SET 
            `Name`='$uname',
            `email`='$email',`password`='$pass',
            `dept_name`='$deptname',`gender`='$gender',
            `dob`='$dob',`phone_no`='$pno',
            `address`='$address',
            `admited_semester`='$f_semester' WHERE student_f_id = '$id'";
            unset($_SESSION['sfid']);
            if(mysqli_query($conn,$sql)){
                $_SESSION['update'] = "update";
                header("location: update.php");
           }
            else{
 
               echo "Error: ".$sql."<br>". mysqli_error($conn);
            }
           }
            else{
                echo"<script>
               alert('Email already exist');
               window.location.href='update.php'
               </script>;";
            }
          }

         
         }
        else{
         unset($_SESSION['sfid']);
         unset($_SESSION['update']);
     
          
            if($update->unamecheck()==false){
               echo"<script>
               alert('Username must be 10 to 30 charecter long and must have first and last name!!!');
               window.location.href='update.php'
               </script>;";
            }
            if($update->emailcheck()==false){
               echo"<script>
               alert('invalid email format follow- example@std.ewubd.edu!!!');
               window.location.href='update.php'
               </script>;";
            }
            if($update->agecheck()==false){
               echo"<script>
               alert('date of birth must be valid!!!');
               window.location.href='update.php'
               </script>;";
            }
            if($update->passwordcheck()==False){
               echo"<script>
               alert('password must be 10 to 20 charecter long and must have charecter,uppercase,lowercase & number!!!');
               window.location.href='update.php'
               </script>;";
            }
            if($update->phone_no_check() == False){
               echo"<script>
               alert('phone no must be valid!!!');
               window.location.href='update.php'
               </script>;";
            }


        }


      }
      


     
   
   } 
   else{
       echo"<h1>Page not found</h1>";
   }
   //unset($_SESSION['loggedin']);
  

?>