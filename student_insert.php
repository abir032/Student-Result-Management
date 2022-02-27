<?php
   include 'dbconnect.php';
   include 'validate.php';
   session_start();
   

   if(isset($_SESSION['loggedin'])){
      
     function makesemesterno($semester){
         if($semester == 'Spring'){
             return 1;
         }
         else if($semester == 'Summer'){
            return 2;
        }
        else if($semester == 'Fall'){
            return 3;
        }

     }
     function makedeptno($deptname){
        if($deptname == 'CSE'){
            return 60;
        }
        else if($deptname == 'BBA'){
            return 30;
        }
        else if($deptname == 'EEE'){
            return 20;
        }
        else if($deptname == 'ECE'){
            return 10;
        }
        else if($deptname == 'ICE'){
            return 70;
        }
        if($deptname == 'Pharmacy'){
            return 80;
        }
        if($deptname == 'English'){
            return 90;
        }
        if($deptname == 'Civil'){
            return 40;
        }
     }
     
      if(isset($_POST['submit']))
      {   
         $uname=$_POST['name'];
         $email=$_POST['email'];
         $pass=($_POST['password']);     
         $deptname=$_POST['deptname'];
         $semester=$_POST['semester'];
         $year = $_POST['year'];
         $dob = $_POST['dob'];
         $gender=$_POST['gender'];
         $pno=$_POST['pno'];
         $address = $_POST['add'];
         $f_semester = $semester.$year;
         $currentdate = date("y-m-d");
         $age = date_diff(date_create($dob),date_create($currentdate));
         $s = makesemesterno($semester);
         $d = makedeptno($deptname);
         $insert = new validation($uname,$email,$pass,$age,$pno);
         if($insert->unamecheck() && $insert->emailcheck()&& $insert->passwordcheck()&& $insert->phone_no_check()&& $insert->agecheck()){
            
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
            if($flag == 0){
                $idcount = "SELECT max(student_id) as total FROM `student`";
                $r = mysqli_query($conn,$idcount);
                $total  = mysqli_fetch_assoc($r);
                $i = $total['total'];
                $x = $i+1;
               
                $student_id = $year.'-'.$s.'-'.$d.'-'.$x;
          
              
              $sql = "insert into student(student_id,student_f_id,name,email,password,dept_name,gender,dob,phone_no,address,admited_semester) values
               ('$x','$student_id','$uname','$email','$pass','$deptname','$gender','$dob','$pno','$address','$f_semester')";
               if(mysqli_query($conn,$sql)){
                   $_SESSION['success'] = "added";
                   header("location: add_student.php");
               }
            }
            else{
                echo"<script>
               alert('Email already exist');
               window.location.href='add_student.php'
               </script>;";
            }
            
           
          }
           

        
        else{
        
         unset($_SESSION['success']);
     
          
            if($insert->unamecheck()==false){
               echo"<script>
               alert('Username must be 10 to 30 charecter long and must have first and last name!!!');
               window.location.href='add_student.php'
               </script>;";
            }
            if($insert->emailcheck()==false){
               echo"<script>
               alert('invalid email format follow- example@std.ewubd.edu!!!');
               window.location.href='add_student.php'
               </script>;";
            }
            if($insert->agecheck()==false){
               echo"<script>
               alert('date of birth must be valid!!!');
               window.location.href='add_student.php'
               </script>;";
            }
            if($insert->passwordcheck()==False){
               echo"<script>
               alert('password must be 10 to 20 charecter long and must have charecter,uppercase,lowercase & number!!!');
               window.location.href='add_student.php'
               </script>;";
            }
            if($insert->phone_no_check() == False){
               echo"<script>
               alert('phone no must be valid!!!');
               window.location.href='add_student.php'
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