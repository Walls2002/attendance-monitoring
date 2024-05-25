<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<title>Student Attendance Checker | VMC</title>
	<link rel="icon" type="icon" href="../../img/logo-vmc.png">
	<link rel="stylesheet" type="text/css" href="../../css/font.css">
	<link rel="stylesheet" type="text/css" href="../../css/teacher.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<div class="teacher-main">
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
			
			<div class="attendance">
				<h2>Student Attendance</h2>
				<?php 
					session_start();
					$user=$_SESSION['user-teacher'];
					$pass=$_SESSION['pass-teacher'];
					$conn=mysqli_connect("localhost","root","","attendance");

					$query=mysqli_query($conn,"SELECT * from teacher where username='$user' and password='$pass' ");
					$row1 = mysqli_fetch_array($query);
				?>
				
				<div class="attendance-table">
					
					<script>
							function updateTable() 
							{
  								let input, filter, table, tr,tr2, td,td2, i, txtValue,txtValue2;

  								input = document.getElementById("search-field");
  								filter = input.value.toUpperCase();
  								table = document.getElementById("search-table");
  								tr = table.getElementsByTagName("tr");
  								tr2 = table.getElementsByTagName("tr");
  								tr3 = table.getElementsByTagName("tr");
  								tr4 = table.getElementsByTagName("tr");
 
  									for (i = 0; i < tr.length; i++) 
  									{
   										  td = tr[i].getElementsByTagName("td")[0];
   										  td2 = tr2[i].getElementsByTagName("td")[1];
   										  td3 = tr3[i].getElementsByTagName("td")[2];
   										  td4 = tr4[i].getElementsByTagName("td")[3];

    										if (td||td2||td3||td4) 
   											 {
    											  txtValue = td.textContent || td.innerText;
    											  txtValue2 = td2.textContent || td2.innerText;
    											   txtValue3 = td3.textContent || td3.innerText;
    											  txtValue4 = td4.textContent || td4.innerText;
     											if (txtValue.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1||txtValue3.toUpperCase().indexOf(filter) > -1||txtValue4.toUpperCase().indexOf(filter) > -1)
     											{
       													 tr[i].style.display = "";
       													 tr2[i].style.display = "";
       													 tr3[i].style.display = "";
       													 tr4[i].style.display = "";
      											} 
     											else 
      											{
       													 tr[i].style.display = "none";
       													 tr2[i].style.display = "none";
       													 tr3[i].style.display = "none";
       													 tr4[i].style.display = "none";			 
      											}
   											 }       
  									}
								}
						</script>
						<div>
							<h3 style="margin-bottom: 20px;"><?php echo  "Good Day! Teacher ".$row1['name']; ?></h3>
							<h4 style="font-weight: lighter;"><?php echo "Date today: ".$today=date("F d, Y"); ?></h4>
							<br>
						</div>
				<label>Search Student: </label><input onkeyup="updateTable()"id="search-field" type="text" name="" placeholder="Student Name/Section/Date">
						<table id="search-table">
							<div>
								
							<form action="" method="POST">
								<h4>Section</h4>
								<input type="radio" id="raio1" name="sec" value="<?php echo $row1['sec1']; ?> ">
								<label> <?php echo $row1['sec1']; ?></label>
								<br>
								<input type="radio" id="radio2" name="sec" value="<?php echo $row1['sec2']; ?>">
								<label> <?php echo $row1['sec2']; ?></label>
								<br>
								<input type="radio" id="radio3" name="sec" value="<?php echo $row1['sec3']; ?>">
								<label> <?php echo $row1['sec3']; ?></label>
							</form>
						</div>
							<h4 style="color:rgb(0,204,0);"><?php if (!empty($_SESSION['msg_attend']))
							{
								echo $_SESSION['msg_attend'];
								$_SESSION['msg_attend']="";
							} ?>
								
							</h4>
							<thead>
								<th><label>Name</label></th>
								<th><label>Section</label></th>
								<th><label>Course</label></th>
								<th><label>Time In</label></th>
								<th><label>Action</label></th>
							</thead>
							
							
							<tbody id="schedule-table">
								
							</tbody>

							<script>
								

							$('input[type=radio]').click(function(e) 
							{	

								var val = $(this).val(); 
     						   
     						   var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function()
					{
							if (this.readyState== 4 && this.status == 200) 
						{
							console.log(val);
							document.getElementById("schedule-table").innerHTML = this.responseText;		
						}	
					};
					xmlhttp.open("GET","attendance_list_fetch.php?section="+val,true);
					xmlhttp.send();
   							 });


							</script>
						</table>
				</div>
			</div>


	</div>

				


</body>
</html>