<?php
session_start();
include("db_config.php");

$student_prn1 = $_REQUEST['student_prn'];
$conn = new mysqli(HOST,USER,PASS,DB);
if($student_prn1 == ""){
    $sql = mysqli_query($conn,"SELECT * from student_table where student_prn = '$student_prn1' "); 
    $row = mysqli_fetch_array($sql);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $branch = $row['branch'];
    $year = $row['year'];    
    $phone_number = $row['phone_number'];
    $email = $row['email'];                    
}   
$result = array ("$first_name", "$last_name","$branch","$year","$phone_number",$email);             
$myJSON = json_encode($result);
echo $myJSON;
?>