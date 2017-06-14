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
  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    var myUserEntity = {};
    myUserEntity.Id = profile.getId();
    myUserEntity.Name = profile.getName();

    //Store the entity object in sessionStorage where it will be accessible from all pages of your site.
    sessionStorage.setItem('myUserEntity',JSON.stringify(myUserEntity));
    window.location.href='register.php?email=' + profile.getEmail();
  }
  function signOut() {

    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('Está deslogado');
    });

  }
  </script>
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
      Para cadastrar dados no sistema, logue com sua conta google ou insira seu email:
    </div>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    <br />
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="text" class="validate">
            <label for="email">Email</label>
          </div>
        </div>

        <script>
        function empty() {
          var x = document.getElementById("email").value;
          if (x == "") {
            alert("Entre um email válido.");
          }
          else{
            window.location.href='register.php?email=' + document.getElementById("email").value;
          }
        }
        </script>
        <button class="btn waves-effect waves-light" type="submit" onclick="empty();return false;">Logar</button>
      </form>
    </div>
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
