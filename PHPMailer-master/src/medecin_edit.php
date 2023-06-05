<?php
include('server.php');

$id = $_SESSION["patient_id"];
$patient_name = $_SESSION["patient"];
$db = mysqli_connect('herogu.garageisep.com', 'Cu7dIKBPWC_vitashield', 'CqT0EXXRXWyBvVh3', 'HwKgNc7yDt_vitashield');

$query  = "SELECT * FROM users WHERE id = '$id'";
$result = mysqli_query($db, $query);
$result =  mysqli_fetch_assoc($result);
$username = $result["username"];
$email = $result["email"];
$age = $result["age"];





$query  = "SELECT * FROM sensors WHERE user_id = '$id'";
$result = mysqli_query($db, $query);
$result =  mysqli_fetch_assoc($result);
$min_safe_cardiaque = $result["min_safe_cardiaque"];
$max_safe_cardiaque = $result["max_safe_cardiaque"];

$min_safe_sonore = $result["min_safe_sonore"];
$max_safe_sonore = $result["max_safe_sonore"];

$min_safe_temperature = $result["min_safe_temperature"];
$max_safe_temperature = $result["max_safe_temperature"];

$min_safe_particules = $result["min_safe_particules"];
$max_safe_particules = $result["max_safe_particules"];

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulaire PHP</title>
    <link rel="stylesheet" type="text/css" href="medecin.css">
</head>
<body>
    <form method="post" action="medecin_edit.php">
        <label for="texte">Username:</label>
        <input type="text" name="username" id="texte" value="<?php echo $username; ?>" /><br/><br/>

        <label for="numero1">Email:</label>
        <input type="text" name="email" id="texte" value="<?php echo $email; ?>" /><br/><br/>

        <label for="numero1">Age:</label>
        <input type="number" name="age" id="age" value="<?php echo $age; ?>" /><br/><br/>

        <label for="numero1">Seuil minimum BPM:</label>
        <input type="number" name="seuil_min_cardiaque" id="seuil_min_cardiaque" value="<?php echo $min_safe_cardiaque; ?>" /><br/><br/>

        <label for="numero2">Seuil maximum BPM:</label>
        <input type="number" name="seuil_max_cardiaque" id="seuil_max_cardiaque" value="<?php echo $max_safe_cardiaque; ?>" /><br/><br/>

        <label for="numero3">Seuil minimum sonore:</label>
        <input type="number" name="seuil_min_sonore" id="seuil_min_sonore" value="<?php echo $min_safe_sonore; ?>" /><br/><br/>

        <label for="numero4">Seuil maximum sonore:</label>
        <input type="number" name="seuil_max_sonore" id="seuil_max_sonore" value="<?php echo $max_safe_sonore; ?>" /><br/><br/>

        <label for="numero5">Seuil minimum temperature:</label>
        <input type="number" name="seuil_min_temperature" id="seuil_min_temperature" value="<?php echo $min_safe_temperature; ?>" /><br/><br/>

        <label for="numero6">Seuil maximum temperature:</label>
        <input type="number" name="seuil_max_temperature" id="seuil_max_temperature" value="<?php echo $max_safe_temperature; ?>" /><br/><br/>

        <label for="numero5">Seuil minimum particules:</label>
        <input type="number" name="seuil_min_particules" id="seuil_min_particules" value="<?php echo $min_safe_particules; ?>" /><br/><br/>

        <label for="numero6">Seuil maximum particules:</label>
        <input type="number" name="seuil_max_particules" id="seuil_max_particules" value="<?php echo $max_safe_particules; ?>" /><br/><br/>

        <input type="submit" name="user_edit" />
    </form>
</body>

</html>
