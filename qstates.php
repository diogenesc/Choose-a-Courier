<!DOCTYPE html>
<?php include "connect.php"; ?>
<html>
<head>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-1954121158162049",
    enable_page_level_ads: true
  });
</script>
  <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
  <meta name="theme-color" content="#b71c1c" />
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta charset="utf-8" />
  <title>Choose a Courier</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>$(document).ready(function() {
    $('select').material_select();
  });</script>
  <nav>
    <div class="nav-wrapper red darken-4">
      <a href="index.php" class="brand-logo center">Choose a Courier</a>
    </div>
  </nav>
  <div class="red darken-1 center-align">
    <a class="btn-flat white-text" href="index.php">Home</a>
    <a class="btn-flat white-text" href="register.php">Cadastrar</a>
    <a class="btn-flat white-text" href="query.php">Consultar</a>
    <a class="btn-flat white-text" href="contact.php">Contato</a>
  </div>

  <main class="container">

    <div class="white-text card-panel teal lighten-2">
      Nossos dados são alimentados pelos usuários, podendo variar por vários motivos de logística.
      Quanto menos dias para a entrega, melhor é o serviço da empresa.
    </div>
    <?PHP
    echo "<table"." class="."striped"." ><thead><tr><td>Estado</td><td>Média de entrega</td></thead><tbody>";
    while($linha=mysqli_fetch_row($resultByStates)){
      echo "<tr><td>".$linha[5];
      echo "</td><td>".$linha[2]." dias";
      echo "</td>";
    }
    echo "</tbody></table>";

    mysqli_close($connect);
    ?>
  </div>
</main>
<br />
<footer class="white-text page-footer red darken-4">
  <div class="footer-copyright">
    <div class="container">
      <p class="center-align">
        Um site feito com Materialize - Choose a Courier
      </p>
    </div>
  </div>
</footer>
</body>
</html>
