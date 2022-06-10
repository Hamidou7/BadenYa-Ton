<?php
session_start();
if(isset($_SESSION['unique_id'])){
    header("location:login.php");
}
?>


<?php
   include_once "header.php";
?>
<body>
    <div class="wrapper">
        <section class="form users">
           <header>
            <div class="content">
               <img src="img3.jpg" alt="">
               <div class="details">
                   <span>Marichou</span>
                   <p>En ligne</p>
               </div>
            </div>
         
           <a href="#" class="logout">Déconnexion</a> 
         </header>
         <?php
         ?>
         <div class="search">
             <span class="text">Trouver un utilisateur</span>
             <input type="text" placeholder="Entrer un nom  ...">
             <button><i class="fas fa-search"></i></button>
         </div>
         <div class="users-list">
             <a href="#">
                 <div class="content">
                    <img src="im2.jpg"alt="">
                     <div class="details">
                          
                     <span>Marichou</span>
                     <p>Message de test</p>
                     </div>
                    
                 </div>
                 <div class="status-dot"><i class="fas fa-circle"></i></div>
             </a>
             <a href="#">
                <div class="content">
                   <img src="im2.jpg"alt="">
                    <div class="details">
                         
                    <span>Marichou</span>
                    <p>Message de test</p>
                    </div>
                   
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                   <img src="im2.jpg"alt="">
                    <div class="details">
                         
                    <span>Marichou</span>
                    <p>Message de test</p>
                    </div>
                   
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                   <img src="im2.jpg"alt="">
                    <div class="details">
                         
                    <span>Marichou</span>
                    <p>Message de test</p>
                    </div>
                   
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                   <img src="im2.jpg"alt="">
                    <div class="details">
                         
                    <span>Marichou</span>
                    <p>Message de test</p>
                    </div>
                   
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
            <a href="#">
                <div class="content">
                   <img src="im2.jpg"alt="">
                    <div class="details">
                         
                    <span>Marichou</span>
                    <p>Message de test</p>
                    </div>
                   
                </div>
                <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a>
         

         </div>
        </section>
    </div>
    <script src="./js/users.js"></script>
</body>
</html>