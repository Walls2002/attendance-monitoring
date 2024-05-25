<?php
		session_start();
		
		
		    $conn=mysqli_connect("localhost","root","","attendance");
			$dlt=$_GET['sd'];
			$query="DELETE FROM student_info where StudentId='$dlt'";
			$result=mysqli_query($conn,$query);
			$_SESSION['msg']="";

			if ($result) 
			{
				header("location:index.php");
				$_SESSION['msg']="Successfully Deleted";
			}
			else
			{
				alert("Error Delete");
			}	 
	 	
	 	
?>



