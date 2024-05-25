<?php
		$radio=$_REQUEST['section'];	

		if (!empty($radio)) 
		{
		$conn=mysqli_connect("localhost","root","","attendance");
		$today=date("F d, Y");
		$sql = "SELECT * FROM attendance_list where today='$today' and section='$radio'";
		$result = $conn -> query($sql);
								
		if ($result -> num_rows > 0) 
        {
          while ($row = $result -> fetch_assoc()) 
                {	
									

				echo "<tr>";

				echo "<td>";	
				echo $row["name"];
				echo "</td>";

				echo "<td>";
				echo $row["section"];
				echo "</td>";

				echo "<td>";
				echo $row["course"];
				echo "</td>";

				echo "<td>";
				echo $row["time_in"];
				echo "</td>";
					//action='teacher_dashboard.php?sd=".$row["StudentID"]."&day=".$row["day"]."&name=".$row["name"]."&date=".$row['time_in']."'
				echo "<td>";
				/*echo "<form action='teacher_dashboard.php' method='POST'>";

				echo "<input id='delete' type='submit' name='delete' value='Delete'>";
				echo "</form>";*/


					echo "<button class='btn' onclick=\"javascript: if(confirm('Please confirm deletion')){window.location='delete_attendance.php?sd=".$row["StudentID"]."&day=".$row["day"]."&name=".$row["name"]."&date=".$row['time_in']."'}\" >";
					echo "Delete";
					echo "</button>";
					echo "</td>";



				echo "</tr>";
							
                  }
							
         }			 	
							 
		}					 
		
                		
                			
?>