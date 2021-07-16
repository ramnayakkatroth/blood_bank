<?php
session_start();
include 'db.php';
if (isset($_REQUEST['login_submit'])) 
 {
		

		$useremail=$_POST['email'];
	 	$userpassword=$_POST['password'];

		$query1 = "SELECT * FROM receiver WHERE r_email='$useremail' and r_password='$userpassword'";
		$query2 = "SELECT * FROM hospital WHERE h_email='$useremail' and h_password='$userpassword'";
		$s1=$conn->query($query1);
		$s2=$conn->query($query2);
		$r1=mysqli_fetch_array($s1);
		$h1=mysqli_fetch_array($s2);
		$r2=mysqli_fetch_array($s1);
		$h2=mysqli_fetch_array($s2);
		if ( mysqli_num_rows($s2) >0) 
		{
		   echo "<script type='text/javascript'>alert('it is hospital page')</script>";
		    $_SESSION['userrole']="Hospital";
		    $_SESSION['name']=$h1['h_name'];
			header("refresh:0,url=new/index.php");

		}
		else if (mysqli_num_rows($s1) >0) {
			echo "<script type='text/javascript'>alert('it is Reciever page')</script>";
			 $_SESSION['userrole']="Reciever";
			 $_SESSION['name']=$r1['r_name'];
			header("refresh:0,url=./index.php");
		}
		else{
			echo "<script type='text/javascript'>alert('Incorrect email ID or Password,Try Again!! ')</script>";
			header("refresh:0,url=index.php");

		}
			
				

 
		}


?>