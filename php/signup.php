<?php
session_start();
include_once"config.php";
 $fname = mysqli_real_escape_string($conn, $_POST['fname']);
 $lname = mysqli_real_escape_string($conn, $_POST['lname']);
 $email = mysqli_real_escape_string($conn, $_POST['email']); 
 $pasword = mysqli_real_escape_string($conn, $_POST['pasword']);
 $adess = mysqli_real_escape_string($conn, $_POST['adess']);
 $conta = mysqli_real_escape_string($conn, $_POST['conta']);
 $stat = mysqli_real_escape_string($conn, $_POST['stat']);

  if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pasword)  && !empty($adess)  && !empty($conta)  && !empty($stat)){

      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
         if(mysqli_num_rows($sql)> 0){
             echo "$email - exite deja";

         }  else{
             if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png', 'jpeg','jpg'];
                    if(in_array($img_ext, $extensions) === true){
                          
                        $time = time();  

                      $new_img_name = $time.$img_name;
                      if (move_uploaded_file($tmp_name, "images/".$new_img_name)){
                          $statu = "en ligne";
                          $ran_id = rand(time(),10000000);


                          $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, fname, lname, email, pasword,img, statu, adess, conta, stat)
                                                VALUES({$ran_id}, '{$fname}', '{$lname}', '{$email}', '{$pasword}', '{$new_img_name}','{$statu}','{$adess}', '{$conta}', '{$stat}' ) ");
                          if($sql2){
                              $sql3 = mysqli_query($conn, "SELECT * FROM  users WHERE email = '{$email}'");
                              if(mysqli_num_rows($sql3) > 0){
                                  $row = mysqli_fetch_assoc($sql3);
                                  $_SESSION['unique_id'] = $row['unique_id'];
                                  echo "success";
                              }
                          }else{
                              echo"il y a une erreur ";
                          }                      
                      }
                      

                    }else{
                        echo"selectionner un fichier image - jpeg, jpg,png";
                    }
                    
             }else{
                 echo"veuillez inserer une image";
             }
         }   
        }else{
          echo"$email - email invalide!";
      }

  }else{
      echo " toutes les champs doivent etre rempli";
  }

?>