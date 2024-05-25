		<?php
		session_start();
		
		    $conn=mysqli_connect("localhost","root","","attendance");
			$dlt=$_GET['sd'];
			$day=$_GET['day'];
			$date=$_GET['date'];
			$name=$_GET['name'];



			$query="DELETE FROM attendance_list where day='$day' and StudentID='$dlt' and time_in='$date'";
			$result=mysqli_query($conn,$query);
			if ($result) 
			{
				$_SESSION['msg_attend']="Successfully Deleted ".strtoupper($name);
				header("location:teacher_dashboard.php");
			}
			else
			{
				alert("Error Delete");
			}	 

			
			

			
	 	
?>
	





