<?php

session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\src\SMTP.php';


function calculerAge($dateNaissance) {
  $dateActuelle = date('2023-06-01');
  $diff = date_diff(date_create($dateNaissance), date_create($dateActuelle));
  return $diff->format('%y');
}


// Initialisation
$username = "";
$email    = "";
$errors = array(); 
$id = 0;

$birthdate = "1900-01-01";
$age = 50;

// Connexion à la database
$db = mysqli_connect('localhost', 'root', '', 'project');

$_SESSION["patient"]="";

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
  $username = mysqli_real_escape_string($db, $_POST['username']);

  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $id = rand(0, 9999);
  $age = calculerAge($birthdate);
  
  
  


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
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
  


  



  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Identifiant déjà existant");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email déjà existant");
    }

    while ($user['id'] === $id) {
      $id = rand(0, 9999);
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password_crypted = md5($password_1);//encrypt the password before saving in the database

    $query1 = "INSERT INTO sensors (id,user_id)   VALUES('$id','$id')";
    
    $query2 =  "INSERT INTO users (id,username,age,birthdate, email, password) 
  			  VALUES('$id','$username','$age','$birthdate', '$email', '$password_crypted')";


  	mysqli_query($db, $query1);
    mysqli_query($db, $query2);
  	$_SESSION['username'] = $username;
    $_SESSION['id'] = $id;
  	$_SESSION['success'] = "Vous êtes connecté";



    $message_mail = "Bonjour,
                    votre compte Vitashield à été créer par votre medecin traitant.
                    Votre identifiant est  : '$username'.
                    Votre mot de passe est : '$password_1'.
                    ";


    
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.laposte.net';               //Adresse IP ou DNS du serveur SMTP
    $mail->Port = 465;                          //Port TCP du serveur SMTP
    $mail->SMTPAuth = 1;                        //Utiliser l'identification

    if($mail->SMTPAuth){
      $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
      $mail->Username   =  'vitashield@laposte.net';   //Adresse email à utiliser
      $mail->Password   =  'Motd3p@ssecaca';         //Mot de passe de l'adresse email à utiliser
    }

    $mail->Subject    =  'Creation de compte VitaShield';                      //Le sujet du mail
    $mail->WordWrap   = 50; 			                   //Nombre de caracteres pour le retour a la ligne automatique
    $mail->Body = $message_mail; 	       //Texte brut
    $mail->IsHTML(false);   


    $list_emails_to = array($email);
    foreach ($list_emails_to  as $key => $to_send) {
      $mail->AddAddress($to_send);
    }


    if (!$mail->send()) {
      $_SESSION["mail_sent"]=$mail->ErrorInfo;
  } else{
    $_SESSION["mail_sent"]="envoyé";
  }

  
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
  	$query = "SELECT * FROM users WHERE username ='$username' AND password ='$password'";
  	$results = mysqli_query($db, $query);

  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = "$username";
  	  $_SESSION['success'] = "Vous êtes connecté";

      $query  = "SELECT id FROM users WHERE username = '$username'";
      $result = mysqli_query($db, $query);
      $result =  mysqli_fetch_assoc($result);
      $id = $result["id"];

      $_SESSION['id'] = $id;


      
      $query  = "SELECT medecin FROM users WHERE username = '$username'";
      $result = mysqli_query($db, $query);
      $result =  mysqli_fetch_assoc($result);
      $medecin = $result["medecin"];

      if ($medecin==1){
        header('location: medecin_choose.php');
      }
      else {header('location: capteur.php');}

      
  	  
  	}else {
  		array_push($errors, "Identifiant ou mot de passe incorrect");
  	}
  }
}


if (isset($_POST['user_choice'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['utilisateur']);
  $_SESSION["patient"] = $username;

  $query  = "SELECT id FROM users WHERE username = '$username'";
  $result = mysqli_query($db, $query);
  $result =  mysqli_fetch_assoc($result);
  $id = $result["id"];
  $_SESSION["patient_id"] = $id;


  header('location: medecin_edit.php');


}
if (isset($_POST['user_edit'])) {
  
  $username = $_POST['username'];
  $age = $_POST['age'];
  $email = $_POST['email'];

  $id = $_SESSION["patient_id"];

  $query = "UPDATE users
  SET username = '$username', email = '$email', age = $age
  WHERE id = '$id'";
  mysqli_query($db, $query);

  $min_safe_cardiaque = $_POST['seuil_min_cardiaque'];
  $max_safe_cardiaque = $_POST['seuil_max_cardiaque'];
  $min_safe_sonore = $_POST['seuil_min_sonore'];
  $max_safe_sonore = $_POST['seuil_max_sonore'];
  $min_safe_temperature = $_POST['seuil_min_temperature'];
  $max_safe_temperature = $_POST['seuil_max_temperature'];
  $min_safe_particules = $_POST['seuil_min_particules'];
  $max_safe_particules = $_POST['seuil_max_particules'];


  $query = "UPDATE sensors
  SET min_safe_cardiaque = '$min_safe_cardiaque', max_safe_cardiaque = '$max_safe_cardiaque',
  min_safe_sonore = '$min_safe_sonore', max_safe_sonore = '$max_safe_sonore',
  min_safe_temperature = '$min_safe_temperature', max_safe_temperature = '$max_safe_temperature',
  min_safe_particules = '$min_safe_particules', max_safe_particules = '$max_safe_particules'


  WHERE user_id = '$id'";
  mysqli_query($db, $query);




  header('location: medecin_choose.php');


}














?>