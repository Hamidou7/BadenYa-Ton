<?php
// Include config file
require_once "config2.php";

// Define variables and initialize with empty values
$fname  = $lname =  $adess = $conta = $stat = $pass = $confi_pass = "";
$fname_err = $lname_err = $adess_err =  $conta_err = $stat_err =  $pass_err =  $confi_pass_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_fname = trim($_POST["fname"]);
    if (empty($input_fname)) {
        $fname_err = "Please enter a name.";
    } elseif (!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $fname_err = "Please enter a valid name.";
    } else {
        $fname = $input_fname;
    }

    $input_lname = trim($_POST["lname"]);
    if (empty($input_lname)) {
        $lname_err = "Please enter a name.";
    } elseif (!filter_var($input_lname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $lname_err = "Please enter a valid name.";
    } else {
        $lname = $input_lname;
    }

    // Validate address
    $input_adess = trim($_POST["adess"]);
    if (empty($input_adess)) {
        $adess_err = "Please enter an address.";
    } else {
        $adess = $input_adess;
    }

    $input_conta = trim($_POST["conta"]);
    if (empty($input_conta)) {
        $conta_err = "Please enter an address.";
    } else {
        $conta = $input_conta;
    }

    $input_stat = trim($_POST["stat"]);
    if (empty($input_stat)) {
        $stat_err = "Please enter an address.";
    } else {
        $stat = $input_stat;
    }


    // Validate password
    if (empty(trim($_POST["pass"]))) {
        $pass_err = "S'il vous plait entrer un mot de passe.";
    } elseif (strlen(trim($_POST["pass"])) < 6) {
        $pass_err = "Le mot de passe doit contenir au moins 6 caracteres.";
    } else {
        $pass = trim($_POST["pass"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confi_pass"]))) {
        $confi_pass_err = "confirmer le mot de passe s'il vous plait.";
    } else {
        $confi_passw = trim($_POST["confi_pass"]);
        if (empty($pass_err) && ($pass != $confi_pass)) {
            $confi_pass_err = "Mot de passe different.";
        }
    }


    // Check input errors before inserting in database
    if (empty($fname_err)  && empty($lname_err) && empty($adess_err)  && empty($conta_err) && empty($stat_err) && empty($pass_err) && empty($config_config_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO user (fname, lname, adess, conta, stat, pass,confi_pass) VALUES (?, ?, ?, ?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssisii", $param_fname, $param_lname, $param_adess, $param_conta, $param_stat, $param_pass, $param_confi_pass);

            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_adess = $adess;
            $param_conta = $conta;
            $param_stat = $stat;
            $param_pass = $pass;
            $param_confi_pass = $confi_pass;
            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: index2.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ajout Membre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <a class="navbar-brand">
            <img src="./img/tontine.png" alt="" width="60" height="36" style="background-color: #ffff;" class="ccimg">
            <span class="text-uppercase ac ms-5">BadenYa Ton<span>
        </a>
                    <h2 class="mt-1 text-center" style="border: 2px solid #AC3A3A; background:#AC3A3A; color:#fff; border-radius:5px;">Ajout Membre</h2>
                    <p>Veuillez remplir ce formulaire et le soumettre pour ajouter un enregistrement de membre à la base de données.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                            <span class="invalid-feedback"><?php echo $fname_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Prenom</label>
                            <input type="text" name="lname" class="form-control <?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lname; ?>">
                            <span class="invalid-feedback"><?php echo $lname_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="adess" class="form-control <?php echo (!empty($adess_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $adess; ?>">
                            <span class="invalid-feedback"><?php echo $adess_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Contact</label>
                            <input type="number" name="conta" class="form-control <?php echo (!empty($conta_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $conta; ?>">
                            <span class="invalid-feedback"><?php echo $conta_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="stat" class="form-control <?php echo (!empty($stat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stat; ?>">
                            <span class="invalid-feedback"><?php echo $stat_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Mot de Passe</label>
                            <input type="password" name="pass" class="form-control <?php echo (!empty($pass_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pass; ?>">
                            <span class="invalid-feedback"><?php echo $pass_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Confirmer mot de passe</label>
                            <input type="password" name="confi_pass" class="form-control <?php echo (!empty($confi_pass_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confi_pass; ?>">
                            <span class="invalid-feedback"><?php echo $confi_pass_err; ?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Soumettre">
                        <a href="accueil.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>