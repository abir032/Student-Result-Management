<?php
   include 'dbconnect.php';
   include 'validate.php';
   session_start();

  

 if(isset($_SESSION['sloggedin'])){
     function passwordcheck($pass){
       
        $len = strlen($pass);
        $strlowcnt = 0;
        $strupcnt = 0;
        $strnumcnt = 0;
        $strsccount = 0;
        
        if($len>=5 && $len<=20){
         for($i = 0; $i<$len;$i++){
             if((ord($pass[$i])>=32 & ord($pass[$i])<=47) || (ord($pass[$i])>=58 & ord($pass[$i])<=64) || (ord($pass[$i])>=91 & ord($pass[$i])<=96)||(ord($pass[$i])>=123 & ord($pass[$i])<=126)){
                  $strsccount++;
             }
             elseif(ord($pass[$i])>=97 && ord($pass[$i])<=122)
             {
                 $strlowcnt++;
             }
             elseif(ord($pass[$i])>=65 && ord($pass[$i])<=90)
             {
                 $strupcnt++;
             }
             elseif(ord($pass[$i])>=48 && ord($pass[$i])<=57)
             {
                 $strnumcnt++;
             }
        }
            
            if($strlowcnt>=1&& $strsccount>=1&&$strupcnt>=1&&$strnumcnt>=1)
            {
             return true;
            }
            else
            {
             return false;
            }
        }
        else{
            return false;
        }
    } 
     
      
      if(isset($_POST['submit']))
      {   
         
         $pass=($_POST['password']);
         $newpass=($_POST['newpassword']);
         $renewpass=($_POST['renewpassword']);
          $id = $_SESSION['sid'];
         $sql = "select student_f_id,password from student where student_f_id = '$id' and password = '$pass'";
         //echo $newpass.' '.$renewpass;
         $res = mysqli_query($conn,$sql);
         if(mysqli_num_rows($res)>0){
            //echo $newpass.' '.$renewpass;
            if($newpass == $renewpass){
               // echo $newpass.' '.$renewpass;
            if(passwordcheck($newpass)){
               
               // echo $newpass.' '.$renewpass;
          
                    $sql = "UPDATE `student` SET `password` = 
                    '$newpass' WHERE 
                    `student`.`student_f_id` = '$id'";
                
            if(mysqli_query($conn,$sql)){
                $_SESSION['update'] = "added";

                header("location: change_password.php");
            }
            }
           }
           else{
            echo"<script>
            alert('password and retype password don not match');
            window.location.href='change_password.php'
            </script>;";
           } 
          }
          else{
            echo"<script>
            alert('old password is incorrect');
            window.location.href='change_password.php'
            </script>;";
          }  
      }
      
    }
   else{
       echo"<h1>Page not found</h1>";
   }
   //unset($_SESSION['loggedin']);
   
?>