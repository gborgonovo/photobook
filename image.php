<?php
if (isset($_GET['i']))
{
	$image = $_GET['i'];

	$path = "/volume1/photo/".urldecode($image);
 	if (is_readable($path))
	{
		$info = getimagesize($path);
		if ($info !== FALSE)
		{
			header("Content-type: {$info['mime']}");
			echo file_get_contents($path);
			exit();
		}
	}
	
}

header("Content-type: image/jpeg");
echo file_get_contents('images/nofoto.jpg');
exit();
?> 
