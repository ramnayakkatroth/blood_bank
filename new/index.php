<?php 
include_once '../db.php';
include_once '../login.php';

if (!isset($_SESSION['userrole'])=="Hospital") {
	header("Location: ../index.php");
}

?>
<!-- partial:index.partial.html --><!DOCTYPE html>
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
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/semantic.min.css">
	<link rel="stylesheet" href="css/bigly-icon/style.css">
	<!-- <link rel="stylesheet" href="css/slider-pro.min.css"> -->
	<link rel="stylesheet" href="css/main.css">

	<style>
		.ui.card>.image>img, .ui.cards>.card>.image>img {
			object-fit: cover;
		}
	</style>

</head>
<body>

<aside class="sidebar" id="sidebar">
	<div class="ui vertical menu sidebar-menu" style="margin-top: 60px;">
	  <a href="./index.php" class="item active">
	      	<div class="side-icon home"><i class="home icon"></i></div>
	    </a>
	    
	

	 <a href="./add_blood.php"><div class="ui left pointing dropdown link item">
		<div class="side-icon product"><i class="tint red icon"><i class="plus circle icon"></i></i></div>
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
		
				
		    	
		    	<a href="./show_request.php">
			<div class="ui left pointing dropdown link item">
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
		    	    <a href="./logout.php">	<div class="ui left pointing dropdown link item">
		    				<div class="side-icon off"><i class="power off
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
		      }?> <i class="dropdown icon"></i>
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

<section class="spacethis">
	<div class="ui segment container center blue aligned header">
		All Reciever`s Request
	</div>
	<div class="padding-box">
		<div class="ui statistics">
			
			<div class="statistic top-labeld">
				 <div class="ui grid">
  <div id="buttons-menu" class="three wide column"></div>
  <div class="thirteen wide column">
    <table id="example" class="ui celled table" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Receiver Name	</th>
          <th>Receiver Address</th>
          <th>Receiver Email</th>
          <th>Sample Requested</th>
          <th>Sample Type</th>
		  <th>Date Requested</th>
		  <th>Actions</th>        
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>S.No</th>
          <th>Receiver Name	</th>
          <th>Receiver Address</th>
          <th>Receiver Email</th>
          <th>Sample Requested</th>
          <th>Sample Type</th>
		  <th>Date Requested</th>
		  <th>Actions</th>        
        </tr>
      </tfoot>
 
      <tbody>
      	      <?php 




$h_name=$_SESSION['name'];
$sql2="SELECT * FROM hospital where h_name='$h_name'";
$ex1=$conn->query($sql2);
$q=mysqli_fetch_array($ex1);
$s=$q['hospital_id'];
$sql1="SELECT * FROM blood_sample b, blood_request_tracker b1,receiver r WHERE b.sample_id= b1.sample_id and b1.hospital_id=$s and b1.receiver_id=r.receiver_id ";
$ex2=$conn->query($sql1);
if(mysqli_num_rows($ex2)>0){
	$i=1;
	while($row=mysqli_fetch_array($ex2)){
		?>
        <tr>
        	<td><?php echo $i;?></td>
          <td><?php echo $row['r_name'];?></td>
          <td><?php echo $row['r_address'];?></td>
          <td><?php echo $row['r_email'];?></td>
          <td><?php echo $row['sample_name'];?></td>
          <td><?php echo $row['sample_type'];?></td>
          <td><?php echo $row['date_requested'];?></td>
          <?php
          if($row['b1_status']==1){
          ?>
          <td><div class="ui green message header"><i class="check circle
 icon" ></i> Approved</div></td>
  		<?php }

  		else if ($row['b1_status']==2) {
  			?>
  			<td><div class="ui red message "> <i class="close circle icon" ></i>Rejected</div></td>
  			<?php
  		}
  		else{
  		?>
  		<td><div class="ui teal message ">Request For Approval</div></td>
  		<?php 
  	}?>
        </tr>
         <?php    
	
	$i++;
	}
}
else{
	?>
	<td><center><div class="ui raised   purple header">No one approved</div></center></td>
	<?php
}


?>
      </tbody>
 
 
    </table>
  </div>
</div>
				  
				  
				</div>
			
		</div>
	</div>
</section>




</main>

<script  src="./data/script.js"></script>




<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js'></script><script  src="./script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>


</body>
</html>
