<?php
session_start();
if (isset($_SESSION['unique_id'])) {
   header("location: users.php");
}

?>

<?php
include_once "header.php";
?>

<body>
   <div class="wrapper">
      <section class="form signup">
         <header class="head">S'inscrire pour le  Tchat </header>
         <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="error-tx"></div>
            <div class="name-details">
               <div class="field input">
                  <label>Prénom</label>
                  <input type="text" name="fname" placeholder="Prénom" required>
               </div>
               <div class="field input">
                  <label>Nom</label>
                  <input type="text" name="lname" placeholder="Nom" required>
               </div>
            </div>
            <div class="field input">
               <label>Email</label>
               <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="field input">
               <label>Status</label>
               <input type="text" name="stat" placeholder="votre status svp" required>
            </div>
            <div class="field input">
               <label>Adresse</label>
               <input type="text" name="adess" placeholder="adresse" required>
            </div>
            <div class="field input">
               <label>Contact</label>
               <input type="text" name="conta" placeholder="contact" required>
            </div>
            <div class="field input">
               <label>Mot de Passe</label>
               <input type="password" name="pasword" placeholder="Mot de passe" required>
               <i class="fas fa-eye"></i>
            </div>
            <div class="field image">
               <label>Mettre Image</label>
               <input type="file" name="image">
            </div>

            <div class="field button">
               <input type="submit" name="submit" value="Connexion">
            </div>
            <div class="link">Avez-vous deja un compte? <a href="login1.php">Connecter Vous</a></div>
            <a href="accueil.php" class="btn btn-secondary ml-2" style="border: 2px solid #362D73; background:#362D73; color:#fff; text-align:center; border-radius: 5px;">Rétour</a>
         </form>
      </section>
   </div>
   <script src="./js/passw.js"></script>
   <script src="./js/signup.js"></script>
</body>

</html>