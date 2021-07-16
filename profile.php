<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Blood Bank</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>

</head>
<body>

	<!-- Menu -->
	<div class="ui fixed teal  menu">
		<div  class="header item">
        
         <em data-emoji=":drop_of_blood:" class="tiny"></em><em data-emoji=":bank:" class="tiny"></em>Blood Bank
       </div>
    <div class="ui   container">
      
      <a href="#" class="item"><i class="home icon"></i>Home</a>
      <a href="#" class="item"><i class="paper plane icon"></i> Request Blood</a>
      
      <div class="right menu">
        <div class="item">
          
       <a id="test" class="ui basic  button" href="#"><i class="sign in icon"></i>Log in</a>
        </div>
        <div class="item">
        <a class="ui basic button" href="#">
        	
			  
			  <div class="ui  dropdown icon button"><i class="user plus icon"></i>Sign Up
			    <i class="dropdown icon"></i>
			    <div class="menu">
			      <div class="item"><i class="user circle outline icon"></i> Reciever</div>
			      <div class="item"><i class="hospital user icon"></i> Hospital</div>
			    </div>
			  </div>
			</a>
        </div>
        </div>
    </div>
  </div>







<!-- login Page -->

  <div class="ui modal test" id="test">
       <div class="ui raised very padded center aligned text container segment">
  <h1 class="ui header">Log in</h1>
  <br>
  <div class="field">
   <div class="ui left icon input">
  <i class="mail outline icon"></i>
    <input type="email" name="email" placeholder="Email Address" autofocus="true">
  </div></div>
<br>
    <div class="field">
  <div class="ui left icon input">
<i class="lock icon"></i>
    <input type="password" name="password" placeholder="Password">
  </div></div>
<br>
  
  <div class="field">
  <div class="ui left icon input">
  <i class="lock icon"></i>
   <input type="password" name="password_confirmation" placeholder="Password Confirmation">
  </div></div><br>

  <div class="actions">
    <button class=" ui large teal button" type="submit">Log in</button>
  </div>
  <br>
  <p>Don't have an account? <a href="#"> Sign up </a>
</div>
       </div>

       <!-- Login page end -->
<br><br><br><br><br><br><br><br><br>
<!-- partial:index.partial.html -->

<div class="ui divided items">
  <div class="item">
    <div class="image">
      <img src="/images/wireframe/image.png">
    </div>
    <div class="content">
      <a class="header">12 Years a Slave</a>
      <div class="meta">
        <span class="cinema">Union Square 14</span>
      </div>
      <div class="description">
        <p></p>
      </div>
      <div class="extra">
        <div class="ui label">IMAX</div>
        <div class="ui label"><i class="globe icon"></i> Additional Languages</div>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="image">
      <img src="/images/wireframe/image.png">
    </div>
    <div class="content">
      <a class="header">My Neighbor Totoro</a>
      <div class="meta">
        <span class="cinema">IFC Cinema</span>
      </div>
      <div class="description">
        <p></p>
      </div>
      <div class="extra">
        <div class="ui right floated primary button">
          Buy tickets
          <i class="right chevron icon"></i>
        </div>
        <div class="ui label">Limited</div>
      </div>
    </div>
  </div>
  <div class="item">
    <div class="image">
      <img src="/images/wireframe/image.png">
    </div>
    <div class="content">
      <a class="header">Watchmen</a>
      <div class="meta">
        <span class="cinema">IFC</span>
      </div>
      <div class="description">
        <p></p>
      </div>
      <div class="extra">
        <div class="ui right floated primary button">
          Buy tickets
          <i class="right chevron icon"></i>
        </div>
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
    >
</div>$(function(){
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
