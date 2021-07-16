<?php 
include_once '../db.php';
session_start();
if (!isset($_SESSION['userrole'])) {
	header("refresh:0,url=../index.php");
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
	<a href="./index.php"><div class="ui vertical menu sidebar-menu" style="margin-top: 60px;">
	  <a class="item active">
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


	
<section class="spacethis">
	<div class="ui segment container center blue aligned header">
		All Reciever`s Blood Sample Request
	</div>
	<div class="padding-box">
		<div class="ui statistics">
			
			<div class="statistic top-labeld">
				 <div class="ui grid">

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
          <th>Sample Name</th>
          <th>Sample Type</th>
		  <th>Date Requested</th>
		  <th>Actions</th>        
        </tr>
      </tfoot>
      <?php 
$h_name=$_SESSION['name'];
$sql2="SELECT * FROM hospital where h_name='$h_name'";
$ex1=$conn->query($sql2);
$q=mysqli_fetch_array($ex1);
$s=$q['hospital_id'];
$sql1="SELECT * FROM blood_sample b, blood_request_tracker b1,receiver r WHERE b.sample_id= b1.sample_id and b1.hospital_id=$s and b1.receiver_id=r.receiver_id and b1.b1_status=0";
$ex2=$conn->query($sql1);
if(mysqli_num_rows($ex2)>0){
	$i=1;
	while($row=mysqli_fetch_array($ex2)){
		?>
      <tbody>
        <tr>
        	<td><?php echo $i;?></td>
          <td><?php echo $row['r_name'];?></td>
          <td><?php echo $row['r_address'];?></td>
          <td><?php echo $row['r_email'];?></td>
          <td><?php echo $row['sample_name'];?></td>
          <td><?php echo $row['sample_type'];?></td>
          <td><?php echo $row['date_requested'];?></td>
          <?php
          if($row['b1_status']==0){
          ?>
          <td><div class="ui buttons">
          <form class="ui form" action="" method="post"><input type="text" name="id" hidden value=<?php echo $row['sample_id'];?>>
          	<button type="submit" name="request" class="ui positive button">Approve</button>
  			      </form>        
          <div class="or"></div>
        <form class="ui form" action="" method="post"><input type="text" name="id" hidden value=<?php echo $row['sample_id'];?>>
            
          <button type="submit" name="cancel" class="ui red button">Cancel</button>      </form>
        </div></td>
  		<?php }
  		else if ($row['b1_status']==1){
  			?>
  				<td><div class="ui teal"><i class="right icon"></i> Approved</div></td>
  	<?php
  }

  ?>
        </tr>
      </tbody>
  <?php    
	$i++;
	}
}


?>
    </table>
  </div>
</div>
				  
				  
				</div>
			  <div id="buttons-menu" class="three wide column"></div>
		</div>
	</div>
</section>




</main>






<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
<!-- <script src="js/jquery.sliderPro.min.js"></script> -->

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js'></script><script  src="./script.js"></script>

</body>

<?php
if (isset($_REQUEST['request'])) {
	//echo "approved ".$_POST['id'];
	$s=$_POST['id'];
	$sql="SELECT b.receiver_id from blood_request_tracker b inner join blood_sample b1 on b1.sample_id=$s and b.hospital_id=b1.hospital_id";
	$ex3=$conn->query($sql);
	$r=mysqli_fetch_array($ex3);
	$r_id=$r['receiver_id'];
	$sql1="update blood_request_tracker set b1_status=1 where receiver_id= $r_id and sample_id='$s'";
	$ex4=$conn->query($sql1);
	if ($ex4) {
		
	
	?>
	<script>$('body').toast({
    title: 'Approved',
    displayTime: 5000,
    message: 'You approved the request',
    showProgress: 'top',
    progressUp: true,
    class : 'green',
    className: {
        toast: 'ui message'
    }
  });</script><?php
echo '<script type="text/javascript">setTimeout(function(){window.top.location="show_request.php"} , 5000);</script>';


	}
	else{?>
<script type="text/javascript">
  $('body').toast({
    title: 'Failed',
   
    message: 'It is having Some Technical Problem',
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
else if (isset($_REQUEST['cancel'])) {
	$s=$_POST['id'];
	$sql="SELECT b.receiver_id from blood_request_tracker b inner join blood_sample b1 on b1.sample_id=$s and b.hospital_id=b1.hospital_id";
	$ex3=$conn->query($sql);
	$r=mysqli_fetch_array($ex3);
	$r_id=$r['receiver_id'];
	$sql2="update blood_request_tracker set b1_status=2 where receiver_id= $r_id and sample_id='$s'";
	$ex5=$conn->query($sql2);
	
	if ($ex5) {
?>
<script type="text/javascript">
  $('body').toast({
    title: 'Cancelled',
     displayTime: 5000,
    message: 'You Canceled  the request ',
    showProgress: 'top',
    progressUp: true,
    class : 'red',
    className: {
        toast: 'ui message'
    }
  });
</script>
<?php
echo '<script type="text/javascript">setTimeout(function(){window.top.location="show_request.php"} , 5000);</script>';
}
else{
?>
<script type="text/javascript">
  $('body').toast({
    title: 'Failed',
    message: 'It is having Some Technical Problem',
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
