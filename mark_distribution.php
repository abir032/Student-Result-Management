<?php
   include 'dbconnect.php';
   include 'validate.php';
   session_start();
   

   if(isset($_SESSION['loggedin'])){
       
     
      if(isset($_POST['Add']))
      {   
         $c_code = $_POST['c_code'];
         $quiz = $_POST['quiz'];
         $c_work = $_POST['c_work'];
         $mid_1 = $_POST['mid1'];
         $mid2 = $_POST['mid2'];
         $final = $_POST['final'];
         $semester = $_POST['semester'];
         $year = $_POST['year'];
         $final_semeser = $semester.$year;
         $total = $quiz+$c_work+$mid_1+$mid2+$final;
         if($total==100){
           
            $check = "SELECT count( `Course_code`) as total,semester FROM `mark_distribution` WHERE Course_code = '$c_code' && semester = '$final_semeser'";
            $r = mysqli_query($conn,$check);
            $flag = 0;
            $total = mysqli_fetch_assoc($r);
            echo $total['total'];
            if($total['total']+1>1){
                $flag = 1;
            }
            
            if($flag == 0){
                $sql = "INSERT INTO `mark_distribution`(`Course_code`, `quiz`, `classwork`, `mid1`, `mid2`, `final`, `semester`) VALUES ('$c_code','$quiz','$c_work','$mid_1','$mid2','$final','$final_semeser')";
                if(mysqli_query($conn,$sql))
                {
                    $_SESSION['success']= "right";
                    header("location: markdistribution.php");

                }
            }
            else{
                echo"<script>
               alert('You have already enter this course mark destribuiton in this semester');
               window.location.href=' markdistribution.php'
               </script>;";
            }
         }
         else{
            echo"<script>
               alert('Total mark must be less than equal 100');
               window.location.href=' markdistribution.php'
               </script>;";
         }
      }
      
   }
   
   else{
       echo"<h1>Page not found</h1>";
   }
   //unset($_SESSION['loggedin']);
   
?>