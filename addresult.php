<?php
   include 'dbconnect.php';
   include 'validate.php';
   session_start();
   

   if(isset($_SESSION['loggedin'])){

       function mark_check($obmark,$outmark){
           if($obmark<=$outmark){
               return true;

           }
           else false;
       }
       function id_check($id,$code,$final_semester){
             include 'dbconnect.php';
             $sql = "select count(student_f_id) as total,Course_code,
             semester from result where student_f_id = '$id' 
             && Course_code = '$code' && semester = '$final_semester'";
             $r = mysqli_query($conn,$sql);
                $total  = mysqli_fetch_assoc($r);
               
                if($total['total']+1>1){
                    return false;
                }
                else{
                    return true;
                }

       }
       function isidexist($id){
        include 'dbconnect.php';
        $sql = "select student_f_id
        from student where student_f_id = '$id' 
        ";
        $r = mysqli_query($conn,$sql);
          
          
           if(mysqli_num_rows($r)>0){
               return true;
           }
           else{
               return false;
           }

       }
       function course_exist($id,$c_code){
        include 'dbconnect.php';
        $sql = "select student_f_id,Course_code,gpa
        from result where student_f_id = '$id' and Course_code = '$c_code'
        ";
        $r = mysqli_query($conn,$sql);
          
        
           if(mysqli_num_rows($r)>0){
              return true;
           }
           else{
               return false;
           }

       }
       function retake($id,$c_code,$grade_point){
        include 'dbconnect.php';
        $sql = "select student_f_id,Course_code,gpa
        from result where student_f_id = '$id' and Course_code = '$c_code'
        ";
        $r = mysqli_query($conn,$sql);
          $flag = 0;
          
           if(mysqli_num_rows($r)>0){
             while($row = mysqli_fetch_assoc($r))
             {
                 if($grade_point>$row['gpa'])
                 {
                     $flag = 1;
                 }
             }
             return $flag;
           }
           else{
               return $flag;
           }

       }
       function grade_point($marks){
           if($marks>=97 && $marks<=100)
           {
               return 4.00;
           } 
           else if($marks>=90 && $marks<97)
           {
                return 4.00;
           }
           else if($marks>=87 && $marks<90)
           {
               return 3.70;
           }
           else if($marks>=83 && $marks<87)
           {
               return 3.30;
           }
           else if($marks>=80 && $marks<83)
           {
               return 3.00;
           }
           else if($marks>=77 && $marks<80)
           {
               return 2.70;
           }
           else if($marks>=73 && $marks<77)
           {
               return 2.30;
               
           }
           else if($marks>=70 && $marks<73)
           {
               return 2.00;
           }
           else if($marks>=67 && $marks<70)
           {
               return 1.70;
           }
           else if($marks>=63 && $marks<67)
           {
                return 1.30;   
           }
           else if($marks>=60 && $marks<63)
           {
               return 1.00;
           }
           else if($marks<60)
           {
               return 0.00;
           }
       }
       function later_grade($later_grade,$mark){
        if($later_grade == 4.00 && $mark >=97)
        {
            return "A+";
        } 
        else if($later_grade == 4.00)
        {
             return "A";
        }
        else if($later_grade == 3.70)
        {
            return "A-";
        }
        else if($later_grade == 3.30)
        {
            return "B+";
        }
        else if($later_grade == 3.00)
        {
            return "B";
        }
        else if($later_grade == 2.70)
        {
            return "B-";
        }
        else if($later_grade == 2.30)
        {
            return "C+";
            
        }
        else if($later_grade == 2.00)
        {
            return "C";
        }
        else if($later_grade == 1.70)
        {
            return "C-";
        }
        else if($later_grade == 1.30)
        {
             return "D+";   
        }
        else if($later_grade == 1.00)
        {
            return "D";
        }
        else if($later_grade == 0.00)
        {
            return "F";
        }
       }
       function makesemesterno($sem){
        $endp = strlen($sem)-4;
        $semester = substr("$sem",0,$endp);
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
      if(isset($_POST['Add']))
      {  $id = $_POST['id']; 
         $c_code =  $_SESSION['course_code'];
         $quiz = $_POST['quiz'];
         $c_work = $_POST['c_work'];
         $mid_1 = $_POST['mid1'];
         $mid2 = $_POST['mid2'];
         $final = $_POST['final'];
         $final_semester =  $_SESSION['semester'];
         $total = $quiz+$c_work+$mid_1+$mid2+$final;
         $semesterinNo = Makesemesterno($_SESSION['semester']);
         if($total<=100){
            
            $check = "SELECT * FROM `mark_distribution` WHERE Course_code = '$c_code' && semester = '$final_semester'";
            $r = mysqli_query($conn,$check);
            if(mysqli_num_rows($r)>0)
            {
                 
                $row = mysqli_fetch_assoc($r);
                if(isidexist($id)&& !course_exist($id,$c_code)&&id_check($id,$c_code,$final_semester)&&mark_check($quiz, $row['quiz']) && mark_check($c_work, $row['classwork']) && mark_check($mid_1, $row['mid1']) && mark_check($mid2, $row['mid2']) && mark_check($final, $row['final'])){
                    //$total_mark = $row['quiz']+$row['classwork']+$row['mid1']+$row['mid2']+$row['final'];
                    $grade_point = grade_point($total);
                    $later_grade = later_grade($grade_point,$total);
                    $sql = "INSERT INTO `result`(`result_id`, `student_f_id`, `Course_code`,
                     `semester`, `semesterinno`,`quiz`, `classwork`, 
                    `mid1`, `mid2`, `final`, `gpa`, `grade`) VALUES
                     (null,'$id','$c_code','$final_semester','$semesterinNo',
                     '$quiz','$c_work','$mid_1','$mid2',
                     '$final','$grade_point','$later_grade')";
                     if(mysqli_query($conn,$sql)){
                        $_SESSION['success'] = "added";
                        header("location: Add_result.php");
                    }
                }
                else if(isidexist($id)&& course_exist($id,$c_code)&&id_check($id,$c_code,$final_semester)&&mark_check($quiz, $row['quiz']) && mark_check($c_work, $row['classwork']) && mark_check($mid_1, $row['mid1']) && mark_check($mid2, $row['mid2']) && mark_check($final, $row['final']))
                {
                    $grade_point = grade_point($total);
                    $later_grade = later_grade($grade_point,$total);
                     $flag = retake($id, $c_code, $grade_point);
                     if($flag == 1){
                       
                        $sql = "UPDATE `result` SET `student_f_id`='$id',
                        `Course_code`='$c_code',`semester`='$final_semester',
                        `semesterinno`='$semesterinNo',`quiz`='$quiz',
                        `classwork`='$c_work',`mid1`='$mid_1',
                        `mid2`='$mid2',`final`='$final',
                        `gpa`='$grade_point',`grade`='$later_grade' WHERE student_f_id = '$id' and Course_code = '$c_code'";
                         if(mysqli_query($conn,$sql)){
                            $_SESSION['success'] = "added";
                            header("location: Add_result.php");
                        }
                     }
                     else{
                        echo"<script>
                        alert('No need to change this result');
                        window.location.href='Add_result.php'
                        </script>;";
                     }

                    
                }
                else{
                    if(!isidexist($id)){
                        echo"<script>
                        alert('Wrong id!!');
                        window.location.href='Add_result.php'
                        </script>;";
                    }
                    if(!id_check($id,$c_code,$final_semester))
                    {
                        echo"<script>
                        alert('You have already enter this course in this semester for this student');
                        window.location.href='Add_result.php'
                        </script>;";
                    }
                    if(!mark_check($quiz, $row['quiz'])){
                        echo"<script>
                        alert('invalid marks quiz');
                        window.location.href='Add_result.php'
                        </script>;";
                    }
                    if(!mark_check($c_work, $row['classwork'])){
                        echo"<script>
               alert('invalid marks class work');
               window.location.href=' Add_result.php'
               </script>;";
                    }
                    if(!mark_check($mid_1, $row['mid1'])){
                        echo"<script>
               alert('invalid marks mid 1');
               window.location.href='Add_result.php'
               </script>;";
                    }
                    if(!mark_check($mid2, $row['mid2'])){
                        echo"<script>
               alert('invalid marks mid 2');
               window.location.href='Add_result.php'
               </script>;";
                    }
                    if(!mark_check($final, $row['final'])){
                        echo"<script>
               alert('invalid marks final');
               window.location.href='  Add_result.php'
               </script>;";
                    }
                }
            }
            else{
                echo"<script>
               alert('please enter the mark destribution for this course');
               window.location.href=' mark_distribution.php'
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