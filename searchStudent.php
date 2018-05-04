 <?php
 $link = mysqli_connect("localhost", "root", "", "308_login");
  // Check connection
  error_reporting(0);
  if($link === false){
    die("ERROR: Could not connect." . mysqli_connect_error());
  }

  $fullname= $_POST['fullname'];
													  
                                                       $sql_search=mysqli_query($link,"SELECT s.sname,s.username FROM students s WHERE s.sname='". $fullname."'");
                                                       $myarr1=array();
                                                       while($row = mysqli_fetch_array($sql_search))
                                                       {
                                                         array_push($myarr1,$row);
                                                       }
                                                       $myarray_length1=count($myarr1);
                                                       $_SESSION['array_length1']=$myarray_length1;
                                             
											 for($i=0;$i<$myarray_length1;$i++)
                                              {
                                                echo "<tr>";
                                                echo "<td>". $myarr1[$i]['sname']. "</td>"."<td>". $myarr1[$i]['username']. "</td>";
                                                echo "<td>". $myarr1[$i]['sid']. "</td>";
                                                echo "</tr>";}
												
                                                ?>