<?php
  session_start(); 
  

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE php>

<html>
  <head>
    <title>Site Web avec Images Flottantes</title>
    <link rel="stylesheet" type="text/css" href="capteur_style.css">
  </head>
  <body>

    <header>
      <div class="logo">
        <img src="assets/image/logo vita shield.png" alt="Votre logo">
      </div>

 






      <div class="content">
  	<!-- notification message -->
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
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>

    </header>
  

    <div id="all_capteur" >
      
    

    


    <img src="assets/image/capteur/main image.png" class="center-image" id="center_image"  alt="Image principale">
  
    <img src="assets/image/capteur/icon dust.png" id="image1" class="floating-image" alt="Image flottante 1">
    
    <a href="led.html"><img src="assets/image/capteur/icon led.png" id="image2" class="floating-image" alt="Image flottante 2"></a>
    
    <a href="temperaure.html"><img src="assets/image/capteur/icon temperature.png" id="image3" class="floating-image" alt="Image flottante 3"></a>
    
    <a href="cardiaque.php"><img src="assets/image/capteur/icon coeur.png" id="image4" class="floating-image" alt="Image flottante 4"></a>
    
    <a href="sonore.html"><img src="assets/image/capteur/icon son.png" id="image5" class="floating-image" alt="Image flottante 5"></a>
    
    
  </div>
  




    <script>








    const canvas = document.createElement("canvas");
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
