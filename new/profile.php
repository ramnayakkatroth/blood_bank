<?php 
include_once '../db.php';
session_start();

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
	    			<h2 class="ui header">B l o o d  B a n k</h2>

	    			
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
		      }?>  <i class="dropdown icon"></i>
		      <div class="menu">
		        
		       <div class="item">
	            <i class="address card outline icon"></i>Profile
	          </div>
	          <div class="item">
	            <i class="sign out alternate icon"></i>Logout
	          </div>
		      </div>
		    </div>
		  
</div>
	   
	
	  </div>
	</div>

<section class="spacethis">
	<div class="ui segment container center blue aligned header">
		Hospital Blood Samples
	</div>
	<div class="padding-box">
		<div class="ui statistics">
			
			<div class="statistic top-labeld">
				 <div class="ui grid">
   <div id="buttons-menu" class="three wide column"></div><br><br>
  <div class="thirteen wide column">
    <table id="example" class="ui celled table" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Sample Name</th>
          <th>sample type</th>
          <th>Status</th>
          
		  <th>Date</th>     
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>S.No</th>
          <th>Sample Name</th>
          <th>sample type</th>
          <th>Status</th>
          
		  <th>Date</th>      
        </tr>
      </tfoot>

      <tbody>
      	<?php 
		$sql1="SELECT * FROM hospital where h_name='$h_name' ";
		$ex1=$conn->query($sql1);
		$h_id=mysqli_fetch_array($ex1);
		$h1_id=$h_id['hospital_id'];
		$sql="SELECT * FROM blood_sample where hospital_id=$h1_id";
		$ex2=$conn->query($sql);
		if(mysqli_num_rows($ex2)){
			$i=0;
			while($row=mysqli_fetch_array($ex2)){

		?>
        <tr>
          <td><?php echo $i;?></td>
          <td><?php echo $row['sample_name'];?></td>
          <td><?php echo $row['sample_type'];?></td>
          <td><?php 
          if($row['b_status']==0){
          				?>
          				<div class="ui green message"> Available</div>
          	<?php
          }else if($row['b_status']==1){
          	?>
          		<div class="ui yellow message"> Someone Requested</div>
          	<?php 
          }else{?>
          		<div class="ui red message"> Someone Already taken</div>
          	<?php }?>
          	</td>
          <td><?php echo $row['date_added'];?></td>
          
        </tr>
  <?php    $i++;  }
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


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js'></script>
<script  src="./script.js"></script>
<script type="text/javascript" src="./data/script.js"></script>

</body>
</html>

</html>
