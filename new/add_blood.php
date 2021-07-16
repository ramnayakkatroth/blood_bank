
<?php 
include_once('../db.php');
session_start();
if (!isset($_SESSION['userrole'])) {
	header("refresh:0,url=index.php");
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Blood Bank dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.semanticui.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.semanticui.min.css">

<script src = "https://code.jquery.com/jquery-1.12.4.js"></script>
<script src = "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src = "https://cdn.datatables.net/1.10.16/js/dataTables.semanticui.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.5.1/js/buttons.semanticui.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src = "https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
  <link rel="stylesheet" href="./style.css">


</head>
<body>

<aside class="sidebar" id="sidebar">
	<a ><div class="ui vertical menu sidebar-menu" style="margin-top: 60px;">
	  <a  href="./index.php" class="item active">
	      	<div class="side-icon home"><i class="home icon"></i></div>
	    </a>
	    
	
	</a>
	 <a href="./add_blood.php"><div class="ui left pointing dropdown link item">
		<div class="side-icon product"><i class="tint red icon"><i class="plus circle icon"></i></i></div></a>
		    <div class="menu">
		      <div class="item">Add Blood</div>
		    </div>
	</div></a>
	 <a href="./all_blood.php"><div class="ui left pointing dropdown link item">
			<div class="side-icon setting"><i class="hospital outline
 icon"></i></div>
			    <div class="menu">
			      <div class="item">Hospital Blood Samples</div>
			    </div>
		</div></a>
		
				
		    	
		    	
			<a href="./show_request.php"><div class="ui left pointing dropdown link item">
					<div class="side-icon off"><i class="handshake outline icon"></i></div>
					    <div class="menu">
					      <div class="item">Reciever`s Request</div>
					    </div>
				</div></a>
				<a href="./profile.php"><div class="ui left pointing dropdown link item">
					<div class="side-icon off"><i class="address card outline

 icon"></i></div>
					    <div class="menu">
					      <div class="item">Profile</div>
					    </div>
				</div></a>
		    	    	<a href="./logout.php"><div class="ui left pointing dropdown link item">
		    				<div  class="side-icon off"><i class="power off
 icon"></i></div>
		    				    <div class="menu">
		    				      <div class="item">Logout</div>
		    				    </div>
		    			</div></a>


	
	</div>

</aside>


<main class="main-content bg-gray">


	<div class="ui  menu no-border no-radius" style="height: 55px;">
	  <a class="item  no-border">
	    <!--div class="ui transparent left icon input floated ui search">
	    			  <input type="text" class="prompt" placeholder="Search...">
	    			  <i class="search icon"></i>
	    			  <div class="results"></div>
	    			</div-->
	    			<h2 class="ui header">Blood Bank</h2>

	    			
	  </a>

	  <div class="right menu">
	
		
<div class="item no-border">
		    <div class="ui dropdown item no-border top right pointing">
	<img class="ui avatar image" src="https://semantic-ui.com/images/avatar/small/jenny.jpg" style="border-radius: 3px;">
		      <?php 
		      $h_name='';
		      if (!isset($_SESSION['userrole'])) {
					header("refresh:0,url=../index.php");
				}
				else{
					$h_name=$_SESSION['name'];
		      	echo $_SESSION['name'];
		      }?><i class="dropdown icon"></i>
		      <div class="menu">
		        
		       <a href="./profile.php" class="item">
	            <i class="address card outline icon"></i>Profile
	          </a>
	          <a href="./logout.php" class="item">
	            <i class="sign out alternate icon"></i>Logout
	          </a>
		      </div>
		    </div>
		  
</div>
	   
	
	  </div>
	</div>


	
<?php
$q1="SELECT * FROM hospital where h_name='".$_SESSION['name']."'";
$sq1=$conn->query($q1);
$f1=mysqli_fetch_array($sq1);

?>
<section class="spacethis">
	<div class="ui segment container center blue aligned header">
		All Reciever`s Request
	</div>
	<div class="ui segment container">
<form class="ui form" action="" method="post">
  <div class="field">
    <label>Sample Name</label>
    <input type="text" name="sample_name" placeholder="Enter Diseases example. diabetic..">
    <input type="text"  name="id" value='<?php echo $f1['hospital_id']?>' hidden>
  </div>
  <div class="field">
  	<label>Blood Group</label>
  	<select class="ui selection dropdown" name="group">
  		<option >Select</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
    </select>
  </div>
  <button class="ui button primary" name="add_blood" type="submit">Submit</button>
</form>
	</div>
</section>



</main>



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
<!-- <script src="js/jquery.sliderPro.min.js"></script> -->
<script  src="./data/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
<script  src="./script.js"></script>

</body>
<?php 
 

if (isset($_POST['add_blood'])) {
	$h_id=$_POST['id'];
	$sample_name=$_POST['sample_name'];
	$blood_type=$_POST['group'];
	$sq2="INSERT INTO `blood_sample`( `hospital_id`, `sample_name`, `sample_type`) VALUES ($h_id,'$sample_name','$blood_type')";
	$ex1=$conn->query($sq2);
	if ($ex1) {
		?>

		<script>$('body').toast({
    title: 'Added',
    displayTime: 5000,
    message: 'Added To The Record',
    showProgress: 'top',
    progressUp: true,
    class : 'green',
    className: {
        toast: 'ui message'
    }
  });</script>
		<?php
echo '<script type="text/javascript">setTimeout(function(){window.top.location="add_blood.php"} , 5000);</script>';


	}
	else{?>
<script type="text/javascript">
  $('body').toast({
    title: 'Failed',
   
    message: 'Already Recorded in Database.',
    showProgress: 'top',
    progressUp: true,
    class : 'red',
    className: {
        toast: 'ui message'
    }
  });
</script>

		<?php
	}
}
?>

</html>

