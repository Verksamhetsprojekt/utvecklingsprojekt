<?php
include('template.php');
if(isset($_POST))
{
	$content = <<<END
	<h3>Message was sent:</h3>
	Name: {$_POST["name"]}
	<br>
	Message: {$_POST["msg"]}
END;
}
echo $navigation;
echo $content;
?>