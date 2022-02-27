<?php
   include 'dbconnect.php';
  
   session_start();
   if(isset($_SESSION['loggedin'])){

       function credit_check($ccredit){
           if($ccredit>0 && $ccredit<=4.5){
               return true;
           }
           else return false;
       }
       function c_code_check($ccode){
         $len = strlen($ccode);
         
         $firstp = substr("$ccode",0,3);
         $endp = substr("$ccode",$len-3,$len);
   //      echo $endp;
         if($len==6){
             $cntl = 0;
             $cntn = 0;
             for($i = 0;$i<strlen($firstp);$i++){
                 if(ord($firstp[$i])>=65 && ord($firstp[$i])<=90){
                   $cntl++;
                 }
             }
             for($i = 0;$i<strlen($endp);$i++){
                if(ord($endp[$i])>=48 && ord($endp[$i])<=57){
                  $cntn++;
                }
               }   
                if($cntl==3 && $cntn==3)
                  {
                    
                      return true;
                  }
                else {
                    
                    return false;
                    
                }
            }
            
         else{
            
            return false;
        }
}
      if(isset($_POST['Add']))
      {   
         $ccode=$_POST['c_code'];
         $cname=$_POST['c_name'];
         $ccredit = $_POST['credit'];
         if(credit_check($ccredit) && c_code_check($ccode)){
            $sql = "insert into course(Course_code,course_name,credit_p_course) values
               ('$ccode','$cname','$ccredit')";
               if(mysqli_query($conn,$sql)){
                   $_SESSION['success'] = "added";
                   header("location: addcourse.php");
            }
            else{
                echo "<script>
                alert('Already Added');
                window.location.href='addcourse.php'
                </script>";
            }
         }  
         else{
             if(!credit_check($ccredit)){
            echo "<script>
            alert('credit must be between 1-4.5');
            window.location.href='addcourse.php'
            </script>
            ";}
            if(!c_code_check($ccode)){
                echo "<script>
                alert('Course code format - examplee CSE105');
                window.location.href='addcourse.php'
                </script>
                ";}


         } 
        } 
        
    } 
   else{
       echo"<h1>Page not found</h1>";
   }
   //unset($_SESSION['loggedin']);
   
?>