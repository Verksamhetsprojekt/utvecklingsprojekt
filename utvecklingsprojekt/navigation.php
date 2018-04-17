<?php
$navigation = <<<END
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
  <a class="navbar-brand" href="#">Logo</a>
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
  
    <li class="nav-item">
      <a class="nav-link" href="statistik.php">Se statistik</a>
    </li>';
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
?>