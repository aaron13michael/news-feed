<?php
session_start();
?>
<html>
	<body>
		<?php
		$contents = file_get_contents("accounts.json");
		$contents = utf8_encode($contents);
		$accounts = json_decode($contents, true);
		$username = $_POST["user"];
		$password = $_POST["pwd"];
		$userexists = FALSE;
		$passmatch = FALSE;
		foreach($accounts as $cred => $jsons){
    		foreach($jsons as $user => $pwd){
    			if ($user == $username) {
    				$userexists = TRUE;
    				if($pwd == $password){
    					$passmatch = TRUE;
    				}
    			}
    		}
		}
		if($userexists == TRUE && $passmatch == TRUE){
			$_SESSION["user"] = $username;
			header('Location: /index.php');
		}else{
		header('Location: /login.php');
		}
		?>
	</body>
</html>