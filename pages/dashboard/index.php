<?php 
session_start();
$conn=mysqli_connect("localhost","root","","attendance");

$sql = "SELECT * FROM student_info";
$result = $conn -> query($sql);

$sql_attend = "SELECT * FROM attendance_list";
$result_attend = $conn -> query($sql_attend);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard | Admin</title>
	<link rel="icon" type="icon" href="../../img/logo-vmc.png">
	<link rel="stylesheet" type="text/css" href="../../css/font.css">
	<link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
</head>
	<body >

		<div class="dashboard-main">
			<div class="nav">
				<div>
					<img class="nav-logo" src="../../img/logo-vmc1.png">
				</div>
				<div class="nav-time" id="date">
					<script>
						  document.write(new Date().toDateString()); 
					</script>
				</div>
			</div>
			<h4  style="float: right;margin-right: 20px;margin-top: 20px;"><a class="logout" href="../../">logout</a></h4>
			<h4  style="float: right;margin-right: 20px;margin-top: 20px;"><a class="logout" target="_blank" href="../attendance-board">Go to Attendance dashboard</a></h4>
			<h2 style="text-align: center; margin-bottom: 30px;margin-top: 20px;">Admin Dashboard</h2>
			<div class="sub-main">
				<?php 
						if (isset($_POST['submit'])) 
						{	
								$studentid=$_POST['studentid'];
								$studentid=strtoupper($studentid);
								$firstname=$_POST['firstname'];
								$middlename=$_POST['middlename'];
								$lastname=$_POST['lastname'];
								$section=$_POST['section'];
								$course=$_POST['course'];
								$email=$_POST['email'];
								$message="";
									if (empty($studentid)||empty($firstname)||empty($lastname)||empty($section)||empty($course)) 
									{
										$message='<h2 style="color:rgb(177,0,0);text-decoration: underline;">Enter All Fields</h2>';
									}

									else
									{
										$sql2="SELECT * from student_info where StudentId='$studentid'";
										$result2=mysqli_query($conn,$sql2);
										$count=mysqli_num_rows($result2);
										if ($count>=1) 
										{
											$message='<h2 style="color:rgb(177,0,0);text-decoration: underline;">Already Exist</h2>';
										}
										else
										{
											$sql1="INSERT INTO `student_info`(`StudentId`, `firstname`, `middlename`, `lastname`, `section`, `course`, `email`) VALUES ('$studentid','$firstname','$middlename','$lastname','$section','$course','$email')";

											$result1= mysqli_query($conn,$sql1);
											if ($result1) 
        									{
            									$message = '<h2 style="color:rgb(177,0,0)">Added Successfully</h2>';
        									} 
										}	
									}	
							}
							if (isset($_POST["edit"])) 
							{
								
							}


					 ?>
				<div class="add-student">
					<div class="add-student-title">

						<h2>Add Student Master List</h2>
						
						<?php if (!empty($message)) 
						{		
							echo $message;

						} ?>
					</div>	
					
					
						<form method="POST" action="">
							<table>
								<tr>
									<td><label>Student ID </label><td><input style="text-transform: uppercase;" type="text" name="studentid" placeholder="Student ID"></td></td>
									
								</tr>
								<tr>
									<td><label>First Name </label></td>
									<td><input type="text" name="firstname" placeholder="First Name"></td>
								</tr>
								<tr>
									<td><label>Middle Name </label></td>
									<td><input type="text" name="middlename" placeholder="Middle Name"></td>
								</tr>
								<tr>
									<td><label>Last Name </label></td>
									<td><input type="text" name="lastname" placeholder="Last Name"></td>
								</tr>

								<tr>
									<td><label>Course </label></td>
									<td><!--<input type="text" name="course" placeholder="Course">-->
										<select name="course">
											<option value="">--SELECT--</option>
											<option value="BSBA">BSBA</option>
											<option  value="BSHM">BSHM</option>
											<option value="BSTM">BSTM</option>
											<option value="BSIS">BSIS</option>
											<option value="BSEd">BSEd</option>
											<option value="BSNEd">BSMEd</option>
											<option value="BEED">BEED</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Section </label></td>
									<td><!--<input type="text" name="section" placeholder="Section">-->
										<select name="section">
											<option  value="">--SELECT--</option>
											<option value="BSBA">BSBA-1</option>
											<option  value="BSHM">BSHM-1</option>
											<option value="BSTM">BSTM-1</option>
											<option value="IS-1">BSIS-1</option>
											<option value="BSEd">BSEd-1</option>
											<option value="BSNEd">BSMEd-1</option>
											<option value="BEED">BEED-1</option>
										</select>
									</td>
								</tr>
								
								<tr>
									<td><label>Email </label></td>
									<td><input type="text" name="email" placeholder="Email"></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="Submit" name="submit"></td>
								</tr>
							</table>
						</form>
					
				</div>

				<div class="student-table">
					<div class="table-title">
						<h2>Student Master List <label style="font-size: 15px;font-weight:lighter;color:rgb(0,204,0);"><?php  if(!empty($_SESSION['msg'])){echo $_SESSION['msg'];$_SESSION['msg']="";} ?></label></h2>
						
						<input class="search-box" id="search-field" onkeyup="updateTable()" type="text" name="search" placeholder="Search Student">
					</div>	

						<script>
							function updateTable() 
							{
  								let input, filter, table, tr,tr2, td,td2, i, txtValue,txtValue2;

  								input = document.getElementById("search-field");
  								filter = input.value.toUpperCase();
  								table = document.getElementById("search-table");
  								tr = table.getElementsByTagName("tr");
  								tr2 = table.getElementsByTagName("tr");
 
  									for (i = 0; i < tr.length; i++) 
  									{
   										 td = tr[i].getElementsByTagName("td")[0];
   										 td2 = tr2[i].getElementsByTagName("td")[1];
    										if (td||td2) 
   											 {
    											  txtValue = td.textContent || td.innerText;
    											  txtValue2 = td2.textContent || td2.innerText;
     											if (txtValue.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1)
     											{
       													 tr[i].style.display = "";
       													 tr2[i].style.display = "";
      											} 
     											else 
      											{
       													 tr[i].style.display = "none";
       													 tr2[i].style.display = "none";
       													 
      											}
   											 }       
  									}
								}
						</script>
					
					
					<table id="search-table" class="search-table">
						<thead >
							<th>Student ID</th>
							<th>Name</th>
							<th>Section</th>
							<th>Course</th>
							<th>Email</th>
							<th>Action</th>
						</thead>
						<tbody>
							<?php
								

                			if ($result -> num_rows > 0) 
                			{
                    			while ($row = $result -> fetch_assoc()) 
                    		{
                    			
            				?>
							<tr id="row-<?php echo $row["id"]; ?>">
								<td class="student-color"><span><?php echo $row["StudentId"]; ?></span></td>
								<td><span><?php echo $row["firstname"]." ".$row["middlename"]." ".$row["lastname"] ; ?></span></td>
								<td><span><?php echo $row["section"]; ?></span></td>
								<td><span><?php echo $row["course"]; ?></span></td>
								<td><span><?php echo $row["email"]; ?></span></td>
								<td><button class="btn" onclick="if(confirm('Please confirm deletion')){window.location='modify-data.php?sd=<?=$row["StudentId"]?>'}" >Delete </button></td>

							
							</tr>
							<?php
							
                    		}
							
                			}
                			
                			?>
            				<script>
									document.querySelectorAll(".search-table span").forEach(function(node)
									{
											
									node.addEventListener('dblclick', function (e) {
										
									var val=this.innerHTML;
									var input=document.createElement("input");
									input.value=val;
									input.style.cssText="height:20px;width:100%;background-color:transparent;outline:none;border:none";
									input.onblur=function()
									{
										var val=this.value;
										this.parentNode.innerHTML=val;
									}
									this.innerHTML="";
									this.appendChild(input);
									input.focus();
									});
								});



								</script>
						</tbody>

					</table>
					
				</div>
				
				
			</div>
			<div class="attendance-table">
				<script>
							function updateTable1() 
							{
  								let input, filter, table, tr,tr2, td,td2, i, txtValue,txtValue2;

  								input = document.getElementById("search-field1");
  								input2 = document.getElementById("date-search");
  								filter = input.value.toUpperCase();
  								filter2 = input2.value.toUpperCase();

  								table = document.getElementById("search-table1");
  								tr = table.getElementsByTagName("tr");
  								tr2 = table.getElementsByTagName("tr");
  								tr3 = table.getElementsByTagName("tr");

  								
  									for (i = 0; i < tr.length; i++) 
  									{

   										 td = tr[i].getElementsByTagName("td")[0];
   										 td2 = tr2[i].getElementsByTagName("td")[1];
   										  td3 = tr3[i].getElementsByTagName("td")[2];
   										  
    										if (td||td2||td3) 
   											 {
    											  txtValue = td.textContent || td.innerText;
    											  txtValue2 = td2.textContent || td2.innerText;
    								   		      txtValue3 = td3.textContent || td3.innerText;
    											    
     											if (txtValue.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1||txtValue3.toUpperCase().indexOf(filter) > -1 )
     											{
       													 tr[i].style.display = "";
       													 tr2[i].style.display = "";
       													 tr3[i].style.display = "";			
      											}
     											else 
      											{
       													 tr[i].style.display = "none";
       													 tr2[i].style.display = "none";
       													 tr3[i].style.display = "none";		 
      											}
   											 }
  									}
  								/*	for (var j = 0 ; j < tr.length; j++) 
  									{	
  										tr4 = table.getElementsByTagName("tr");
  										td4 = tr4[j].getElementsByTagName("td")[3];

  										if (td4) 
  										{
  											 txtValue4 = td4.textContent || td4.innerText;
  											 if (txtValue4.toUpperCase().indexOf(filter2) > -1) 
  											 {
  											 	 tr4[j].style.display = "";
  											 	 
  											 }
  											 else
  											 {
  											 	tr4[j].style.display = "none";
  											 }
  										}
  									}*/
								}
								function updateTable2()
								{
									let input2, filter2, table, tr,tr2, td,td2, i, txtValue,txtValue2;
									input2 = document.getElementById("date-search");
  									
  									filter2 = input2.value.toUpperCase();
  									table = document.getElementById("search-table1");
  									tr4 = table.getElementsByTagName("tr");
										for (var j = 0 ; j < tr4.length; j++) 
  									{	
  										td4 = tr4[j].getElementsByTagName("td")[3];

  										if (td4) 
  										{
  											 txtValue4 = td4.textContent || td4.innerText;
  											 if (txtValue4.toUpperCase().indexOf(filter2) > -1) 
  											 {
  											 	 tr4[j].style.display = "";
  											 	 
  											 }
  											 else
  											 {
  											 	tr4[j].style.display = "none";
  											 }
  										}
  									}
								}
						</script>
						
				<div class="search-sec">
					<h2>Over all Attendance</h2>
					<script>
					/*	function updateTable2()
						{
							let input, filter, table, tr, td, i, txtValue;
							input = document.getElementById("date-search");
  								
  								table = document.getElementById("search-table1");
  								tr = table.getElementsByTagName("tr");

  								

						} */

					</script>
					<?php 

						$month = date('F');
						$day = date('d');
						$year = date('Y');

						$today = $month . ' ' . $day.', '.$year ;
						?>
						<label>Search Student:<input class="search-bar" onkeyup="updateTable1();"id="search-field1" type="text" name="" placeholder="Student Name/Section/Date"> </label>
						<label>Date: <input id="date-search" onkeyup="updateTable2();"  placeholder="Date" value="" type="text" name=""></label>
					</div>
				<div class="attendance-table-sub">				
					<table id="search-table1">

							<thead>
								<th><label>Name</label></th>
								<th><label>Section</label></th>
								<th><label>Course</label></th>
								<th><label>Time In</label></th>
							</thead>
							<tbody>
								<?php 
								if ($result_attend -> num_rows > 0) 
                			{
                    			while ($row1 = $result_attend-> fetch_assoc()) 
                    			{	
            				?>
									<tr>
										<td><?php echo $row1["name"]; ?></td>
										<td><?php echo $row1["section"]; ?></td>
										<td><?php echo $row1["course"]; ?></td>
										<td><?php echo $row1["time_in"]; ?></td>
									</tr>
							<?php
                    			}
							
                			}	
            				?>

							</tbody>
						</table>
				</div>
					
			</div>


			<footer>
				
			</footer>
		</div>
	</body>
</html>