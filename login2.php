<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config2.php";

// Define variables and initialize with empty values
$fname = $pass = "";
$fname_err = $pass_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["fname"]))) {
        $fname_err = "Please enter username.";
    } else {
        $fname = trim($_POST["fname"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["pass"]))) {
        $pass_err = "Please enter your password.";
    } else {
        $pass = trim($_POST["pass"]);
    }

    // Validate credentials
    if (empty($fname_err) && empty($pass_err)) {
        // Prepare a select statement
        $sql = "SELECT id, fname, pass FROM user WHERE fname = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_fname);

            // Set parameters
            $param_fname = $fname;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($id, $fname, $hashed_password);
                    if ($stmt->fetch()) {
                        if ($_POST['pass'] === $pass) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["fname"] = $fname;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password1.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <a class="navbar-brand">
            <img src="./img/tontine.png" alt="" width="60" height="36" style="background-color: #ffff;" class="ccimg">
            <span class="text-uppercase ac ms-5">BadenYa Ton<span>
        </a>
        <h2 class="text-center" style="border: 2px solid #AC3A3A; background:#AC3A3A; color:#fff; border-radius:5px;">Connexion</h2>
        <p>Veuillez renseigner vos identifiants pour vous connecter.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                <span class="invalid-feedback"><?php echo $fname_err; ?></span>
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="pass" class="form-control <?php echo (!empty($pass_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $pass_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Connexion">
            </div>
            <p>Changer mot de passe <a href="reset-password.php">Ici</a>.</p>
        </form>
    </div>
</body>

</html>