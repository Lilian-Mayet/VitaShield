<?php
  session_start(); 
  $db = mysqli_connect('herogu.garageisep.com', 'Cu7dIKBPWC_vitashield', 'CqT0EXXRXWyBvVh3', 'HwKgNc7yDt_vitashield');

  require 'Exception.php';
  require 'PHPMailer.php';
  require 'SMTP.php';
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;



  $_urgence_sent ="";

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Vous devez vous connectez d'abord";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }


  if (isset($_GET['urgence'])) {


    $username = $_SESSION["username"];
    $query  = "SELECT id_medecin FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    $result =  mysqli_fetch_assoc($result);
    $id_medecin = $result["id_medecin"];
    $query  = "SELECT email FROM users WHERE id = '$id_medecin'";
    $result = mysqli_query($db, $query);
    $result =  mysqli_fetch_assoc($result);
    $email_medecin = $result["email"];

    $query  = "SELECT telephone FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    $result =  mysqli_fetch_assoc($result);
    $tel = $result["telephone"];

    

    $username = $_SESSION["username"];
    $email_user = $_SESSION["email"];

    $message_mail = $username . " à une urgence!";
    $message_mail = $message_mail .  "  

    mail : $email_user , 
    telephone : $tel,

    site web : https://vitashield.herogu.garageisep.com/site.html
    "
    
    ;

    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';               //Adresse IP ou DNS du serveur SMTP
    $mail->Port = 465;                          //Port TCP du serveur SMTP
    $mail->SMTPAuth = true;                        //Utiliser l'identification


    $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
    $mail->Username   =  'vitashieldoff@gmail.com';   //Adresse email à utiliser
    $mail->Password   =  'jjjwddafpfqiyrkm';         //Mot de passe de l'adresse email à utiliser
    $mail->setFrom("vitashieldoff@gmail.com");

    $mail->Subject    =  "URGENCE UTILISATEURS";                      //Le sujet du mail
    $mail->WordWrap   = 50; 			                   //Nombre de caracteres pour le retour a la ligne automatique
    $mail->Body = $message_mail; 	       //Texte brut
    $mail->IsHTML(false);   

    $mail->AddAddress($email_medecin);
    $mail->AddAddress('vitashieldoff@gmail.com');


    if (!$mail->send()) {
      $_urgence_sent=$mail->ErrorInfo;
    } else{
      $_urgence_sent="Votre medecin à été prevenu, vous allez etre contacté le plus vite possible";
    }


  }


?>

<!DOCTYPE php>

<html>
  <head>
    <title>Vitashield</title>
    <link rel="stylesheet" type="text/css" href="capteur_style.css">
  </head>





  <body>

    <header>
  <div class="logo">
    <img src = "assets/image/logo vita shield.png">
  </div>
  <div class="menu">
   <a href ="faq.php"> <button   text_fr="FAQ" text_esp="Preguntas más frecuentes">FAQ</button> </a>
   <a href ="capteur.php?urgence='1'"> <button class="urgence" text_fr="URGENCE" text_esp = "URGENCIA"  >URGENCE</button> </a>
   <a href ="cgu.php"> <button text_fr="CGU" text_esp="Términos y Condiciones">CGU</button> </a>
    <p > <strong> <?php echo $_urgence_sent ?> </strong>  </p>
    
    <!-- Ajoutez autant de boutons que nécessaire -->
  </div>






  <div class="text">
  <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
              <h3>
                <?php 
                  echo $_SESSION['success']; 
                  unset($_SESSION['success']);
                ?>
              </h3>
            </div>
          <?php endif ?>

          <!-- logged in user information -->
          <?php  if (isset($_SESSION['username'])) : ?>
            <p text_fr="Bienvenue <strong><?php echo $_SESSION['username']; ?></strong>"
             text_esp = "Hola <strong><?php echo $_SESSION['username']; ?></strong>"
            >Bienvenue <strong><?php echo $_SESSION['username']; ?></strong></p>
            <a href="capteur.php?logout='1'" style="color: red;" > <p text_fr="deconnexion" text_esp = "Desconectarse"> deconnexion</p> </a>
          <?php endif ?>


          <button onclick="traduire('français')"  text_fr="Français" text_esp="Français">Français</button>
    <button onclick="traduire('espagnol')" text_fr="Español" text_esp="Español">Español</button>

  </div>
