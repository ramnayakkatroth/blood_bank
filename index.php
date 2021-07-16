<?php
include_once './db.php';
include_once './login.php';


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
        
          <div class="ui blue  header item"  >Welcome</div>
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









<!-- partial:index.partial.html -->
<div class="ui inverted  vertical masthead center aligned raised segment">

  <div class="ui text container">
    <h1 class="ui inverted header">
        Welcome to Blood bank<em data-emoji=":bank:" class="tiny"></em>
      </h1>
    <h2>Blood bank provides blood samples from trusted Hospital . And we can request the sample from hospitals. They can accept and provide the samples.</h2>
    <a href="./hospital.php" target="_blank" class="ui huge primary button">Request Blood <i class="right arrow icon"></i></a>
  </div>

</div>


<div class="ui teal piled segment container">
 <h1 class="ui center aligned violet header">All Hospitals</h1> 
</div>
<?php
 $sq5="SELECT  * from hospital LIMIT 4 ";
 $exe2=$conn->query($sq5);
          
?>
<div class="ui four  cards container">
  <?php 
  if (mysqli_num_rows($exe2)>0) {
    while ($id2=mysqli_fetch_array($exe2)) {
      
    ?>
  <div class="ui  card">
    <div class="image">
      <img src=<?php echo './images/hospital/'.$id2['h_image']; ?>>
    </div>
    <div class="content">
      <div class=" ui label header"><?php echo $id2['h_name']; ?></div>
      
      <div class="description"><?php echo $id2['h_address']; ?></div>
    </div>
    <div class="extra content">
      <a class="friends">
        <button class="ui primary button">Request</button></a>
    </div>
  </div><?php }
  }
  ?></div><br><br>
  
<center><button class="ui  button">more<em data-emoji=":small_red_triangle_down:" class="small"></em></button>
  </center>
<br><br>

<div class="ui inverted vertical footer segment">
  <div class="ui container">
    <div class="ui stackable inverted divided equal height stackable grid">
      <div class="three wide column">
        <h4 class="ui inverted header">About</h4>
        <div class="ui inverted link list">
          <a href="#" class="item">Sitemap</a>
          <a href="#" class="item">Contact Us</a>
          <a href="#" class="item">Religious Ceremonies</a>
          <a href="#" class="item">Gazebo Plans</a>
        </div>
      </div>
      <div class="three wide column">
        <h4 class="ui inverted header">Services</h4>
        <div class="ui inverted link list">
          <a href="#" class="item">Banana Pre-Order</a>
          <a href="#" class="item">DNA FAQ</a>
          <a href="#" class="item">How To Access</a>
          <a href="#" class="item">Favorite X-Men</a>
        </div>
      </div>
     
      <div class="seven wide column">
        <h4 class="ui inverted header">Footer Header</h4>
        <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
  <script type="text/javascript">
  	$('.ui.dropdown')
  .dropdown({
    useLabels: false
  });
    $(function(){
      $("#test").click(function(){
        $(".test").modal('show');
      });
      $(".test").modal({
        closable: true
      });
    });
  </script>
</body>
</html>
