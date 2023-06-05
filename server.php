<?php

session_start();
$db = mysqli_connect('herogu.garageisep.com', 'Cu7dIKBPWC_vitashield', 'CqT0EXXRXWyBvVh3', 'HwKgNc7yDt_vitashield');


//require 'PHPMailer-master\src\Exception.php';
//require 'PHPMailer-master\src\PHPMailer.php';
//require 'PHPMailer-master\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;





function calculerAge($dateNaissance) {
  $dateActuelle = date('2023-06-01');
  $diff = date_diff(date_create($dateNaissance), date_create($dateActuelle));
  return $diff->format('%y');
}
function verifierMotDePasse($motDePasse) {
  // Vérifier la longueur du mot de passe
  if (strlen($motDePasse) < 8) {
      return false;
  }

  // Vérifier la présence d'au moins 1 chiffre
  if (!preg_match("/\d/", $motDePasse)) {
      return false;
  }

  // Vérifier la présence d'au moins 1 majuscule
  if (!preg_match("/[A-Z]/", $motDePasse)) {
      return false;
  }

  // Vérifier la présence d'au moins 1 caractère spécial
  if (!preg_match("/\W/", $motDePasse)) {
      return false;
  }

  // Si toutes les conditions sont satisfaites, le mot de passe est valide
  return true;
}

// Initialisation
$username = "";
$email    = "";
$errors = array(); 
$id = 0;

$birthdate = "1900-01-01";
$age = 50;

// Connexion à la database
$db = mysqli_connect('herogu.garageisep.com', 'Cu7dIKBPWC_vitashield', 'CqT0EXXRXWyBvVh3', 'HwKgNc7yDt_vitashield');

$_SESSION["patient"]="";

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $sexe = mysqli_real_escape_string($db, $_POST['sexe']);
  $telephone = mysqli_real_escape_string($db, $_POST['tel']);

  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $id = rand(0, 9999);
  $age = calculerAge($birthdate);
  
  
  


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Identifiant nécessaire"); }
  if (empty($email)) { array_push($errors, "Email nécessaire"); }
  if (empty($telephone)) { array_push($errors, "Numéro de téléphone nécessaire"); }
  
  if (!verifierMotDePasse($password_1) ) {array_push($errors, "Mot  de passe : 8 charactères minimum, au moins 1 chiffre et 1 majuscule");}

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
    $id_medecin = $_SESSION["id"];
    $query2 =  "INSERT INTO users (id,username,age,birthdate, sexe, telephone,email, id_medecin, password) 
  			  VALUES('$id','$username','$age','$birthdate', '$sexe' ,'$telephone', '$email', '$id_medecin', '$password_crypted')";


  	mysqli_query($db, $query1);
    mysqli_query($db, $query2);




    $message_mail = "Bonjour,
                    votre compte Vitashield à été créer par votre medecin traitant.
                    Votre identifiant est  : '$username'.
                    Votre mot de passe est : '$password_1'.
                    ";


    
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';               //Adresse IP ou DNS du serveur SMTP
    $mail->Port = 465;                          //Port TCP du serveur SMTP
    $mail->SMTPAuth = true;                        //Utiliser l'identification

    
    $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
    $mail->Username   =  'vitashieldoff@gmail.com';   //Adresse email à utiliser
    $mail->Password   =  'jjjwddafpfqiyrkm';         //Mot de passe de l'adresse email à utiliser
    $mail->setFrom("vitashieldoff@gmail.com");

    $mail->Subject    =  'Creation de compte VitaShield';                      //Le sujet du mail
    $mail->WordWrap   = 50; 			                   //Nombre de caracteres pour le retour a la ligne automatique
    $mail->Body = $message_mail; 	       //Texte brut
    $mail->IsHTML(false);   

    $mail->AddAddress($email);



    if (!$mail->send()) {
      $_SESSION["mail_sent"]=$mail->ErrorInfo;
  } else{
    $_SESSION["mail_sent"]="envoyé";
  }

  
  	header('location: medecin_choose.php');
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

      $query  = "SELECT cond_accepte FROM users WHERE username = '$username'";
      $result = mysqli_query($db, $query);
      $result =  mysqli_fetch_assoc($result);
      $cond_accepte = $result["cond_accepte"];





      $query  = "SELECT id FROM users WHERE username = '$username'";
      $result = mysqli_query($db, $query);
      $result =  mysqli_fetch_assoc($result);
      $id = $result["id"];
      $_SESSION["id"]=$id;
      $query  = "SELECT email FROM users WHERE username = '$username'";
      $result = mysqli_query($db, $query);
      $result =  mysqli_fetch_assoc($result);
      $email = $result["email"];


      $_SESSION['email'] = $email;


      
      $query  = "SELECT medecin FROM users WHERE username = '$username'";
      $result = mysqli_query($db, $query);
      $result =  mysqli_fetch_assoc($result);
      $medecin = $result["medecin"];

      if ($medecin==1){
        header('location: medecin_choose.php');
      }
      else {
        if($cond_accepte == 0) {
        
          header('location: cgu.php');
        }
        else{
        header('location: capteur.php');}
      }

      
  	  
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


// FAQ mail sent
if (isset($_POST['requete'])) {
  


  $message_mail = $_POST["content"];

  $username  = $_SESSION["username"];
  $email =  $_SESSION["email"];

  $message_mail = $message_mail . "
  
  from : $username
  contact  :  $email";

  $mail = new PHPMailer(true);
  $mail->IsSMTP();
  $mail->Host = 'smtp.gmail.com';               //Adresse IP ou DNS du serveur SMTP
  $mail->Port = 465;                          //Port TCP du serveur SMTP
  $mail->SMTPAuth = true;                        //Utiliser l'identification


  $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
  $mail->Username   =  'vitashieldoff@gmail.com';   //Adresse email à utiliser
  $mail->Password   =  'jjjwddafpfqiyrkm';         //Mot de passe de l'adresse email à utiliser
  $mail->setFrom("vitashieldoff@gmail.com");

  $mail->Subject    =  $_POST["object"];                      //Le sujet du mail
  $mail->WordWrap   = 50; 			                   //Nombre de caracteres pour le retour a la ligne automatique
  $mail->Body = $message_mail; 	       //Texte brut
  $mail->IsHTML(false);   

  $mail->AddAddress('vitashieldoff@gmail.com');



  if (!$mail->send()) {
  $_SESSION["mail_sent"]=$mail->ErrorInfo;
  } else{
  $_SESSION["mail_sent"]="Votre message a bien été envoyé. Vous recevrez une réponse d'ici peu.";
  }


}









?>