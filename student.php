<!DOCTYPE html>
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
  <script src="js/angular.js"></script>
  <script src="js/angular.min.js"></script>
  <script src="js/bootstrap-hover-dropdown.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery_init.js"></script>
  <script src="js/layout.js"></script>
  <script src="js/login-soft.js"></script>

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
        <a class="navbar-brand" href="publicpage.php"><span>CourseWeb</span></a>
      </div>
      <div class="navbar-collapse collapse">
        <div class="menu">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="login.html">Sıgn Out</a></li>
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
  </style>
  <?php
  $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }
    ?>
  <div class="container">
    <div class="row">
      <!--Registered Courses and Grades Table -->
      <div class="col-sm-6">
        <h2>Registered Courses and Grades</h2>
        <table class="table">
          <thead>
            <tr>
              <th>CRN</th>
              <th>Course Code</th>
              <th>Course Name</th>
			  <th>Grade</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $student=$_SESSION['username'] ;
			$sid= mysqli_query($link,"SELECT s.sid FROM students s WHERE s.username='".$student. "'");
			$_SESSION['sid']=$sid;
			$s_sid=mysqli_fetch_array($sid);
            $sql_bring=mysqli_query($link,"SELECT * FROM courses c, takes t WHERE c.crn=t.crn AND $s_sid[0]=t.sid");
            
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
              echo "<td>". $myarr[$i]['cname']. "</td>"."<td>". $myarr[$i]['grade']. "</td>";
              echo "</tr>";}
                ?>
            </tbody>
          </table>
          <br />
          <br />
          <br />
          <br />

          <h2>Withdraw from Courses </h2>
		   <form class="form-horizontal" method="post" action="studentAction.php"><!--action = "<?php $_PHP_SELF ?>" method = "POST"-->
          <table class="table" >
            <thead>
              <tr>
                <th>Select Course</th>
				<th>CRN</th>
                <th>Course Code</th>
                <th>Course Name</th>
              </tr>
            </thead>
            <tbody>
             
                <?php
                for($i=0;$i<$myarray_length;$i++)
                {  
			echo "<tr>";
			echo "<td>";
			echo '<input 
                                              id="isWithdrawn"
                                              name="toWithdraw[]"
                                              type="checkbox"
											  value="';
				echo $myarr[$i]['crn'];
				echo '"</td>';
                  echo "<td>". $myarr[$i]['crn']. "</td>"."<td>". $myarr[$i]['ccode']. "</td>";
                  echo "<td>". $myarr[$i]['cname']. "</td>";
                  echo "</tr>";}
                    ?>
                </tbody>
              </table>

