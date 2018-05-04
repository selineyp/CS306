
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
<body data-ng-controller="InstructorCtrl" data-ng-init="Init()">
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
                        <li role="presentation"><a href="publicpage.php">Exit</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
  
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
	</body>
<body>	
	<?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
    ?> 
 </body>
	<div class="container">
            <div class="row">
                <hr>
                <div class="col-md-6 col-md-offset-3">
                    <div class="text-center">
					<br><br><br><br><br><br>
	 <?php
						if(isset($_POST['withdraw'])){//to run PHP script on submit
	if(!empty($_POST['toWithdraw'])){
                    // Loop to store
                    foreach($_POST['toWithdraw'] as $selected){
                      $sql_delete="DELETE FROM takes WHERE takes.crn='". $selected. "'" ;
					 
                    }
               }
														
							if(mysqli_query($link, $sql_delete)){

    echo "<h2><font color='green'>Withdraw successful.</font></h2><br>";
	 $sql_updatew = mysqli_query($link, "UPDATE courses c SET reg = reg - 1 WHERE c.crn = '". $selected. "'");
	}

 else{

    echo "<h2><font color='red'>ERROR: Not able to execute $sql_execute . </font></h2><br/>" . mysqli_error($link);

}


}
			?>
						
						
						
					
						
						<div>
						
						<button class="login100-form-btn" style = "margin-left:155px" type="button" onclick="window.location.href='http://localhost:8080/306306306/student.php'">Return to previous page</button>
						
						</div>
						
						
                    <hr>
                </div>
            </div>
        </div>
		</div>
		
		 <footer>
        <div class="last-div">
            <div class="container">
                <div class="row">
                    <div class="copyright" style="margin-top:50px;margin-left:300px">
                        © 2018 | <a target="_blank" href="https://www.sabanciuniv.edu">Sabanci Universitesi</a>
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
				