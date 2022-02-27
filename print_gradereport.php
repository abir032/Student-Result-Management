<?php
   include 'dbconnect.php';
  
   session_start();
  

   
   if(isset($_SESSION['sloggedin'])){
    

        $id= $_SESSION['sid'];
                        
        $cgpa = Null;
        $credit_complete = NULL;
                               
        require_once('fpdf184/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->setFont("Arial","B",8);
        $pdf->Cell(190,20,'Grade Report',0,1,'C');
        $pdf->Cell(190,20,'Student ID: '.$id,0,1,'C');                   
        
        
        $total = mysqli_query($conn,"SELECT student_f_id,semester, semesterinno,
        sum(course.credit_p_course) as total 
        FROM result NATURAL join course 
        where student_f_id='$id' GROUP by(result.semester) order by result.semesterinno asc");
                                
        $cgpa = Null;
        $credit_complete = NULL;
        while( $total_credit = mysqli_fetch_assoc($total) ){
            $semester =  $total_credit['semester'];
            $credit_complete += $total_credit['total'];
            $term_gpa = NULL;
            $sql="SELECT * FROM result NATURAL join
            course where student_f_id='$id' and semester = '$semester'";
            $result=mysqli_query($conn,$sql);   
            if(mysqli_num_rows($result) > 0)
                                 {
                                    $pdf->Cell(25,20,'Course',1,0,'C');
                                    $pdf->Cell(75,20,'Course Title',1,0,'C');
                                    $pdf->Cell(25,20,'Semester',1,0,'C');
                                    $pdf->Cell(20,20,'cr',1,0,'C');
                                    $pdf->Cell(20,20,'grade',1,0,'C');
                                    $pdf->Cell(25,20,'gp',1,1,'C');
                                 while($row=mysqli_fetch_assoc($result))
                                 {  
                                    $pdf->Cell(25,20,$row['Course_code'],1,0,'C');
                                    $pdf->Cell(75,20,$row['course_name'],1,0,'C');
                                    $pdf->Cell(25,20,$row['semester'],1,0,'C');
                                    $pdf->Cell(20,20,$row['credit_p_course'],1,0,'C');
                                    $pdf->Cell(20,20,$row['grade'],1,0,'C');
                                    $pdf->Cell(25,20,$row['gpa'],1,1,'C');
                                    $term_gpa+=($row['gpa']*$row['credit_p_course'])/$total_credit['total'];
                                    $cgpa+=($row['gpa']*$row['credit_p_course']);
                                 }
                                }
                               
                                    $pdf->Cell(60,20,'Term GPA: '.round($term_gpa,2),0,0,'C');
                                    $pdf->Cell(60,20,'CGPA: '.round($cgpa/$credit_complete,2),0,0,'C');
                                    $pdf->Cell(70,20,'Credit Complete: '.$credit_complete,0,1,'C');
                            }
                               
                $pdf->Output();
                            
                            
    
   
      
                           
       }
   else{
       echo"<h1>Page not found</h1>";
   }
   //unset($_SESSION['loggedin']);
   
?>