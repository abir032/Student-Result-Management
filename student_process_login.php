<?php
   require 'dbconnect.php';
   if(isset($_POST['submit']))
   {
       $u_name=NULL;
       $pass=NULL;
    
    $sid=$_POST['s_id'];
    $pass=$_POST['pass'];
    echo $uname. $pass;
    $sql="select student_f_id,Name,password from student where student_f_id='$sid'&& password='$pass'";
    $result=mysqli_query($conn,$sql);   
    if($output=mysqli_num_rows($result) > 0)
    {
       //echo "sign in";
       
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['student_f_id'];
        $name=$row['Name'];
    }
       //echo  $f_name;
       session_start();
       $_SESSION['sid']=$id;
       $_SESSION['sloggedin'] = "logged in";
       //$_SESSION['name'] = $name;
       
       header("location: student.php");
      // echo $_SESSION['id'];
      mysqli_close($conn);
    } 
    else{
      session_start();
       $_SESSION['error'] = "username or password incorrect";
       header("location: student_login.php");
       mysqli_close($conn);
      
   }
   
}
?>