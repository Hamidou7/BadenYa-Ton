<?php
// Include config file
require_once "config2.php";

// Define variables and initialize with empty values
$fname = $lname = $adess = $conta = $stat = "";
$name_err = $lname_err = $adess_err = $conta_err = $stat_err = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

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

    // Validate address address
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



    // Check input errors before inserting in database
    if (empty($fname_err)  && empty($lname_err) && empty($adess_err)  && empty($conta_err) && empty($stat_err)) {
        // Prepare an update statement
        $sql = "UPDATE user SET fname=?, lname=?, adess=?, conta=?, stat=? WHERE id=?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssi", $param_fname, $param_lname, $param_adess, $param_conta, $param_stat, $param_id);

            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_adess = $adess;
            $param_conta = $conta;
            $param_stat = $stat;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
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
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM user WHERE id = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $result->fetch_array(MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    $adess = $row["adess"];
                    $conta = $row["conta"];
                    $stat = $row["stat"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        $stmt->close();

        // Close connection
        $mysqli->close();
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .wrapper {
            width: 460px;
            margin: 0 auto;
        }
       
 </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-md-12">
                <a class="navbar-brand">
                        <img src="./img/tontine.png" alt="" width="60" height="36" style="background-color: #ffff;" class="ccimg">
                        <span class="text-uppercase ac ms-5">BadenYa Ton<span>
                    </a>
                    <h2 class="mt-3 text-center" style="border: 2px solid #AC3A3A; background:#AC3A3A; color:#fff; border-radius:5px;">Modification membre</h2>
                    <p>Veuillez modifier les valeurs d'entrée et soumettre pour mettre à jour le dossier du membres.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <label>Addresse</label>
                            <input name="adess" class="form-control <?php echo (!empty($adess_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $adess; ?>">
                            <span class="invalid-feedback"><?php echo $adess_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input name="conta" class="form-control <?php echo (!empty($conta_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $conta; ?>">
                            <span class="invalid-feedback"><?php echo $conta_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Statut</label>
                            <input type="text" name="stat" class="form-control <?php echo (!empty($stat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $stat; ?>">
                            <span class="invalid-feedback"><?php echo $stat_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Soumettre">
                        <a href="index2.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>