<form method="post">
                <div class="container-login100-form-btn" style="margin-left:140px" >
                  <button class="login100-form-btn" name="withdraw" style="margin: 19px 30px 30px -250px">Withdraw</button>
                </div></form>
				</form>

               

              </div>

              <!--Look-up Classes to Add Table -->
              <div class="col-sm-6">
                <h2>Look-up Classes to Add</h2>
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <div class="form-group">
                      <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                        <label class="control-label col-sm-2">Subject:</label></span>
                        <div class="col-xs-8">
                          <span style="font-family: Garamond; font-size: 15px; padding-top: 10px">
                            <select multiple name="subject">
                              <option value="ACC">Accounting(ACC)</option>
                              <option value="GR">Ac.Pract.& Dev.(GR)</option>
                              <option value="ANTH">Anthropology(ANTH)</option>
							  <option value="ARA">Arabic(ARA)</option>
							  <option value="ANTH">Brand Practice(BP)</option>
							  <option value="CHEM">Chemistry(CHEM)</option>
							  <option value="DA">Data Analytics(DA)</option>
							  <option value="CS">Computer Sci.& Eng.(CS)</option>
							  <option value="ENS">Engineering Sciences(ENS)</option>
							  <option value="ENG">English(ENG)</option>
							  <option value="FILM">Film Studies(FILM)</option>
							  <option value="HART">History of Art(HART)</option>
							  <option value="HIST">History(HIST)</option>
							  <option value="HUM">Humanities(HUM)</option>
							  <option value="IE">Industrial Engineering(IE)</option>
							  <option value="IT">Information Technology(IT)</option>
							  <option value="IR">International Relations(IR)</option>
							  <option value="MGMT">Management(MGMT)</option>
							  <option value="MKTG">Marketing(MKTG)</option>
							  <option value="MATH">Mathematics(MATH)</option>
							  <option value="ME">Mechatronics(ME)</option>
							  <option value="BIO">Mol.Bio.Genetic&Bioengin.(BIO)</option>
						      <option value="NS">Natural Sciences(NS)</option>
							  <option value="ORG">Organization(ORG)</option>
							  <option value="PSY">Psychology(PSY)</option>
							  <option value="SPS">Social & Political Sci.(SPS)</option>
							  <option value="TLL">Turkish Lang.& Literature(TLL)</option>
                            </select></span>
                          </div>
                          <br>
                          <br>
                        </div>
                        <br>
                        <br>
                        <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                          <label class="control-label col-sm-2">Course Number:</label></span>
                          <div class="col-xs-8">
                            <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                              <input type="text" class="form-control" name="coursenumber"  id="coursenumber"></span>
                            </div>
                          </div>
                          <br>
                          <br />
                         

                              <div class="form-group">
                                <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
                                  <label class="control-label col-sm-2">Credit Requisite:</label></span>
                                  <div class="col-xs-8">
                                      <input type="text" class="form-control" name="mincredit"  id="creditlimitlow">
                                    </div>
                                  </div>
                                  <br>
                                  <br>
                                  <div class="form-group">
                                    <span style="font-family: Garamond; font-size: 15px; padding-top: 10px; color: navy">
									    <label class="control-label col-sm-2">Day:</label></span>
										<div class="col-xs-8">
                                          <span style="font-family: Garamond; font-size: 13px; padding-top: 10px">
                                            <select class="col-xs-4" name="day"  id="day">
											<option value=""></option>
                                              <option value="M">Monday</option>
                                              <option value="T">Tuesday</option>
                                              <option value="W">Wednesday</option>
                                              <option value="R">Thursday</option>
                                              <option value="F">Friday</option>
                                            </select></span></div><br>
                                          </div><br>
                                                  <div class="container-login100-form-btn">
                                                    <button class="login100-form-btn" name="search">Class Search</button>
													
                                                   <?php
                                                    if(isset($_POST['search'])){
														$day=$_POST['day'];
														$mincre = $_POST['mincredit'];
														if(empty($mincre))
														{
													if(empty($_POST['coursenumber'])){
														if(empty($day)){
														   $sql_search=mysqli_query($link,"SELECT * FROM courses c WHERE c.subject='". $_POST['subject']."'");
														}
														else{
															 $sql_search=mysqli_query($link,"SELECT * FROM courses c WHERE (c.subject='". $_POST['subject']."' AND c.day='$day')");
														}
														
														$myarr1=array();
													   while($row = mysqli_fetch_array($sql_search))
													   {
														 array_push($myarr1,$row);
													   }
													   $myarray_length1=count($myarr1);
													   $_SESSION['array_length1']=$myarray_length1;
														}
													else
													{
														$mystr=$_POST['subject']. $_POST['coursenumber'];
														if(empty($day)){
														  $sql_search=mysqli_query($link,"SELECT * FROM courses c WHERE c.ccode='$mystr'");
														}
														else{
															$sql_search=mysqli_query($link,"SELECT * FROM courses c WHERE c.ccode='$mystr' AND c.day='$day'");
														}
														
                                                       $myarr1=array();
                                                       while($row = mysqli_fetch_array($sql_search))
                                                       {
                                                         array_push($myarr1,$row);
                                                       }
                                                       $myarray_length1=count($myarr1);
                                                       $_SESSION['array_length1']=$myarray_length1;
														}}
														
														
														
														else
															{
													if(empty($_POST['coursenumber'])){
														if(empty($day)){
														   $sql_search=mysqli_query($link,"SELECT * FROM courses c WHERE c.subject='". $_POST['subject']."' AND c.creditreq<='$mincre'");
														}
														else{
															 $sql_search=mysqli_query($link,"SELECT * FROM courses c WHERE (c.subject='". $_POST['subject']."' AND c.day='$day') AND c.creditreq<='$mincre'");
														}
														
														$myarr1=array();
													   while($row = mysqli_fetch_array($sql_search))
													   {
														 array_push($myarr1,$row);
													   }
													   $myarray_length1=count($myarr1);
													   $_SESSION['array_length1']=$myarray_length1;
														}
													else
													{
														$mystr=$_POST['subject']. $_POST['coursenumber'];
														if(empty($day)){
														  $sql_search=mysqli_query($link,"SELECT * FROM courses c WHERE c.ccode='$mystr' AND c.creditreq<='$mincre'");
														}
														else{
															$sql_search=mysqli_query($link,"SELECT * FROM courses c WHERE c.ccode='$mystr' AND c.day='$day' AND c.creditreq<='$mincre'");
														}
														
                                                       $myarr1=array();
                                                       while($row = mysqli_fetch_array($sql_search))
                                                       {
                                                         array_push($myarr1,$row);
                                                       }
                                                       $myarray_length1=count($myarr1);
                                                       $_SESSION['array_length1']=$myarray_length1;
														}
														
													}
													}
														 ?>
                                                    <button class="login100-form-btn" onclick="reset()">Reset</button>

                                                  </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <br />
                                  <br />
                                  <br />

                                  <div class="container">
                                    <div class="row">
									<form class="form-horizontal" method="post" >
                                      <!--Searched Courses Table-->
                                      <div class="col-sm-12">
                                        <h2>Searched Courses</h2>
                                        <table class="table">
                                          <thead>
                                            <tr>
                                              <th>Select Course</th>
                                              <th>CRN</th>
                                              <th>Course Code</th>
                                              <th>Course Name</th>
                                              <th>Instructors</th>
                                              <th>Credit</th>
                                              <th>Time(1)</th>
                                              <th>Room(1)</th>
                                              <th>Time(2)</th>
                                              <th>Room(2)</th>
                                              <th>Total Capacity</th>
                                              <th>Remaining Capacity</th>
                                            </tr>
                                          </thead>
                                          <tbody> 
										  
                                              <?php
                                              for($i=0;$i<$myarray_length1;$i++)
                                              {
                                                echo "<tr>";
												echo "<td>";
												echo '<input 
                                              id="toRegister"
                                              name="toReg[]"
                                              type="checkbox"
											  value="';
				echo $myarr1[$i]['crn'];
				echo '"</td>';
                                                echo "<td>". $myarr1[$i]['crn']. "</td>"."<td>". $myarr1[$i]['ccode']. "</td>";
                                                echo "<td>". $myarr1[$i]['cname']. "</td>"."<td>". $myarr1[$i]['instr']. "</td>";
												echo "<td>". $myarr1[$i]['credit']. "</td>";
												echo "<td>". $myarr1[$i]['time']. "</td>"."<td>". $myarr1[$i]['room']. "</td>";
												echo "<td>". $myarr1[$i]['time1']. "</td>"."<td>". $myarr1[$i]['room1']. "</td>";
												echo "<td>". $myarr1[$i]['capacity']. "</td>"."<td>". $myarr1[$i]['remcapacity']. "</td>";
                                                echo "</tr>";}
												
                                                ?>
											
                                              </tbody>
                                            </table>
											
                                        </div>
										
                                      </div><div class="container-login100-form-btn">
                                          <button class="login100-form-btn" style="margin: 19px -400px 0px -500px" method="post" name="register">Register</button>
                                        </div>
                                    </div>
                                    <br /><br />
 
                                    <!--Selected Courses Table-->
                                    

                                        
 <?php 
						
					$sql0='';
			  $myarr2=array();
			  if(isset($_POST['register'])){ 
			 
                  if(!(empty($_POST['toReg']))){
					
                    // Loop to store and display values of individual checked checkbox.
					$sid= mysqli_query($link,"SELECT s.sid FROM students s WHERE s.username='".$student. "'");
                    foreach($_POST['toReg'] as $selected){                  
						$sql="SELECT s.sid FROM students s,courses c WHERE c.crn='$selected' AND s.totalcredits>=c.creditreq AND s.sid='$s_sid[0]'";
						$res=mysqli_query($link,$sql);
						$myarr3=array();
						while($row = mysqli_fetch_array($res))
                                                       {
                                                         array_push($myarr3,$row);
                                                       }
                                                       $myarray_length3=count($myarr3);
						echo $myarray_length3;
						if($myarray_length3!=0)
						{ $sql0="INSERT INTO takes(crn,sid) VALUES (".$selected.", ".$s_sid[0].")";
							
						}
				      else
					  {
						  $sql0='';	echo "<script>alert('ERROR: Not enough credits for one of the selected courses.');</script>";}
						  
						  if($sql0!='')
				  {if(mysqli_query($link,$sql0)){
					  echo "<script>alert('Selected CRNs added successfully.');</script>";
				  $sql_update = mysqli_query($link, "UPDATE courses c SET reg = reg + 1 WHERE c.crn = '$selected'");}
				   else  
				  echo "<script>alert('ERROR: Could not execute $sql0.');</script>".mysqli_error($link);}
			  } 
                    }
				  }
				
                
				 
			  
			  ?>
                                         </form>
                                      </body>
                                      </html>