

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Blood Bank</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
<style type="text/css">
	#test {
	width: 300px;
}

#form-segment {
	padding-bottom: 22px;
}

#username, #email, #password {
	margin-top: 9px;
	text-align: center;
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

       <!-- Login page end -->
<br><br><br><br><br><br><br><br><br>
<!-- partial:index.partial.html -->
<div class="ui inverted violet vertical masthead center aligned segment container">
<center>
  <form id="test" class="ui  form" method="POST" action="res.php" enctype="multipart/form-data">
	<h4 class="ui center aligned top attached header">Please Enter Hospital Details</h4>
	<div id="form-segment" class="ui center aligned attached segment">
		<div class="field">
			<label for="username">Hospital Name:</label>
			<input type="text" id="username" name="username" placeholder="John Doe"  required>
		</div>
		<div class="field">
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" placeholder="john@doe.com" required>
		</div>
		<div class="field">
			<label for="address">Address:</label>
			<input type="text" id="address" name="address" placeholder="Enter Hospital address" required>
		</div>
		<div class="field">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="••••••••"  required>
		</div>
    <div class="field">
      <label for="mobile">Contact:</label>
      <input type="text" id="mobile" name="mobile" placeholder="place hospital contact number"  required>
    </div>
		<div class="field">
			<label for="h1">Hospital photo:</label>
			<input type="file" id="h1" name="h1" placeholder="place hospital image" required>
		</div>
	</div>
	<div id="form-message" class="ui attached message">
		<i class="icon help"></i>
		 <a href="#">Signup as Reciever</a>.
	</div><br>
	<button class="ui bottom attached fluid button" name="submit_hospital_signup" type="submit">Register</button>
</form></center>
</div>




<!-- partial -->
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
  <script type="text/javascript">
  	$('.ui.dropdown')
  .dropdown({
    useLabels: false
  });
    
  </script>
</body>
</html>
