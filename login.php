<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <title>Login</title>
    </head>
    <body>
    	<div class="container">
    		<h2>Sign in to Newsfeed</h2>
    		<form action="account.php" method="post" role="form">
  				<div class="form-group">
    				<label for="user">Username</label>
    				<input type="text" class="form-control" id="user" name="user">
  				</div>
  				<div class="form-group">
    				<label for="pwd">Password</label>
    				<input type="password" class="form-control" id="pwd" name="pwd">
  				</div>
  				<button type="submit" class="btn btn-default">Sign in</button>
  				<a href="create.php" class="btn btn-default">Create Account</a
			</form>
    	</div>
    </body>
</html>