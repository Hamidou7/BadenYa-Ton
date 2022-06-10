<?php
   include_once "header.php";
?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header class="head">S'autentifier</header>
            <form action="#" autocomplete="off">
            <div class="error-tx"></div>
                <div class="name-details">
                    <div class="field input">
                      
                     <div class="field input">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Entrer votre Email" required>
                     </div>
                     <div class="field input">
                        <label>Mot de Passe</label>
                        <input type="password" name="pasword" placeholder="Entrer votre de passe" required>
                        <i class="fas fa-eye"></i>
                     </div>
                   
              
                <div class="field button">
                    <input type="submit" value="Connexion">
                 </div>
                 <div class="link">Vous n'avez pas un compte? <a href="inscription.php">Creer un Compte</a></div>
            </form>
        </section>
    </div>
    <script src="./js/passw.js"></script>
    <script src="./js/login.js"></script>
</body>
</html>