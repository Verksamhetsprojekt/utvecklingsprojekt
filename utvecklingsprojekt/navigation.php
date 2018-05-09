<?php
$navigation = <<<END
<nav class="navbar navbar-expand-sm bg-light navbar-light justify-content-center">
  <ul class="navbar-nav">
  <a class="navbar-brand" href="#"><img src="https://preview.ibb.co/nceTuS/32169639_10155946711364024_7519437869195198464_n.jpg" alt="32169639_10155946711364024_7519437869195198464_n" border="0" height="40" width="40">HFAB</a>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Hem</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">Om oss</a>
    </li>
    
  


END;

if(isset($_SESSION['userId']))
{

$navigation .= '
  <li class="nav-item">
      <a class="nav-link" href="articles.php">Artiklar</a>
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
    <a class="nav-link" href="gods.php">Kundordrar</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="fakturor.php">Leverantörsfakturor</a>
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
        Statistik</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="statistik.php">Försäljning över tid</a>
        <a class="dropdown-item" href="statistik2.php">Försäljning och totala leveranser per leverantör</a>
        <a class="dropdown-item" href="statistik3.php">Antal artiklar i lager</a>
        </div>
    </li>';
  $navigation .= '

  <li class="nav-item">
    <a class="nav-link" href="fakturor.php">Fakturor</a>
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
      <a class="dropdown-item" href="login.php">Logga in som personal</a>
        <a class="dropdown-item" href="loginlev.php">Logga in som leverantör</a>
        
        </div>
    </li></ul>';

}
$navigation .= <<<END
</nav>
END;
?>