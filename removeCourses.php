<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CourseWeb</title>

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
    <script src="js/angular.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/bootstrap-hover-dropdown.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery_init.js"></script>
    <script src="js/layout.js"></script>
    <script src="js/login-soft.js"></script>

    <!-------Angular references ---------->
    <script src="Scripts/Student/lookupcourses.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
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
                <a class="navbar-brand" href="publicpage.php"/><span>CourseWeb</span></a>
            </div>
            <div class="navbar-collapse collapse">
                <div class="menu">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="login.html">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
  
    <body >
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
                    <a class="navbar-brand" href="login.html"><span>CourseWeb</span></a>
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
        </nav

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
    </style>
<body>	
<div class="container">
            <div class="row">
                <hr>
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
										<br><br><br><br><br><br>
	<?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
  
  if(empty($_POST['deletecrn']))
  {
	  echo "<h2><font color= 'red'>Please enter CRN.</font></h2><br>";
  }
  else{
  $removeCourse ="DELETE FROM courses WHERE crn='". $_POST['deletecrn']."'";
  	if(mysqli_query($link, $removeCourse)){
    echo "<h2><font color='green'>Course deleted successfully.</font></h2><br>";
	}

				else{

    echo "<h2><font color='red'>ERROR: Not able to execute $removeCourse . </font></h2><br/>" . mysqli_error($link);
  }}
    ?>
	<div>
						
						<button class="login100-form-btn" style = "margin-left:155px" type="button" onclick="window.location.href='http://localhost:8080/306306306/admin.php'";">Return to previous page</button>
						
						</div>
						
						
                    <hr>
                </div>
            </div>
        </div>
		</div>
 </body>
 
</html>

 