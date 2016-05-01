<?php
session_start();

if($_SESSION["user"] == ""){
	header("Location: /login.php");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <title>News Feed </title>
    </head>
    <body>
    	<nav class="navbar navbar-default">
  			<div class="container-fluid">
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
      			</button>
      			<a class="navbar-brand" href="index.php">News Feed</a>
    		</div>
    		<div class="collapse navbar-collapse" id="navbar">
      			<ul class="nav navbar-nav">
        			<li class="active"><a href="#">Home</a></li>
        			<li class="dropdown">
          			<a class="dropdown-toggle" data-toggle="dropdown" href="#">News Feeds <span class="caret"></span></a>
		          		<ul class="dropdown-menu">
				            <li><a class="feed-filter" href="#">All</a></li>
	        				<li><a class="feed-filter" href="#">Favorites</a></li>
	        				<li><a class="feed-filter" href="#">US News (The Economist)</a></li>
	        				<li><a class="feed-filter" href="#">World News (BBC)</a></li>
	        				<li><a class="feed-filter" href="#">Sports (ESPN)</a></li>
	        				<li><a class="feed-filter" href="#">Weather(Rochester, NY)</a></li>
	        				<li><a class="feed-filter" href="#">Technology (CNET)</a></li>
		          		</ul>
        			</li>
      			</ul>
      			<ul class="nav navbar-nav navbar-right">
      				<?php if($_SESSION["user"] == ""){
				         echo '<li><a href="create.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      				}
      				else{
      					echo '<li id=logout><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';	
      				}
      				?>
      			</ul>
    		</div>
  			</div>
		</nav>
    	<div class="container">
    		<div class="jumbotron">
	        <?php if($_SESSION["user"] == ""){
	        	echo '<h1>Welcome to News Feed!</h1> <h3>Please sign in to access favorites</h3>';
	        }
	        else{
	        	echo '<h1>Welcome ' . $_SESSION["user"] . '</h1><h3 id="lastLogin"></h3>';
	        }
	        		  
	        	?>
	        </div>
		    <div class="row">
			    <div id = "newsfeed" class="col-md-12">
			    	
			    </div>
		    </div>
	    </div>
	    <script type="text/javascript">
  			google.load("feeds", "1");
  			var username = '<?php echo $_SESSION["user"]; ?>';
		</script>
		<script src="js/accmanage.js"></script>
		<script src="js/getnews.js"></script>
    </body>
</html>
