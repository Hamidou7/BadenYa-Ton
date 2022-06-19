<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .wrapper {
            width: auto;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }

        .row {
            border-radius: 17px;
            color: #000;
            margin: 0 0 0 10px;
        }

      
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                    <a class="navbar-brand">
        <img src="./img/tontine.png" alt="" width="60" height="36" style="background-color: #ffff;" class="ccimg">
        <span class="text-uppercase ac ms-5">BadenYa Ton<span>
      </a>
                        <h2 class="text-center" style="border: 2px solid #AC3A3A; background:#AC3A3A; color:#fff;">Liste des membres de Badenya-ton</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Ajouter un Membre</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config2.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM user";
                    if ($result = $mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>id</th>";
                            echo "<th>Nom</th>";
                            echo "<th>Prenom</th>";
                            echo "<th>Adresse</th>";
                            echo "<th>contact</th>";
                            echo "<th>Statut</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch_array()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['fname'] . "</td>";
                                echo "<td>" . $row['lname'] . "</td>";
                                echo "<td>" . $row['adess'] . "</td>";
                                echo "<td>" . $row['conta'] . "</td>";
                                echo "<td>" . $row['stat'] . "</td>";
                                echo "<td>";
                                echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="Details" data-toggle="tooltip"><span class="fa fa-eye" style="color:#ccc"></span></a>';
                                echo '<a href="modification.php?id=' . $row['id'] . '" class="mr-3" title="Modifier" data-toggle="tooltip"><span class="fa fa-pencil" style="color:#ccc"></span></a>';
                                echo '<a href="supprimer.php?id=' . $row['id'] . '" title="Supprimer" data-toggle="tooltip"><span class="fa fa-trash" style="color:#ccc"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
                <div class="col-md-12 text-center">
                <a href="accueil.php" class="btn btn-primary" >retour</a>
        </div>
            </div>
            <p></p>
        </div>
    </div>
</body>

</html>