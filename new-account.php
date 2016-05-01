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
		foreach($accounts as $cred => $jsons){
    		foreach($jsons as $user => $pwd){
    			if ($user == $username) {
    				$userexists = TRUE;
    			}
    		}
		}
		if($userexists == TRUE){
			header('Location: /create.php');
		}
		else{
			$newAcc = array($username => $password);
			array_push($accounts, $newAcc);
			$jsonAcc = json_encode($accounts);
			file_put_contents('accounts.json', $jsonAcc);
			$_SESSION['user'] = $username;
			
			//create favorites file
			
			file_put_contents("favorites/".$username.".json", "[]");
			
			header('Location: /index.php');
		}
		?>
	</body>
</html>