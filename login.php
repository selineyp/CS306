<?php

error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "308_login");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(empty($_POST['username']) || empty($_POST['pass'])   )
{
	echo "<script>alert('You have an empty field.');</script>";

    header("Refresh:0; url=login.html");   // go back to the login page
}

//if(isset($_POST['log']))
//{
	if($_POST['username'] && $_POST['pass'])
	{
		$username = mysql_real_escape_string($_POST['username']);     // to get rid of the tricky characters which can destroy the database.
		$password = mysql_real_escape_string($_POST['pass']);  // turn into a hash function.
	    $res= mysqli_query($link,"SELECT * FROM `users` WHERE username= '$username' ");
		if($res === FALSE) {
			die(mysql_error()); // TODO: better error handling
		}
		$user=mysqli_fetch_array($res);
		if($user == NULL)   // if there is no such user like that.
		{
			echo "<script>alert('The username does not exist');</script>";

			header("Refresh:0; url=login.html");   // go back to the login page
		}
        else if($user['password']!= $password || $user['username']!= $username  )
		{
			echo "<script>alert('The password or the username is incorrect');</script>";
		    header("Refresh:0; url=login.html");
		}
		else if($username == $user['username'] && $password == $user['password'])
		{
			echo "<script>alert('You have succesfully entered the system !');</script>";

			session_start(); // remember the variables that are used.
			$_SESSION['username'] = $user['username'];
			$_SESSION['profid'] = $user['password'];
			if($user[usertype]=='student')
			echo"<script>location.assign('student.php')</script>";
		if($user[usertype]=='admin')
			echo"<script>location.assign('admin.php')</script>";
if($user[usertype]=='student')
			echo"<script>location.assign('student.php')</script>";	
		if($user[usertype]=='instructor')
			echo"<script>location.assign('instructorCourses.php')</script>";
		}
		else{
			//header("Refresh:0; url=index_thesis.html");
		}
	}
	//	}
