<!DOCTYPE html>
<html>
<?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
    ?>
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
  
    <!-------angular references ---------->
    <script src="Scripts/admin/admin.js"></script>
    <script src="js/angular.js"></script>
	
	

    <title>CourseWeb</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#9fd482" role="navigation">
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
                        <h2>Welcome  <?php session_start(); echo $_SESSION['username']; ?></h2> 
                        <!-- TODO: Take the username from the previous page, 
                            query database for name/surname and display here-->
                    </div>
                    <hr>
                </div>
            </div>
        </div>
   <div class="container">
  <div class="col-sm-6">  
		<form method = "post">
                 <h2>Search Account</h2>
                    <div style="font-family:Garamond"; font-size:"60px"" >
                        <div class="col-xs-8">
                            <span style="font-family: Garamond; font-size: 25px; color: navy">Username: 
                            </span>
                            <br>
                            <div class="wrap-input100 validate-input m-b-10">
							 <input type="text" method= "POST" name = "stuname" class ="form-control">
                              <!--  <input type="text" name="stuname" style="width: 40px; height: 15px"> -->
                                <span class="focus-input100"></span>
                            </div>
                       
                        </div>
					</form>
                    <div class="container-login100-form-btn">
			
                        <button class="login100-form-btn" style="margin-left:-180px; margin-top:10px"> <!--TODO: Implement the function !!-->
                            Search
                        </button>
                    </div>
              
	
		<div class="col-sm-6">     
                        <div class="row" ><br><br>
                            <table style = "margin-left: 10px">
							<br>
                                <tr>
                                <th>username</th>
                                <th>password</th>
                                <th>name</th>
								<th>lastname</th>
								<th>usertype</th>
                               
							   <?php
					$student = $_SESSION ['username'];
					$stuname = $_POST['stuname'];
					
					$result = mysqli_query($link, "SELECT * FROM users s WHERE s.username = '$stuname'");
					
					
					// POST -> html deki name = .... inputu alir, php ye getirir. 'stuname' kodun icindeki arama ismi
				$myarr=array();
            while($row = mysqli_fetch_array($result))
            {
              array_push($myarr,$row);
            }
            $myarray_length=count($myarr);
            $_SESSION['array_length']=$myarray_length;
            for($i=0;$i<$myarray_length;$i++)
            {
              echo "<tr>";
              echo "<td>". $myarr[$i]['username']. "</td>"."<td>" . $myarr[$i]['password']. "</td>";
              echo "<td>". $myarr[$i]['name']. "</td>"."<td>". $myarr[$i]['lastname']. "</td>";
			  echo "<td>". $myarr[$i]['usertype']. "</td>";
              echo "</tr>";}
					
					?>
                                </tr>
                            </table>
                        </div>
		</div>  </div> 	</div>
		
	
		<form method = "post" action= "AdminAccountFunc.php">	
 
        <div class="col-sm-6">
             <h2>Add or Delete Accounts</h2>
           
             <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-4">Enter first name:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="firstName" class ="form-control">

                        </div><br><br><br>
             <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-4">Enter last name:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="lastName" class ="form-control">
							
						</div><br><br><br>
			
			 <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-4">Enter username:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="username" class ="form-control">
							
						</div><br><br><br>
						
			 <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-4">Enter user's password:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="password" class ="form-control">
							
						</div><br><br>
						
						<!-- ----------------------- PHP de add delete student yapmayi bul ---------------------- -->
  
  <br><br>
                 <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-4">Select the user type:</label></span>
                        <div class="col-xs-8">
                             <select name="utype">
							  <option value="Undergraduate">Undergraduate</option>
							  <option value="Graduate">Graduate</option>
							  <option value="Instructor">Instructor</option>
							  <option value="Admin">Admin</option>
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
        </div><br><br>
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

        <footer style="margin-bottom:-30px;width:1500px;height:100px">
        <div class="last-div">
            <div class="container">
                <div class="row">
                    <div class="copyright" style="margin-top:50px;margin-left:300px">
                        © 2018 | <a target="_blank" href="http://www.sabanciuniv.edu">Sabanci University</a>
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

     