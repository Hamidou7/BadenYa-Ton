<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "config2.php";

    // Prepare a select statement
    $sql = "SELECT * FROM user WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

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
                // URL doesn't contain valid id parameter. Redirect to error page
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;

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
                    <h2 class="text-center" style="border: 2px solid #AC3A3A; background:#AC3A3A; color:#fff; border-radius:5px;">Liste des membres</h2>
                    <h1 class="mt-5 mb-3 d-flex"></h1>
                    <div class="form-group mx-5 ">
                        <label>Nom</label>
                        <p><b><?php echo $row["fname"]; ?></b></p>
                    </div>

                    <div class="form-group mx-5">
                        <label>Prenom</label>
                        <p><b><?php echo $row["lname"]; ?></b></p>
                    </div>

                    <div class="form-group mx-5">
                        <label>Adresse</label>
                        <p><b><?php echo $row["adess"]; ?></b></p>
                    </div>
                    <div class="form-group mx-5">
                        <label>Contact</label>
                        <p><b><?php echo $row["conta"]; ?></b></p>
                    </div>
                    <div class="form-group mx-5">
                        <label>Statut</label>
                        <p><b><?php echo $row["stat"]; ?></b></p>
                    </div>
                    <p><a href="index2.php" class="btn btn-primary mx-5">Retour</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>