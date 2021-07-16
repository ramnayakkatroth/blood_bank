<?php
include_once './db.php';
session_start();
if (isset($_POST['require'])) {
  
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
<div class="ui violet inverted piled segment center aligned header">
  All Hospital Details
</div>
<div class="ui  segment container example">
    
      <div class="ui relaxed divided items">
        <?php 
        $sq="SELECT * FROM hospital";
        $ex=$conn->query($sq);
        if(mysqli_num_rows($ex)>0){
          while($row=mysqli_fetch_array($ex)){
            ?>
        <div class="item">
          <div class="ui small image">
            <img src=<?php echo './images/hospital/'.$row['h_image'];?>>
          </div>
          <div class="content">
            <a class="header"><?php echo $row['h_name'];?></a>
            <div class="meta">
              <a><?php echo $row['h_date_added'];?></a>
              
            </div>
            <div class="description">
              <?php echo $row['h_address'];?>
            </div>
            <div class="extra">
              <form class="ui form" method="post" action="hospital_request.php">
                <input type="text" name="id"  value=<?php echo $row['hospital_id'];?>  hidden>                
              
              <button type="submit" name="require" class="ui right floated primary button">
                Show
                <i class="right chevron icon"></i>
              </button>
              </form>
              <div class="ui label">Limited</div>
            </div>
          </div>
        </div>
        <?php
          }
        }
        ?>
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