</header>

  
  

    
    



    
    <div id="all_capteur" >
   
    

    


     <a href = "faq.php"> <img src="assets/image/capteur/main image.png" class="center-image" id="center_image"  alt="Image principale"> </a>
  
     <a href="particules.php"><img src="assets/image/capteur/icon dust.png" id="image1" class="floating-image" alt="Image flottante 1"></a>
    
    <a href="led.html"><img src="assets/image/capteur/icon led.png" id="image2" class="floating-image" alt="Image flottante 2"></a>
    
    <a href="temperature.php"><img src="assets/image/capteur/icon temperature.png" id="image3" class="floating-image" alt="Image flottante 3"></a>
    
    <a href="cardiaque.php"><img src="assets/image/capteur/icon coeur.png" id="image4" class="floating-image" alt="Image flottante 4"></a>
    
    <a href="sonore.php"><img src="assets/image/capteur/icon son.png" id="image5" class="floating-image" alt="Image flottante 5"></a>
    
    
  </div>
  




  <script>



        function traduire(langue) {
            var elements =  document.querySelectorAll("p, h1, h2, h3,button");
            
            if (langue === "espagnol") {
                for (var i = 0; i < elements.length; i++) {
                    var element = elements[i];
                    var texte = element.getAttribute("text_esp");
                    element.innerHTML = texte;
                }
            } else if (langue === "français") {
                for (var i = 0; i < elements.length; i++) {
                    var element = elements[i];
                    var texte = element.getAttribute("text_fr");
                    element.innerHTML = texte;
                }
            }
        }
  






const canvas = document.createElement("canvas");
canvas.style.pointerEvents = "none";
canvas.style.position = "absolute";
canvas.style.top = "0";
canvas.style.left = "0";
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;
document.body.appendChild(canvas);


// Obtention du contexte de dessin 2D
const ctx = canvas.getContext("2d");
ctx.strokeStyle = '#FFE18B';


function drawLine() {




  var x_lenght = 0;
  var y_lenght = 0;

  const main_element = document.getElementById("center_image");
  const element1 = document.getElementById("image1");
  const element2 = document.getElementById("image2");
  const element3 = document.getElementById("image3");
  const element4 = document.getElementById("image4");
  const element5 = document.getElementById("image5");

  
  const main_rect = main_element.getBoundingClientRect();
  const rect1 = element1.getBoundingClientRect();
  const rect2 = element2.getBoundingClientRect();
  const rect3 = element3.getBoundingClientRect();
  const rect4 = element4.getBoundingClientRect();
  const rect5 = element5.getBoundingClientRect();


// Création du canvas

ctx.clearRect(0, 0, canvas.width, canvas.height);
// Dessin du trait
ctx.beginPath();
ctx.moveTo(rect1.left + rect1.width / 2, rect1.top + rect1.height );
ctx.lineTo(main_rect.left + main_rect.width / 2, main_rect.top + main_rect.height/2);
ctx.stroke();



ctx.beginPath();
ctx.moveTo(rect2.left + rect2.width / 2, rect2.top + rect2.height );
ctx.lineTo(main_rect.left + main_rect.width / 2, main_rect.top + main_rect.height/2);
ctx.stroke();

ctx.beginPath();
ctx.moveTo(rect3.left + rect3.width , rect3.top + rect3.height/2 );
ctx.lineTo(main_rect.left + main_rect.width / 2, main_rect.top + main_rect.height/2);
ctx.stroke();


ctx.beginPath();
ctx.moveTo(rect4.left  , rect4.top + rect4.height/2 );
ctx.lineTo(main_rect.left + main_rect.width / 2, main_rect.top + main_rect.height/2);
ctx.stroke();

ctx.beginPath();
ctx.moveTo(rect5.left + rect5.width / 2  , rect5.top  );
ctx.lineTo(main_rect.left + main_rect.width / 2, main_rect.top + main_rect.height/2);
ctx.stroke();





  
}

setInterval(drawLine, 0);









</script>






  </body>

