<html>
<body>	
	<?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
  
  $sql_addcourse = mysqli_query($link, "INSERT INTO courses (crn, cname, ccode, subject, 
								time, room, time1, room1, credit, creditreq, faculty, level, capacity, cinfo) 
								VALUES ('". $_POST['crn']."', '". $_POST['cname']."', '". $_POST['ccode']."', '". $_POST['subject']."', 
								'". $_POST['time1']."', '". $_POST['room1']."', '". $_POST['time2']."', '". $_POST['room2']."', 
								'". $_POST['credit']."', '". $_POST['creditreq']."', '". $_POST['faculty']."', '". $_POST['level']."', 
								'". $_POST['capacity'].", ". $_POST['cinfo']."')");
	$s_sid=mysqli_fetch_array($sql_addcourse);

    ?> 
 </body>
</html>

 