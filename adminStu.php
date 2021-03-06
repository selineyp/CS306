<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!------css references------->

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

    <!--------Javascript references ----->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/bootstrap-hover-dropdown.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery_init.js"></script>
    <script src="js/layout.js"></script>
    <script src="js/login-soft.js"></script>


    <title>Students</title>
</head>
<?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
    ?>
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
                            <li role="presentation"><a href="admin.php">Courses</a></li>
                            <li role="presentation"><a href="adminStu.php">Students</a></li>
                            <li role="presentation"><a href="adminAcc.php">Accounts</a></li>
                            <li role="presentation"><a href="login.html">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    <div class="container">
            <div class="row">
                <hr>
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
                        <h2>Welcome <?php session_start(); echo $_SESSION['username']; ?></h2> 
                        <!-- TODO: Take the username from the previous page, 
                            query database for name/surname and display here-->
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    <div class="container">     
        <div class="col-sm-6">    
                 <h2>Search Student</h2>
				  <form method="post">
                    <div style="font-family:Garamond"; font-size:"60px">
                        <div class="text-left">
						 </span>
                            <span style="font-family: Garamond; font-size: 18px; padding-top: 10px; color: navy">
							<label class="control-label col-sm-4">Select Level:</label>
                            </span>
                        <select name="level">
                            <option value="Undergraduate" >Undergraduate</option>
                            <option value="Graduate" >Graduate</option>
                        </select><br><br>
                         <span style="font-family: Garamond; font-size: 18px; padding-top: 10px; color: navy">
							<label class="control-label col-sm-4">Select Faculty:</label>
                            </span>
							<select name="faculty">
                            <option value="FENS">FENS</option>
                            <option value="FASS">FASS</option>
                            <option value="FMAN">FMAN</option>
                        </select><br><br>
                            <span style="font-family: Garamond; font-size: 18px; padding-top: 10px; color: navy">
							<label class="control-label col-sm-4">Select Major:</label>
                            </span>
                            <select name="major">
                            <option value="CS">CS</option>
                            <option value="MGMT">MGMT</option>
                            <option value="PSY">PSY</option>
							<option value="CULT">CULT</option>
							<option value="BIO">BIO</option>
							<option value="ME">ME</option>
							<option value="MAT">MAT</option>
							<option value="ECON">ECON</option>
							<option value="IE">IE</option>
                        </select><br><br>

                            <span style="font-family: Garamond; font-size: 18px; padding-top: 10px; color: navy">
							<label class="control-label col-sm-4">Name Surname:</label>
                            </span>
                            <div class="col-xs-4">
                                <input type="text" class="form-control" style="margin-left:-15px" name="fullname" method="POST">
                            </div>
							
                        </div> <br>
                    </div>
                    <div> 
                    </div>
                    <br><br>
                    <div class="container-login100-form-btn">
                        <button method="post" name='search'; style="margin-left:-250px"; class="login100-form-btn" > <!--TODO: Implement the function !!-->
                            Search
                        </button>
                    </div>
					<br>
                    <p style="font-size:10px; margin-bottom:-25px">*Select the known information only</p>
                    <p style="font-size:10px">*Student name is optional</p> 
               <br><br><br><br><br><br>

        </div> 
         
  

        <div class="col-sm-6">
		<h2>Student List</h2>
				<table class="table table-hover" style="margin-left:10px">
				<tr>
				<th>Select Student</th>
				<th>Name</th>
				<th>Username</th>
				<th>SID</th>
				</tr>

				  <?php
				   if(isset($_POST['search'])){
					 $maj=$_POST['major'];
					 $fac=$_POST['faculty'];
					 $lev=$_POST['level'];
					 $fname=$_POST['fullname'];
					 
					if(empty($fname))
					{
						 $sql_search=mysqli_query($link,"SELECT * FROM students s WHERE (s.major= '$maj' AND s.faculty= '$fac' AND s.level= '$lev')");
					}
					else{
					   $sql_search=mysqli_query($link,"SELECT * FROM students s WHERE s.major='$maj'
					   AND s.faculty='$fac' AND s.level='$lev' AND s.sname='$fname'");
					}
					   $myarr1=array();
					   while($row = mysqli_fetch_array($sql_search))
					   {
						 array_push($myarr1,$row);
					   }
					   $myarray_length1=count($myarr1);
					   $_SESSION['array_length1']=$myarray_length1;
									   
							$myarray_length1=count($myarr1); 
							  for($i=0;$i<$myarray_length1;$i++)
							  {
								echo "<tr>";
								 echo "<td>";
								echo '<input 
							  id="toView"
							  name="toview"
							  type="radio"
							  value="';
							echo $myarr1[$i]['sid'];
							echo '"</td>';
								echo "<td>". $myarr1[$i]['sname']. "</td>"."<td>". $myarr1[$i]['username']. "</td>";
								echo "<td>". $myarr1[$i]['sid']. "</td>";
								echo "</tr>";}
								
				   }
									   
								?>
                            </table>
							 <div class="container-login100-form-btn">
                        <button class="login100-form-btn" method="post" name="listCourses"> <!--TODO: Implement the function !!-->
                            List Courses
                        </button>
						<?php    if(isset($_POST['listCourses'])){
				
							$sid=$_POST['toview'];
							$_SESSION['sid']=$sid;
						   $sql_search=mysqli_query($link,"SELECT * FROM courses c,takes t WHERE t.sid='". $_POST['toview']."' AND c.crn=t.crn");
								   $myarr2=array();
								   while($row = mysqli_fetch_array($sql_search))
								   {
									 array_push($myarr2,$row);
								   }
								   
								   $myarray_length2=count($myarr2);
								   $_SESSION['myarr2']=$myarr2;
							 $_SESSION['array_length2']=$myarray_length2;
						$myarray_length2=count($myarr2); 
											
								   } ?>
                        </div>
				   
				   <br><br>
                        <h2>Student's Courses</h2>
                        <div class="row" >
                            <table style="margin-left:20px">
                                <tr>
								<th>Select</th>
                                    <th>CRN</th>
                                    <th>Course Name</th>
                                    <th>Grade</th>
                                </tr>
<?php
                                for($i=0;$i<$myarray_length2;$i++)
                                              { echo "<tr>";
												   echo "<td>";
												echo '<input 
                                              id="toGrade"
                                              name="tograde"
                                              type="radio"
											  value="';
				echo $myarr2[$i]['crn'];
				echo '"</td>';
                                                
                                                echo "<td>". $myarr2[$i]['crn']. "</td>"."<td>". $myarr2[$i]['cname']. "</td>";
												echo "<td>". $myarr2[$i]['grade']. "</td>";
                                                echo "</tr>";}?>
                            </table>
                            <br><br>
							<h2 style="margin-left:10px"> Enter Grade</h2>
							 <div class="col-xs-8">
                            <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                             <input class="form-control"style="margin-left:10px;width:%40" method="post" name="grade"></input></span>
                            </div><br><br>
							
                            <button class="login100-form-btn" method="post" name="submit" style="margin-left:120px"> Submit Changes </button><br><br><br>
							<?php
							if(isset($_POST['submit'])){
								if($_POST['grade']!='')
								{
									
									$grade=$_POST['grade'];
									$sql="UPDATE takes SET grade = '$grade' WHERE takes.sid = '".$_SESSION['sid']."' AND takes.crn = '". $_POST['tograde']."'";
									
									if(mysqli_query($link, $sql)){
     echo "<script>alert('Records are updates successfully.');</script>";
   
	}

 else{
   
    echo "<script>alert('ERROR: Could not able to execute $sql.');</script>".mysqli_error($link);

}
								}
								
							}
							?>
                        </div>
      
             </div>
  </form>
  

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
    </style> 
    </div>
        <footer style="margin-bottom:-30px;width:1500px;height:100px">
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
       
    <div id="dropDownSelect1"></div>


    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
</body>
</html>
