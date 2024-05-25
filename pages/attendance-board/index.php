<?php
session_start();
$conn=mysqli_connect("localhost","root","","attendance");
?>


<!DOCTYPE html>
<html onmouseover="setFocus(event);"  onclick="setFocus(event);">
<head>
	<meta charset="utf-8">
	<title>Attendance Board | VMC</title>
	<link rel="icon" type="icon" href="../../img/logo-vmc.png">
	<link rel="stylesheet" type="text/css" href="../../css/font.css">
	<link rel="stylesheet" type="text/css" href="../../css/attendance-board.css">
</head>
<body onload="setFocus(event);">
	<script>
	function stopEvent(e) 
		{
  			 e.stopPropagation();
   			 e.preventDefault();
   			 return false;    
		}
	function setFocus(e) 
		{
   			document.getElementById("studentid").focus();
   			return stopEvent(e);
		}
	</script>
		<div class="attendance-main">
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

			<div class="attendance-sub">
				<section class="sec1">
					<div class="table-profile">
						<div class="profile-image">

							<img id="face-image" >
						</div>
						<div class="profile">
							<table >
								<form action="" method="POST">
									<tr>
									<td><label>Student ID:</label></td>
									<td>
										<input autofocus oninput=" var name=this.value; if(name.length>=14){GetDetail(this.value);}" class="textField" id="studentid" type="text" name="studentid" placeholder="Student-ID">
									</td>
								</tr>
								<tr>
									<td  class="first-td"><label>Name:</label></td>
									<td><label id="name"></label></td>
								</tr>
								<tr>
									<td><label>Course:</label></td>
									<td><label id="course"></label></td>
								</tr>
								<tr>
									<td><label>Section:</label></td>
									<td><label  id="year"></label></td>
								</tr>
								<tr>
									<td><label>Time in:</label></td>
									<td><label  id="time"></label></td>
								</tr>
								</form>
								
								
							
							</table>
						</div>
					</div>
						
					<div class="schedule">
						<table>
							<thead>
								<th><label>Time</label></th>
								<th><label>Subject</label></th>
								<th><label>Day</label></th>
								<th><label>Teacher</label></th>
								<th><label>Room No.</label></th>
								


							</thead>
							
							<tbody id="schedule-table"></tbody>
							
						</table>
					</div>
				</section >

				<section class="sec2">
					<div class="announce-board">
						<h2>Announcements</h2>
						
					</div>
				</section>
				<section>
					
				</section>
			</div>
		</div>

		<script>
			function GetDetail(str)
			{
				
				if (str.length ==0) 
				{
					document.getElementById("name").innerHTML="";
					document.getElementById("course").innerHTML="";
					document.getElementById("year").innerHTML="";
					return;
				}
				else
				{	
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function()
					{
						if (this.readyState== 4 && this.status == 200) 
						{
							var myObj = JSON.parse(this.responseText);
							
							document.getElementById("name").innerHTML=myObj[0];
							document.getElementById("course").innerHTML=myObj[1];
							document.getElementById("year").innerHTML=myObj[2];
							document.getElementById("time").innerHTML=myObj[3];

						
								

							var image1="../../img/img-student/";
							var main_img=myObj[4];
							var image2=".jpg";
							var ttl= image1.concat(main_img,image2);

							document.getElementById("face-image").src=ttl;
							document.getElementById("studentid").value="";
							console.log (myObj[0]);	
						}
						else
						{
							document.getElementById("studentid").value="";
						}
						
					};
					xmlhttp.open("GET","search.php?studentid="+str,true);
					xmlhttp.send();
						

					var xmlhttp2= new XMLHttpRequest();

					xmlhttp2.onreadystatechange = function()
					{
						if (this.readyState== 4 && this.status == 200) 
						{
								document.getElementById("schedule-table").innerHTML = this.responseText;
						}

						
					};
					xmlhttp2.open("GET","sched.php?studentid="+str,true);
					xmlhttp2.send();

			}



		}
			
		</script>
</body>
</html>