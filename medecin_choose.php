<?php
include('server.php');





// Requête SQL pour récupérer les noms d'utilisateurs
$query = "SELECT username FROM users WHERE medecin = 0";
$result = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <h1><?php  echo $_SESSION["patient"]   ?></h1>

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
        <input   type="submit" name="user_choice">
    </form>

    <input type="button" name="Insert_Ad" value="Ajouter utilisateur" onclick="location.href='register.php'">

</body>
</html>

