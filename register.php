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
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="549022149681-ie29afatbsoik35ovehrf6q69uig9m2e.apps.googleusercontent.com">
  <script>
  function checkIfLoggedIn()
  {
    <?php $emailusado=$_GET['email']; ?>
    console.log("<?php echo $emailusado; ?>");
    var ifemail=<?php if($_GET['email']) echo 1; else echo 0; ?>;
    console.log(ifemail);
    if(sessionStorage.getItem('myUserEntity') == null){
      //Redirect to login page, no user entity available in sessionStorage
      console.log("Não está logado  no Google");
      if(!ifemail)
        window.location.href='verify.php';
    }else {
      //User already logged in
      var userEntity = {};
      userEntity = JSON.parse(sessionStorage.getItem('myUserEntity'));
      console.log("Está logado no Google");
    }
  }

  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('Está deslogado');
    });
    sessionStorage.clear();
    //window.location.href='verify.php';
    window.location.replace('verify.php');
  }

  function onLoad() {
    gapi.load('auth2', function() {
      gapi.auth2.init();
    });
  }

  function alerta(i){
    if(i==1) alert("As informações foram gravadas, obrigado pela contribuição");
    else alert("Faltam informações");
  }
  </script>
  <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</head>
<body>
  <script>checkIfLoggedIn();</script>
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
      Contamos com a veracidade dos dados inseridos, portanto revise as informações inseridas, lembre que esse site é aberto para todos usarem e ajudarem.
    </div>
    <?php
    if(isset($_POST['submitButton']) && $_POST['whatis'] && $_POST['dias'] && $_POST['state']){
      echo "<script>alert(\"As informações foram gravadas, obrigado pela contribuição.\");</script>";
      //couriers
      $ver=mysqli_query($connect,"INSERT INTO logs (email,courier,br,house) VALUES (\"".$emailusado."\",\"".$_POST['whatis']."\",".$_POST['diasbr'].",".$_POST['dias'].")");
      $apedir="SELECT * FROM couriers WHERE courier = \"" . $_POST['whatis'] . "\"";
      $req=mysqli_query($connect,$apedir);
      $linha=mysqli_fetch_array($req);
      $novasoma=$linha[3]+$_POST['dias'];
      $novocont=$linha[4]+1;
      $novamedia=$novasoma/$novocont;
      $novasomabr=$linha[6]+$_POST['diasbr'];
      $novocontbr=$linha[7]+1;
      $novamediabr=$novasomabr/$novocontbr;
      $apedir="UPDATE couriers SET average = ". $novamedia ." , sum = " .$novasoma. " , counter = " . $novocont . " , averagebr = ". $novamediabr ." , sumbr = " .$novasomabr. " , counterbr = " . $novocontbr . " WHERE courier = \"". $_POST['whatis'] ."\"";
      $ver=mysqli_query($connect,$apedir);
      //states
      $apedir="SELECT * FROM states WHERE state = \"" . $_POST['state'] . "\"";
      $req2=mysqli_query($connect,$apedir);
      $linha=mysqli_fetch_array($req2);
      $novasoma=$linha[3]+$_POST['dias'];
      $novocont=$linha[4]+1;
      $novamedia=$novasoma/$novocont;
      $apedir="UPDATE states SET average = ". $novamedia ." , sum = " .$novasoma. " , counter = " . $novocont ." WHERE state = \"". $_POST['state'] ."\"";
      $ver=mysqli_query($connect,$apedir);
    }
    else if(isset($_POST['submitButton'])){
      echo "<script>alert(\"Faltam informações.\");</script>";
    }
    mysqli_close($connect);
    ?>
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
        <br />
      </div>
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
      <br />
      <form class="col s12">
        <div class="row">
          <div class="input-field col s6">
            <input placeholder="..." id="email" type="number" name="dias" class="validate">
            <label for="email">Quantos dias corridos demorou para chegar em sua casa?</label>
          </div>
          <div class="input-field col s6">
            <input placeholder="..." id="email" type="number" name="diasbr" class="validate">
            <label for="email">Quantos dias corridos demorou para chegar no Brasil?</label>
          </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="submitButton">Cadastrar
          <i class="material-icons right">send</i>
        </button>
      </form>
      <br />
      <a href="#" class="btn waves-effect waves-light" onclick="signOut();">Sign out</a>
      <p style="font-style: italic;">
        <br />Caso queira incluir uma nova companhia, entre em <a href="contact.php">contato</a> conosco.
      </p>
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
