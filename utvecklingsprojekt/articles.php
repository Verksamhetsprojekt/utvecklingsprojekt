<?php
include('template.php');
$content = ' ';
$query = <<<END
SELECT * FROM artikel
ORDER BY created_at DESC
END;

$res = $mysqli->query($query);
if($res->num_rows > 0)
{
	while($row = $res->fetch_object())
	{
		$content .= <<<END
		{$row->benamning}<br>
		{$row->utpris_prislista_a}
		<hr>
END;
	}
}

echo "Test";
echo $navigation;
echo $content;
?>