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
    <script src="~/js/angular.js"></script>
    <script src="~/js/angular.min.js"></script>
    <script src="~/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="~/js/jquery.min.js"></script>
    <script src="~/js/jquery_init.js"></script>
    <script src="~/js/layout.js"></script>
    <script src="~/js/login-soft.js"></script>

    <!-------Angular references ---------->
    <script src="~/Scripts/Student/lookupcourses.js"></script>
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
                <a class="navbar-brand" href="/Home"><span>CourseWeb</span></a>
            </div>
            <div class="navbar-collapse collapse">
                <div class="menu">
				
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="login.html">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
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
		
	<?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
    ?> 
<br><br>	
 <div class="col-sm-6">
	 <div class="container">
		     <div class="col-sm-6" style="margin-top:50px">
            <div class="row" ><br>
			<h2>Courses<h2>
                            <table class="table table-hover">
                                <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>CRN</th>
                                </tr>
                                <?php
			$allCourses= mysqli_query($link,"SELECT * FROM courses c");
		
            $myarr=array();
            while($row = mysqli_fetch_array($allCourses))
            {
              array_push($myarr,$row);
            }
            $myarray_length=count($myarr);
            $_SESSION['array_length']=$myarray_length;
            for($i=0;$i<$myarray_length;$i++)
            {
              echo "<tr>";
              echo "<td>". $myarr[$i]['cname']."</td>"."<td>". $myarr[$i]['ccode']."</td>";
              echo "<td>". $myarr[$i]['crn']."</td>";
              echo "</tr>";
			  }
                ?>
                                   
                        </table>
                        </div></div></div>
						<div class="col-sm-5" style="margin-top:50px">
            <div class="row"><br>
			<h2>Takes<h2>
			<table class="table table-hover">
                                <tr>
                                <th>CRN</th>
                                <th>SID</th>
                                <th>Grade</th>
                                </tr>
                                <?php
			$takes= mysqli_query($link,"SELECT * FROM takes");
		
            $myarr1=array();
            while($row = mysqli_fetch_array($takes))
            {
              array_push($myarr1,$row);
            }
            $myarray_length1=count($myarr1);
            $_SESSION['array_length1']=$myarray_length1;
            for($i=0;$i<$myarray_length1;$i++)
            {
              echo "<tr>";
              echo "<td>". $myarr1[$i]['crn']."</td>"."<td>". $myarr1[$i]['sid']."</td>";
              echo "<td>". $myarr1[$i]['grade']."</td>";
              echo "</tr>";
			  }
                ?>
                                   
                            </table>
                        </div></div>
          </div><br>
		  
<div class="col-sm-5" style="margin-top:50px">
<div class="row" ><br>
			<h2>Users<h2>
                            <table class="table table-hover">
                                <tr>
                                <th>CRN</th>
                                <th>SID</th>
                                <th>Grade</th>
                                </tr>
                                <?php
			$takes= mysqli_query($link,"SELECT * FROM takes");
		
            $myarr1=array();
            while($row = mysqli_fetch_array($takes))
            {
              array_push($myarr1,$row);
            }
            $myarray_length1=count($myarr1);
            $_SESSION['array_length1']=$myarray_length1;
            for($i=0;$i<$myarray_length1;$i++)
            {
              echo "<tr>";
              echo "<td>". $myarr1[$i]['crn']."</td>"."<td>". $myarr1[$i]['sid']."</td>";
              echo "<td>". $myarr1[$i]['grade']."</td>";
              echo "</tr>";
			  }
                ?>
                                   
                            </table>
                        </div></div>
	<div class="col-sm-5" style="margin-top:50px">
<div class="row" ><br>
			<h2>Students<h2>
                            <table class="table table-hover">
                                <tr>
                                <th>Username</th>
                                <th>SID</th>
								<th>sname</th>
                                </tr>
                                <?php
			$stu= mysqli_query($link,"SELECT * FROM students");
	
            $myarr3=array();
            while($row = mysqli_fetch_array($stu))
            {
              array_push($myarr3,$row);
            }
            $myarray_length3=count($myarr3);
            $_SESSION['array_length3']=$myarray_length3;
            for($i=0;$i<$myarray_length3;$i++)
            {
              echo "<tr>";
              echo "<td>". $myarr3[$i]['username']."</td>"."<td>". $myarr3[$i]['sid']."</td>";
              echo "<td>". $myarr3[$i]['sname']."</td>";
              echo "</tr>";
			  }
                ?>
                                   
                            </table>
                        </div></div>
      <div class="col-sm-5" style="margin-top:50px">
<div class="row" ><br>
			<h2>Gives<h2>
                            <table class="table table-hover">
                                <tr>
                                <th>CRN</th>
                                <th>Instructor</th>
                                </tr>
                                <?php
			$stu= mysqli_query($link,"SELECT * FROM gives");
	
            $myarr4=array();
            while($row = mysqli_fetch_array($stu))
            {
              array_push($myarr4,$row);
            }
            $myarray_length4=count($myarr4);
            $_SESSION['array_length4']=$myarray_length4;
            for($i=0;$i<$myarray_length4;$i++)
            {
              echo "<tr>";
              echo "<td>". $myarr4[$i]['crn']."</td>"."<td>". $myarr4[$i]['username']."</td>";
              echo "</tr>";
			  }
                ?>
                                   
                            </table>
                        </div></div>
    <div id="dropDownSelect1"></div>
</body>

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
		
		
</html>
				