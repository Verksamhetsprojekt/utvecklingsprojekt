<?php
include('template.php');
if(isset($_GET['artikelnr'])&&isset($_SESSION['userId']))
{
	$query = <<<END
	DELETE FROM artikel
	WHERE artikelnr = '{$_GET["artikelnr"]}'
END;
$mysqli->query($query);
echo '<span style="color:Red">Artikeln har raderats</span>';
}
echo $navigation;
echo $footer;
?>