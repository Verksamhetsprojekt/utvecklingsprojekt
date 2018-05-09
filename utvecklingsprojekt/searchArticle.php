<!doctype html>
<html>
	<?php
	include('head.php');
	include('connection.php');
	include('navigation.php');
	echo $navigation;

	?>

	<body>
	<div class="container">
		<div style="text-align: center;">
    <div style="display: inline-block; text-align: left;">
      <h2>Sökresultat</h2><br>
		<a href="articles.php" class="btn btn-default">Tillbaka</a><hr>
		
		<?php
          
if(!isset($_SESSION['userId'])) { //(!isset) betyder att det INTE är set
header("refresh:0;url=login.php");
 echo '<script type="text/javascript">alert("Du har inte behörighet, vänligen logga in");</script>';

exit;
}

if(!isset($_GET['Search'])) {
		header("Location:article.php");
	}

$query= <<<END
SELECT * FROM article WHERE Description LIKE '%{$_GET['Search']}%' OR ArticleNumber LIKE '%{$_GET['Search']}%'
END;

$res = $mysqli->query($query) or die($mysqli->error);
if($res->num_rows > 0) {
	while($row = $res->fetch_object()) {
		$content .= <<<END
		Artikelnummer: {$row->ArticleNumber} <br>
		Beskrivning: {$row->Description}<br>
		Pris: {$row->SalesPrice} <br>
		<a href="article_details.php?ArticleNumber={$row->ArticleNumber}">Läs mer</a>  <a href="edit_article.php?ArticleNumber={$row->ArticleNumber}">Redigera artikel</a> <a href="delete.php?ArticleNumber={$row->ArticleNumber}" onclick="return confirm('Är du säker på att du vill radera artikeln?')">Radera artikel</a>
		<hr>
END;
	}
}

?>
<?php 

/* 
	if(mysql_num_rows($search_query) !=0) {
		do { ?>
			<p><?php echo $search_rs; ?></p>
<?php		} while ($search_rs=mysql_fetch_assoc($search_query));
	}else{
		echo "Inga resultat";
	}*/
?>

	<?php


    		
			echo $content;
			?>
</div>
</div>
</div>
</body>
<footer class="footer container-fluid text-center bg-light">
		<?php
		include('footer.php');
		?>
	</footer>

</html>