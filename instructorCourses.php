<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CourseWeb</title>
    <!-- Bootstrap -->
    <link rel="stylesheet"; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
    <script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <link href="css/overwrite.css" rel="stylesheet" />
    <link href="css/normalize.css" rel="stylesheet" />
    <link href="css/demo.css" rel="stylesheet" />
    <link href="css/set1.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />

    <!--------Javascript referevces ----->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="js/angular.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/bootstrap-hover-dropdown.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery_init.js"></script>
    <script src="js/layout.js"></script>
    

    <script src="js/login-soft.js"></script>
    <!-------angular references ---------->
    <script src="js/angular.js"></script>
    <script src="Scripts/course_catalog/course.js"></script>
</head>  
<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="publicpage.php"><span>CourseWeb</span></a>
            </div>
            <div class="navbar-collapse collapse">
                <div class="menu">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="instructorCourses.php">Courses</a></li>
                            <li role="presentation"><a href="instrStu.php">Students</a></li>
                        <li role="presentation"><a href="login.html">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <hr />
            <div class="col-md-6 col-md-offset-3">
                <div class="text-center">
                     <h2>Welcome <?php session_start(); echo $_SESSION['username']; ?></h2>
                    <!-- We MUST display the correct name for everyone this is a dummy code
                        that will be used till the database is set up-->
                </div>
                <hr>
            </div>
        </div>
    </div>

    <style>
        table {
            font-family: Garamond, sans-serif;
            border-collapse: collapse;
            width: auto;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
		<?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
    ?>
    </style> 
       <aside class="container-catalog100 m-r-100">
            <aside class="wrap-catalog100 m-r-500 p-l-20 p-r-20 p-t-20 p-b-20" style="width:1500px">
                <div>
                     <div class="container">
                         <h2>Your Courses</h2>
                        <div class="row" >
                                 <table class="table  table-hover margin-left:10px"> <tr>
								 <th>CRN</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Enrolled</th>
                                    </tr>
          
 <?php
            $instr=$_SESSION['username'] ;
			$fullname= mysqli_query($link,"SELECT s.fullname FROM instructors s WHERE s.username='".$instr. "'");
			
			$iname=mysqli_fetch_array($fullname);
			
            $sql_bring=mysqli_query($link,"SELECT * FROM gives g,courses c WHERE g.crn=c.crn AND c.instr='". $iname[0]."'");
     
            $myarr=array();
            while($row = mysqli_fetch_array($sql_bring))
            {
              array_push($myarr,$row);
            }
            $myarray_length=count($myarr);
            $_SESSION['array_length']=$myarray_length;
            for($i=0;$i<$myarray_length;$i++)
            {
              echo "<tr>";
              echo "<td>". $myarr[$i]['crn']. "</td>"."<td>". $myarr[$i]['ccode']. "</td>";
              echo "<td>". $myarr[$i]['cname']. "</td>"."<td>". $myarr[$i]['reg']. "</td>";
              echo "</tr>";}
                ?>
                                 </table>   
                            </div>
                 
              <div class="row">
                  <div class="col-sm-6" text-align:"center">
                    <h2>Add New Course</h2>

                    <form class="form-horizontal" method="post">
					 <div class="form-group">
                            <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                            <label class="control-label col-sm-2">CRN:</label></span>
                            <div class="col-xs-8">
                                <input type="text" class ="form-control" name="crn" id="crn">

                            </div>
                            <br><br>
                        </div> 
                        <div class="form-group">
                            <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                            <label class="control-label col-sm-2">Course Code:</label></span>
                            <div class="col-xs-8">
                               <input type="text" name="ccode" class ="form-control">

                            </div>
                            <br><br>
                        </div> 
						<div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Subject:</label></span>
					<div class="col-xs-8">
						<input type="text" name="subject" class ="form-control">
					</div><br><br>
				</div>
                        <div class="form-group">
                            <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                            <label class="control-label col-sm-2">Course Name</label></span>
                            <div class="col-xs-8">
                               <input type="text" name="cname" class ="form-control">
                            </div><br><br>
                        </div>
                        <div class="form-group">
                            <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                            <label class="control-label col-sm-2">Course Info:</label></span>
                            <div class="col-xs-8">
                                <input type="text" name="cinfo" class ="form-control">
                            </div><br><br><br><br>
                        </div>
                        <div class="form-group">
                            <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                            <label class="control-label col-sm-2">Level:</label></span>
                       
                            <select name="level">
                                <option value="Undergraduate" >Undergrad</option>
                                <option value="Graduate">Graduate</option>
                            </select>
                        
                        </div><br>
                        <div class="form-group">
                            <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                            <label class="control-label col-sm-2">Capacity:</label></span>
                            <div class="col-xs-8">
                                 <input type="text" name="capacity" class ="form-control">
                            </div><br><br>
                        </div>
						
				<div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Credit:</label></span>
					<div class="col-xs-8">
						<input class="form-control" name="credit">
					</div><br><br>
				</div>
				<div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Credit Requisite:</label></span>
					<div class="col-xs-8">
						<input class="form-control" name="creditreq">
					</div><br><br>
				</div>
                   <div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Time(1):</label></span>
					<div class="col-xs-8">
						<input class="form-control" name="time1" >
					</div><br><br>
				</div>
		
				<div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Room(1):</label></span>
					<div class="col-xs-8">
						<input class="form-control" name="room1">
					</div><br><br>
				</div>
					<div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Day(1):</label></span>
					<div class="col-xs-8">
						<input class="form-control" name="day1">
					</div><br><br>
				</div>
				<div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Time(2):</label></span>
					<div class="col-xs-8">
						<input class="form-control" name="time2">
					</div><br><br>
				</div>
				<div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Room(2):</label></span>
					<div class="col-xs-8">
						<input class="form-control" name="room2">
					</div><br><br>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn"name="ADD">Add Course</button>
                        </div></div>
						<div class="form-group">
					<span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
					<label class="control-label col-sm-2">Day(2):</label></span>
					<div class="col-xs-8">
						<input class="form-control" name="day2">
					</div><br><br>
				</div></div>
						<?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
  if(isset($_POST['ADD'])){//to run PHP script on submit 
  if(empty($_POST['crn']) || empty($_POST['subject']) || empty($_POST['ccode']) || empty($_POST['cname']))
	{                 
		echo $_POST['crn'];
		echo "<script>alert('At least one of the necessary fields were empty.');</script>";
	}
	else{
		
	$crn = $_POST['crn'];
	$cname = $_POST['cname'];
	$ccode = $_POST['ccode'];
	$subject = $_POST['subject'];
	$time1 = $_POST['time1'];
	$time2 = $_POST['time2'];
	$room1 = $_POST['room1'];
	$room2 = $_POST['room2'];
	$credit = $_POST['credit'];
	$creditreq = $_POST['creditreq'];
	$faculty = $_POST['faculty'];
	$level = $_POST['level'];
	$capacity = $_POST['capacity'];
	$cinfo = $_POST['cinfo'];
	$day1=$_POST['day1'];
	$day2=$_POST['day2'];
	if(empty($time1) && empty($room1)&&empty($day1))
	{
		
		$sql1 = "INSERT INTO courses (crn, cname, ccode, subject, 
										credit, creditreq, faculty, slevel, capacity,instr,cinfo) 
										VALUES ('$crn', '$cname', '$ccode', '$subject', '$credit', 
										'$creditreq', '$faculty', '$level', '$capacity', '$iname[0]','$cinfo')";	
	}
	else{
    $sql1 = "INSERT INTO courses (crn, cname, ccode, subject, time, room, day,time1, room1,day1
										credit, creditreq, faculty, slevel, capacity,instr,cinfo) 
										VALUES ('$crn', '$cname', '$ccode', '$subject', '$time1', '$room1','$day1','$time2', '$room2','$day2'
	'$credit', '$creditreq', '$faculty', '$level', '$capacity', '$iname[0]','$cinfo')";	}
   $sql2="INSERT INTO gives(crn,username) VALUES('$crn','$instr')";
   
if(mysqli_query($link,$sql1))
{
     
	if(mysqli_query($link,$sql2))
	{echo "<script>alert('Course added successfully.');</script>";}
				 else
{ $error=mysqli_error($link);
					 echo "<script>alert('ERROR:Couldn't add the course);</script>";	}	}
else {  $error1=mysqli_error($link);
					 echo "<script>alert('ERROR: Couldn't add the course');</script>";}							
	}
  }
  ?>
                        <br><br>
                    </form>
                </div>
            <form method="post" action="instrAction.php">
                  <div class="col-sm-6"><h2>Register or Drop Student</h2>
                      <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Enter first name:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="firstName" class ="form-control">

                        </div><br><br><br><br>
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Enter last name:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="lastName" class ="form-control">

                        </div><br><br><br><br>
                
                 <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Select the subject:</label></span>
                        <div class="col-xs-8">
                             <select name="subject">
							<?php for($i=0;$i<$myarray_length;$i++)
            {
              echo "<option value=". $myarr[$i]['crn'].">". $myarr[$i]['ccode']. "</option>";
              }
                ?>

