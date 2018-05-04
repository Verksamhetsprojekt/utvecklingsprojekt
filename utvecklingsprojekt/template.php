<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


		<title>HFAB</title>
	</head>
	<div class="row">
	<header>
		<div class="col">
		<h1>Välkommen till Hellströms Fordonsteknik AB</h1>
		<h6><i>Din specialistpartner sedan 1967</i></h6><hr>
	</div>
	</header>
	<body>
		 <div class="col">
 

<?php
header('Content-Type: text/html; charset=UTF-8');
session_name('HFAB');
session_start();
ob_start();
session_regenerate_id();

$mysqli = new mysqli("localhost", "root", "root", "hfab");
mysqli_set_charset($mysqli,"utf8");
/*$username = "timhal16";
$password = "l_CjusJpUi";
$database = "timhal16_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
*/


$navigation = <<<END
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="articles.php">Artiklar</a>
    </li>
  


END;

if(isset($_SESSION['userId']))
{
	$navigation .= '
  
    <li class="nav-item">
      <a class="nav-link" href="add_article.php">Lägg till artikel</a>
    </li>';
  $navigation .= '

  
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Registrera ny användare</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="register.php">Registrera personal</a>
        <a class="dropdown-item" href="registerlev.php">Registrera leverantör</a>
        </div>
    </li>';
   $navigation .= '
  
  <li class="nav-item">
      <a class="nav-link" href="logout.php">Logga ut</a>
    </li>';
      $navigation .= 'Inloggad som ' . $_SESSION['username'];
}
else if(isset($_SESSION['levId']))
{
  $navigation .= '
  
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Se statistik</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="statistik.php">Statistik betalningar</a>
        <a class="dropdown-item" href="statistik.php">Statistik leveranser</a>
        </div>
    </li>
    ';
  $navigation .= '

  <li class="nav-item">
    <a class="nav-link" href="fakturor.php">Se fakturor</a>
    </li>';
  $navigation .= '

  <li class="nav-item">
    <a class="nav-link" href="leveranser.php">Se leveranser</a>
    </li>';  
  $navigation .= '
  
  <li class="nav-item">
      <a class="nav-link" href="logout.php">Logga ut</a>
    </li>';
  $navigation .= 'Inloggad som ' . $_SESSION['levname'];
}
else
{
	$navigation .= '<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Logga in</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="loginlev.php">Logga in som leverantör</a>
        <a class="dropdown-item" href="login.php">Logga in som personal</a>
        </div>
    </li></ul>';

}
$navigation .= <<<END
</nav>
END;
$footer = <<<END
    <p>&copy; 2018 Jelena Medjed - Jannica Edfeldt - Tim Hallerhed</p>
END;
?>

	</body>
</div>

	<footer class="container-fluid">
		 <div class="col">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
	</footer>
</div>
</html>