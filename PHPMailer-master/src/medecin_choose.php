<?php
include('server.php');





// Requête SQL pour récupérer les noms d'utilisateurs
$id_medecin=$_SESSION['id'];
$query = "SELECT username FROM users WHERE medecin = 0 and id_medecin= $id_medecin";
$result = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" type="text/css" href="medecin.css">
</head>
<body>
<div class="container">
        <h1>Liste des utilisateurs</h1>
        <h1><?php echo $_SESSION["patient"]; ?></h1>

        <form action="medecin_choose.php" method="post">
            <label for="utilisateur">Utilisateur :</label>
            <select name="utilisateur" id="utilisateur">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["username"] . '">' . $row["username"] . '</option>';
                    }
                } else {
                    echo '<option value="">Aucun utilisateur trouvé</option>';
                }
                ?>
            </select>
            <br><br>
            <input type="submit" name="user_choice" value="Choisir">
        </form>

        <input type="button" name="Insert_Ad" value="Ajouter utilisateur" onclick="location.href='register.php'">
    </div>
</body>
</html>

