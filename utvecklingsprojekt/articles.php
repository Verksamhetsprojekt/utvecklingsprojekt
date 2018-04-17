<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	echo $navigation;
	?>

<!-- Här börjar Body - här lägger du in kod som ska visas i $content -->
	<body class="body">
		<div class="container text-center">
			<?php
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
		{$row->utpris_prislista_a}<br>
		<a href="article_details.php?artikelnr={$row->artikelnr}">Läs mer</a><br>
END;
		if(isset($_SESSION['userId']))
		{
			    $content .= <<<END
					<a href="delete.php?artikelnr={$row->artikelnr}" onclick="return
				confirm('Är du säker?')">Ta bort artikel</a><br>
				<a href="edit_article.php?artikelnr={$row->artikelnr}">Redigera artikel</a></br>
END;
		}
        
    $content .= '<hr>';
	}
}
			echo $content;
			?>
		</div>
	</body>
<!-- Här slutar Body-->

	<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>
</html>