<?php 
$studentid=$_REQUEST['studentid'];
$conn=mysqli_connect("localhost","root","","attendance");
date_default_timezone_set("Asia/Manila");


if ($studentid!=="") 
{
	$query=mysqli_query($conn,"SELECT * from student_info where StudentId='$studentid'");
	$row = mysqli_fetch_array($query);
	$date_today=date("l");
	$section=$row['section'];
	echo "<script> console.log(".$date_today.")</script>";

	if (!empty($section)) 
	{
		$query_sched="SELECT * from schedule where section='$section' AND day='$date_today'";


		$result3 = $conn -> query($query_sched);


		if ($result3 -> num_rows > 0) 
		{
			while ($row_sched = $result3 -> fetch_assoc()) 
			{
				$time_sched=$row_sched["time"];
				$subject_sched=$row_sched["subject"];
				$day_sched=$row_sched["day"];
				$teacher_sched=$row_sched["teacher"];
				$room_no=$row_sched["room"];
				
				


				echo "<tr>";
				echo "<td>";
				echo "<label>";
				echo $time_sched;
				echo "</label>";
				echo "</td>";

				echo "<td>";
				echo "<label>";
				echo $subject_sched;
				echo "</label>";
				echo "</td>";

				echo "<td>";
				echo "<label>";
				echo $day_sched;
				echo "</label>";
				echo "</td>";

				echo "<td>";
				echo "<label>";
				echo $teacher_sched;
				echo "</label>";
				echo "</td>";

				echo "<td>";
				echo "<label>";
				echo $room_no;
				echo "</label>";
				echo "</td>";
				
				
				
				

				echo "</tr>";




			}
		}

	}


}







 ?>