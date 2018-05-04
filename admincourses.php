<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CourseWeb</title>

        <!-- Bootstrap -->

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
        <script src="~/js/angular.js"></script>
        <script src="~/js/angular.min.js"></script>
        <script src="~/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="~/js/jquery.min.js"></script>
        <script src="~/js/jquery_init.js"></script>
        <script src="~/js/layout.js"></script>
        <script src="~/js/login-soft.js"></script>

        <!-------angular references ---------->
        <script src="~/Scripts/jquery-1.7.1.js"></script>
    </head>
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
                            <li role="presentation"><a href="admin.html">Courses</a></li>
                            <li role="presentation"><a href="adminStu.html">Students</a></li>
                            <li role="presentation"><a href="adminAcc.html">Accounts</a></li>
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

    <aside class="container-catalog100 m-r-100">
            <aside class="wrap-catalog100 m-r-500 p-l-20 p-r-20 p-t-20 p-b-20" style="width:1500px">
                <div style="font-family:Garamond"; font-size:"60px"">
                    <div class="text-center">
                       
<div class="container">
    <div class="row">
            <div class="col-sm-6">
                <h2>Add New Course</h2>
			<form action="addcourse.php" method="post">
                <form class="form-horizontal">
				    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">CRN:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="crn" class ="form-control">
                        </div>  <br><br>
                    </div>
					<div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Subject:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="subject" class ="form-control">
                        </div>  <br><br>
                    </div>
                    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Course Code:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="ccode" class ="form-control">
                        </div>  <br><br>
                    </div>
                    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Course Name:</label></span>
                        <div class="col-xs-8">
                            <input type="text" name="cname" class="form-control">
                        </div><br><br>
                    </div>
                    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Course Info:</label></span>
                        <div class="col-xs-8">
                            <textarea class="form-control" name="cinfo" id="info"></textarea>
                        </div><br><br><br>
                    </div>
                    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Level:</label></span>
                        <select class="col-xs-4" name="level">
                            <option>Undergraduate</option>
                            <option>Graduate</option>
                        </select>
                        
                    </div><br><br>
                                
                    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                            <label class="control-label col-sm-2">Faculty: </label></span>
                        <select class="col-xs-4" name="faculty">
                            <option>FENS</option>
                            <option>FASS</option>
                            <option>FMAN</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Capacity:</label></span>
                        <div class="col-xs-8">
                            <input class="form-control" name="capacity">
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
                            <input class="form-control" name="time1">
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
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" method="post" name="addcourse">Add Course</button>
                    </div>
					
			
					
					
                </form>
            </div> 
    <div class="col-sm-6">
        <h2>Remove a Course</h2>
          <form class="form-horizontal">
                    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Course Code:</label></span>
                        <div class="col-xs-8">
                            <input type="text"  class ="form-control" id="rmcode">
                        </div> <br><br>
                    </div> 
                    <div class="form-group">
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Course Name</label></span>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" id="rmcoursename">
                        </div>
                    </div><br><br>
              <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Remove Course</button>
                    </div>
              </form>
                </div> 
				
           <div class="container">
		     <div class="col-sm-6" style="margin-top:50px">
            <div class="row" >
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
                        </div></div>
          </div>
        </div>
    </div>      
                    </div>
                     </div>
                </aside>
         </aside>
  
    </body>
</html>


