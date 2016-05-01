<html>
	<body>
		<?php
		$title = $_POST['title'];
		$link = $_POST['link'];
		$desc = $_POST['desc'];
		$file = $_POST['file'];
		
		$contents = file_get_contents($file);
		$contents = utf8_encode($contents);
		$favs = json_decode($contents, true);
		$data = array("title" => $title, "link" => $link, "contentSnippet" => $desc);
        array_push($favs, $data);
        $jsonData = json_encode($favs);
        file_put_contents($file, $jsonData);
		
		header("Location: /index.php");
		?>
	</body>
</html>