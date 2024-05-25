<?php
session_start();
$studentid=$_REQUEST['studentid'];
$conn=mysqli_connect("localhost","root","","attendance");

if ($studentid!=="") 
{
	$query=mysqli_query($conn,"SELECT * from student_info where StudentId='$studentid' ");
	$row = mysqli_fetch_array($query);


	$name= $row['firstname']." ".$row['middlename']." ".$row['lastname'];
	$course=$row['course'];
	$section=$row['section'];
	date_default_timezone_set("Asia/Manila");
	$time=date("h:i:s A | F d, Y l");
	$day=date("l");
	$today=date("F d, Y");
	
	if (!empty($name)&&!empty($course)&&!empty($section)&&!empty($time)) 
	{
		$query_add_list=mysqli_query($conn,"INSERT INTO `attendance_list`(`StudentID`,`name`, `course`, `section`, `time_in`,`day`,`today`) VALUES ('$studentid','$name','$course','$section','$time','$day','$today')");
		$_SESSION['section']=$section;
	}
}

$result=array("$name","$course","$section","$time","$studentid");
$myJSON = json_encode($result);
echo $myJSON;
 ?>