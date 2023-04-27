<?php
session_start();

// Initialisation
$username = "";
$email    = "";
$errors = array(); 

// Connexion à la database
$db = mysqli_connect('localhost', 'root', '', 'project');

// Page inscription
if (isset($_POST['reg_user'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // Test d'erreurs
  
  if (empty($username)) { array_push($errors, "Identifiant nécessaire"); }
  if (empty($email)) { array_push($errors, "Email nécessaire"); }
  if (empty($password_1)) { array_push($errors, "Mot de passe nécessaire"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Les deux mots de passe ne sont pas identiques");
  }

  // Verification que la personne n'est pas déjà inscrite
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // SI l'utilisateur existe déjà ->
    if ($user['username'] === $username) {
      array_push($errors, "Identifiant déjà existant");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email déjà existant");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//Cryptage 

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Vous êtes connecté";
  	header('location: capteur.php');
  }
}

// Page de connexion
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Identifiant nécessaire");
  }
  if (empty($password)) {
  	array_push($errors, "Mot de passe nécessaire");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Vous êtes connecté";
  	  header('location: capteur.php');
  	}else {
  		array_push($errors, "Identifiant ou mot de passe incorrect");
  	}
  }
}

?>