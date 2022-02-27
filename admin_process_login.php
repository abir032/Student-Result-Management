<?php
   require 'dbconnect.php';
   
   if(isset($_POST['submit']))
   {
       $u_name=NULL;
       $pass=NULL;
    
    $uname=$_POST['u_name'];
    $pass=$_POST['pass'];
    echo $uname. $pass;
    $sql="select admin_id,Username,password from admin where Username='$uname'&& password='$pass'";
    $result=mysqli_query($conn,$sql);   
    if($output=mysqli_num_rows($result) > 0)
    {
       //echo "sign in";
       
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['admin_id'];
        $name=$row['Username'];
    }
       //echo  $f_name;
       session_start();
       $_SESSION['id']=$id;
       $_SESSION['loggedin'] = "logged in";
       $_SESSION['f_name'] = $name;
       
       header("location: admin_panel.php");
      // echo $_SESSION['id'];
      mysqli_close($conn);
    } 
    else{
      session_start();
       $_SESSION['error'] = "username or password incorrect";
       header("location: admin_login.php");
    
      
   }
}

?>