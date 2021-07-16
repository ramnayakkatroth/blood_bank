
<?php
include_once './db.php';
session_start();
if (!isset($_SESSION['userrole'])) {
  header("Location:./login1.php");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Blood Bank</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://germini.info/semantic/dimmer.css">
  <link rel="stylesheet" type="text/css" href="https://germini.info/semantic/transition.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
<script type="text/javascript" src="https://germini.info/semantic/dimmer.js"></script>
<script type="text/javascript" src="https://germini.info/semantic/transition.js"></script>
<style type="text/css">
  .ui.grid {
  margin: 0;
  width: 100%;
}
</style>
</head>
<body>

  <!-- Menu -->
	<div class="ui fixed teal  menu">
		<div  class="header item">
        
         <em data-emoji=":drop_of_blood:" class="tiny"></em><em data-emoji=":bank:" class="tiny"></em>Blood Bank
       </div>
    <div class="ui   container">
      
      <a href="./index.php" class="item"><i class="home icon"></i>Home</a>
      <a href="./hospital.php" class="item"><i class="paper plane icon"></i> Request Blood</a>
     
      <div class="right menu">
        <!--?php 
        if (isset($_SESSION['userrole']) and $_SESSION['userrole']=="Hospital") {

          echo "<script type='text/javascript'>alert('we can`t procced your request because you are in  hospital role we will redirecting to hospital  ')</script>";
      header("refresh:0,url=new/index.php");  
          }
       else --><?php
        if(isset($_SESSION['userrole']) and $_SESSION['userrole']=="Reciever"){
      ?>
        <div class="item">
        
          <h1 class="ui blue  header item"  >Welcome</h1>
            <div class="ui  dropdown icon button"><i class="user  icon"></i><?php echo $_SESSION['name'];?>
             <i class="dropdown icon"></i>
              <div class="menu">
                <a href="./logout.php" class="item"><i class="user circle outline icon"></i> Logout</a>
              
              </div>
            </div>
          </a>
        </div>

      <?php } else{?>
      <div class="item">
       <a id="test" class="ui basic  button" href="./login1.php"><i class="sign in icon"></i>Log in</a>
        </div>
        <div class="item">
        	
			  
			  <div class="ui  dropdown icon button"><i class="user plus icon"></i>Sign Up
			    <i class="dropdown icon"></i>
			    <div class="menu">
			      <a  href="./sinr.php"><div class="item"><i class="user circle outline icon"></i> Reciever</div></a>
			      <a  href="./signh.php"><div class="item"><i class="hospital user icon"></i> Hospital</div></a>
			    </div>
			  </div>
			
        </div>

      <?php }?>
        </div>
    </div>
  </div>








<!-- partial:index.partial.html --><br><br><br>




<br><br><br>

<?php
if (isset($_POST['request'])) {
  $h_id=$_POST['h_id'];
  $s_id=$_POST['s_id'];
  $r_id=$_POST['r_id'];
 
  $sq2="INSERT INTO `blood_request_tracker`(`receiver_id`, `sample_id`, `hospital_id`) VALUES ($r_id,$s_id,$h_id)";

  $ex3=$conn->query($sq2);
  if($ex3){
  	$sq4="UPDATE `blood_sample` SET `b_status`=1 WHERE sample_id=$s_id";
  	$ex5=$conn->query($sq4);
   ?>
   <script>
   	$('body').toast({
    title: 'Submitted',
    message: 'Request Submitted Successfully',
    showProgress: 'top',
    progressUp: true,
    class : 'green',
    className: {
        toast: 'ui message'
    }
  });
   </script>
   <?php
   echo '<script type="text/javascript">setTimeout(function(){window.top.location="hospital.php"} , 5000);</script>';
  }
  else{
  	?>
  	<script>
   	$('body').toast({
    title: 'Failed',
    message: 'Request Failed Due to Some Technical Issue.',
    showProgress: 'top',
    progressUp: true,
    class : 'red',
    className: {
        toast: 'ui message'
    }
  });
   </script>
  	<?php
  	echo '<script type="text/javascript">setTimeout(function(){window.top.location="hospital.php"} , 5000);</script>';
  }
}
?>



<div class="ui center aligned red raised segment container ">
    <h1 class="ui teal header">Hospital Details</h1>
  </div>

<div class="ui grid">
<?php 
if (isset($_REQUEST['require'])) {
$h_id=$_POST['id'];

$sq="SELECT * FROM hospital where hospital_id=$h_id";
$ex=$conn->query($sq);
$row=mysqli_fetch_array($ex);


?>
  <div class="four wide column">
    <div class="ui card">
      <div class="blurring dimmable image">
       
        <img class="ui circle image" src=<?php echo './images/hospital/'.$row['h_image']?>>
      </div>
      <div class="content">
        <div class="header"><?php echo $row['h_name'];?></div>
        <div class="meta">
          <a class="group"><?php echo $row['h_address'];?></a>
        </div>
      </div>
      <div class="extra content">
        <a class="right floated created">
                <?php echo $row['h_date_added'];?>
              </a>
        <a class="friends">
          <i class="user icon"></i> 22 requested
        </a>
      </div>
    </div>
  </div>
  
  <div class="twelve wide column">
    <table class="ui celled table">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Sample Name</th>
          <th>Blood type</th>
          <th>date added</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php 

      $s=$_SESSION['name'];
      $sq3="SELECT * FROM receiver where r_name='$s'";
      $ex4=$conn->query($sq3);
      $r=mysqli_fetch_array($ex4);
      $r1_id=$r['receiver_id'];
    $sq1=" SELECT * FROM hospital h inner join blood_sample b on b.hospital_id=$h_id";
    $ex2=$conn->query($sq1);
    //$sql3="SELECT * FROM hospital h ,blood_sample b,blood_request_tracker b1 where b.hospital_id=$h_id  and b.sample_id=b1.sample_id";
    //echo $sql3;
    if (mysqli_num_rows($ex2)>0 ) {
      $i=1;
      while($row=mysqli_fetch_array($ex2)){
        ?>
      <tbody>
        <tr>
          <td>
            <div class="ui ribbon label"><?php echo $i;?></div>
          </td>
          <td><?php echo $row['sample_name']?></td>
          <td><?php echo $row['sample_type']?></td>
           <td><?php echo $row['date_added']?></td>
           <td><form class="ui form" action="" method="post">
           	<input type="text" name="h_id" hidden value=<?php echo $row['hospital_id'];?>>
            <input type="text" name="s_id" hidden value=<?php echo $row['sample_id'];?>>
            <input type="text" name="r_id" hidden value=<?php echo$r1_id;?>>
            <?php 
            if($row['b_status']==0){?>
              <button  type="submit" name="request" class="ui blue button">Request</button></form></td>
              <?php

            }else if($row['b_status'] ==1){
            	?>
					<div class="ui teal message">
                Waiting for Request Approval
              </div>            		
            	<?php
            }

            else{?>

              <div class="ui green message">
                Already requested
              </div>
              <?php
            }
           ?>
        </tr>
      
      </tbody>
      <?php
      $i++;
}}
      ?>
      <tfoot>
        <tr>
          <th colspan="3">
            <div class="ui right floated pagination menu">
              <a class="icon item">
                <i class="left chevron icon"></i>
              </a>
              <a class="item">1</a>
              <a class="item">2</a>
              <a class="item">3</a>
              <a class="item">4</a>
              <a class="icon item">
                <i class="right chevron icon"></i>
              </a>
            </div>
          </th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<?php
}
?>

<!-- partial -->
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
  <script type="text/javascript">
    $('.ui.dropdown')
  .dropdown({
    useLabels: false
  });
   $('.dimmer')
  .dimmer({
    on: 'hover'
  });
  </script>
</body>
</html>