</select>

                        </div><br><br>
                 <p>    </p>
                      <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name = "ADD">
                        ADD
                    </button>
					<button class="login100-form-btn" name = "DELETE">
                        DELETE
                    </button>
					</div>
           
         
                      </div>
                  </form>
                  </div>
    
      </div>
    </div>
   </div>
       
     
   
      <style>
          table, th, td {
              border: 1px solid grey;
              border-collapse: collapse;
              padding: 5px;
          }

              table tr:nth-child(odd) {
                  background-color: #f2f2f2;
              }

              table tr:nth-child(even) {
                  background-color: #ffffff;
              }
      </style>
   
      <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
      
    
   
   </aside>
   </aside> 
       <footer>
        <div class="last-div">
            <div class="container">
                <div class="row">
                    <div class="copyright" style="margin-top:50px;margin-left:300px">
                        © 2018 | <a target="_blank" href="http://bootstraptaste.com">Bootstraptaste</a>
                    </div>
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=eNno
                    -->
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <ul class="social-network" style="margin-top:50px;margin-right:390px">
                        <li><a href="https://www.facebook.com/sabanciuniv.edu/" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
                        <li><a href="https://twitter.com/sabanciu" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
                        <li><a href="https://www.linkedin.com/school/sabanci-university/" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
                    </ul>
                </div>
            </div>

            <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

        </div>
    </footer>
      
</body>
</html>