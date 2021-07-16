

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
body > .grid {
  height: 100%;
}

.column {
  max-width: 360px;
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







<!-- login Page -->
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <form class="ui form" method="post" action="./login.php">
      <div class="ui segment">
        <h1><i class="connectdevelop icon"></i></h1>
      <h2>Log in to App</h2>
        <div class="ui center aligned basic segment">
          <form class="ui form">
            <div class="field">
              <div class="ui left input">
                <input type="text" name="email" placeholder="Email adress">
              </div>
            </div>
            <div class="field">
              <div class="ui left input">
                <input type="password" name="password" placeholder="Password">
              </div>
            </div>
            <button class="ui primary fluid button" name="login_submit" type="submit">Log in</button>
          </form>
          <div class="ui divider"></div>
          <a href="#">Forgot password?</a>
        </div>
      </div>
      <div class="ui segment">
        New here? <a href="#">Sign Up</a>
      </div>
    </form>
  </div>
</div>

   

       <!-- Login page end -->
<br><br><br><br><br><br><br><br><br>
<!-- partial:index.partial.html -->




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
