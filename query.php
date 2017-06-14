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
    <br />
    <form action="" method="post">
      <div class="input-field col s12">
        <select name="whatis">
          <?php
          while($linha=mysqli_fetch_row($resultForRegister)){
            echo "<option value=".$linha[1].">".$linha[8]."</option>";
          }
          ?>
        </select>
        <label>Escolha a empresa</label>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="submitButton1">Buscar
        <i class="material-icons right">send</i>
      </button>
    </form>
    <br />
    <?php
    if(isset($_POST['submitButton1']) && $_POST['whatis']){
      $apedir="SELECT * FROM couriers WHERE courier = \"" . $_POST['whatis'] . "\"";
      $req=mysqli_query($connect,$apedir);
      $linha=mysqli_fetch_array($req);
      echo "<table"." class="."striped"."><thead><tr><td>Empresa</td><td>Tempo de chegada ao Brasil</td><td>Média de entrega</td></thead><tbody>";
      echo "<tr><td>".$linha[8];
      echo "</td><td>".$linha[5]." dias";
      echo "</td>";
      echo "<td>".$linha[2]." dias";
      echo "</td></tbody>";
      echo "</table>";
      mysqli_close($connect);
    }
    else if(isset($_POST['submitButton1'])){
      echo "<div id="."message".">
      <p>
      <br />Faltam informações.
      </p>
      </div>";
    }
    ?>
    <br />
    <form action="" method="post">
      <div class="input-field col s12">
        <select name="state">
          <option value="ac">Acre</option>
          <option value="al">Alagoas</option>
          <option value="ap">Amapá</option>
          <option value="am">Amazonas</option>
          <option value="ba">Bahia</option>
          <option value="ce">Ceará</option>
          <option value="df">Distrito Federal</option>
          <option value="es">Espírito Santo</option>
          <option value="go">Goiás</option>
          <option value="ma">Maranhão</option>
          <option value="mt">Mato Grosso</option>
          <option value="ms">Mato Grosso do Sul</option>
          <option value="mg">Minas Gerais</option>
          <option value="pa">Pará</option>
          <option value="pb">Paraíba</option>
          <option value="pr">Paraná</option>
          <option value="pe">Pernambuco</option>
          <option value="pi">Piauí</option>
          <option value="rj">Rio de Janeiro</option>
          <option value="rn">Rio Grande do Norte</option>
          <option value="rs">Rio Grande do Sul</option>
          <option value="ro">Rondônia</option>
          <option value="rr">Roraima</option>
          <option value="sc">Santa Catarina</option>
          <option value="sp">São Paulo</option>
          <option value="se">Sergipe</option>
          <option value="to">Tocantins</option>
        </select>
        <label>Escolha o estado</label>
      </div>
      <button class="btn waves-effect waves-light" type="submit" name="submitButton2">Buscar
        <i class="material-icons right">send</i>
      </button>
    </form>
    <br />
    <?php
    if(isset($_POST['submitButton2']) && $_POST['state']){

      $apedir="SELECT * FROM states WHERE state = \"" . $_POST['state'] . "\"";
      $req=mysqli_query($connect,$apedir);
      $linha=mysqli_fetch_array($req);
      echo "<table"." class="."striped"."><thead><tr><td>Estado</td><td>Média de entrega</td></thead><tbody>";
      echo "<tr><td>".$linha[5];
      echo "</td><td>".$linha[2]." dias";
      echo "</td></tbody>";
      echo "</table>";
      mysqli_close($connect);
    }
    else if(isset($_POST['submitButton2'])){
      echo "<div id="."message".">
      <p>
      <br />Faltam informações.
      </p>
      </div>";
    }
    ?>
    <br />
    <a class="waves-effect waves-light btn" href="qcouriers.php">Ver ranking das empresas</a>
    <br /><br />
    <a class="waves-effect waves-light btn" href="qstates.php">Ver média de tempo de entrega dos estados</a>
    <br /><br />
    <p style="font-style: italic;">
      <br />Caso queira incluir uma nova companhia, entre em <a href="contact.php">contato</a> conosco.
    </p>
    <br />
  </main>
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
