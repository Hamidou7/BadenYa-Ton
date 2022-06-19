<?php
session_start();
if (!isset($_SESSION['fname'])) {
    header("location : login2.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil BadenYa Ton</title>
  <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style/accueil.css">
</head>

<body>
  <nav class="navbar ccnav">
    <div class="container-fluid ccontainer" style="margin-top: -6px;margin-bottom:-4px;margin-left: -5px;">
      <a class="navbar-brand">
        <img src="./img/tontine.png" alt="" width="60" height="36" style="background-color: #ffff;" class="ccimg">
        <span class="text-uppercase ac ms-5">BadenYa Ton<span>
      </a>
      <a class="navbar-brand" href="#">
        <img src="./img/tontine.png" alt="" width="60" height="36" style="background-color: #ffff; margin-right: -5px;" class="ccimg">
      </a>
    </div>
  </nav>
  <section class="container-fluid couleur">

    <div class="row">
      <div class="col-10  mt-4 text-center">
        <p class="trois ">La mutualite au coeur de la fraternité</p>
      </div>
      <div class="col-2 sm-8 mt-1 text-end">
        <button class="quatre" onclick="window.location.href = 'logout2.php'">Deconnexion</button>
      </div>


    </div>
    <div class="row">
      <div class="col-2 mt-5">
        <a href="index2.php" class="cinq">Membre</a> <br>
        <a href="inscription.php" class="cinq">We Chat</a> <br>
        <a href="create.php" class="cinq">Ajouter membre</a>
      </div>
      <div class="col-10 mt-5 ">
        <div class="blanc d-flex justify-content-center" style="margin-top: 56px;">
          <span class="compte" style="color: #ccc;">Compte de : <?php echo htmlspecialchars($_SESSION["fname"]) ?></span>
          <a href="paiement.php" class="cotisation px-3">Payer Cotisation</a>
          <form action="" method="post">
            <label for="solde" class="solde" input type="text" id="solde" name="solde">Votre solde est : </label>
            <label for="etat" class="etat" type="text" id="etat" name="etat">Etat du compte:</label>

          </form>
        </div>
      </div>
    </div>

    </div>
  </section>
</body>

</html>