<?php
   session_start();
   include_once"config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pasword = mysqli_real_escape_string($conn, $_POST['pasword']);
    

    if(!empty($email) && !empty($pasword)){
        
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND pasword = '{$pasword}'");
        if(mysqli_num_rows($sql) > 0){
         
            $row= mysqli_fetch_assoc($sql);
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";

        }else{
            echo"Email ou mot de passe incorrect";
        }

    }else{
        echo "Tous les champs doivent etre remplis.";
    }
