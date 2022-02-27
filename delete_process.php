<?php
   require 'dbconnect.php';
   session_start();
   if(isset($_SESSION['loggedin'])){
   $id = $_GET['id'];
   $sql = "DELETE FROM `student` WHERE student_f_id = '$id'";
   echo $id;
   if(mysqli_query($conn,$sql))
   { 
    $_SESSION['delete']='deleted';
    header("location: delete.php");
  }
}
else{
    echo "<script>
    alert('Please login');
    window.location.href='admin_login.php'
    </script>
    ";
}

?>

