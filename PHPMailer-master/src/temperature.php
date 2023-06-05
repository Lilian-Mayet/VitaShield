<?php
session_start();
$db = mysqli_connect('herogu.garageisep.com', 'Cu7dIKBPWC_vitashield', 'CqT0EXXRXWyBvVh3', 'HwKgNc7yDt_vitashield');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mon super titre</title>
	<link rel="stylesheet" type="text/css" href="all_capteur.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="traduction.js"></script>
</head>
<body>
	<header>
        
            <div class="title">
                

        <ul class="titleIcon">
            <li class="listTitle"><h1>Capteur température</h1></li>
            <p class="welcome-message" text_fr="Bienvenue <?php echo $_SESSION["username"]; ?>" 
            text_esp="Hola <?php echo $_SESSION["username"]; ?>"
        >
        Bienvenue <?php echo $_SESSION["username"]; ?>
    </p>
            <li class="listTitle"><img class="icon_img_temp" src="assets/image/capteur/icon temperature.png" alt="capteur"></li>

        </ul>
		<nav>
			<ul>
				<li><a href="sonore.php" text_fr="Capteur sonore" text_esp="Sensor de sonido" >Capteur sonore</a></li>
				<li><a href="cardiaque.php" text_fr="Capteur cardiaque" text_esp="Sensor cardíaco">Capteur cardiaque</a></li>
				<li><a href="particules.php" text_fr="Capteur particules" text_esp="Sensor de partículas">Capteur particules</a></li>
				<li><a href="led.html" text_fr="LED" text_esp="LED">LED</a></li>
			</ul>
		</nav>
    </div>

    <div class="image-container">
    <button onclick="traduire('français')"  text_fr="Français" text_esp="Français">Français</button>
    <button onclick="traduire('espagnol')" text_fr="Español" text_esp="Español">Español</button>
      </div>
        
	</header>
	
    <div class="container">
        <div class="item large">
         <strong><?php
            $id = $_SESSION["id"];
            $query  = "SELECT valeur_instant_temperature FROM sensors WHERE id = '$id'";
            $result = mysqli_query($db, $query);
            $result_str = mysqli_fetch_assoc($result);
            echo $result_str["valeur_instant_temperature"];

        ?>
        </strong> <p text_fr="C°" text_esp="C°">C°</p>
        </div>
        <div class="item">
            <H2 text_fr="Temperature idéale" text_esp="temperature ideal" >Temperature idéale</H2>
            23
        </div>

        <div class="item large">
            <canvas id="myChart"></canvas>
        </div>

        <div class="item">
            <div class="color_info">
                <div class="row">
                  <div class="text_info" > <p text_fr="Trop chaud" text_esp="Demasiado caliente">  Trop chaud </p></div>
                  <div class="square1"></div>
                </div>
                <div class="row">
                  <div class="text_info" > <p text_fr="Confort" text_esp="Confortable"> Confort </p></div>
                  <div class="square3"></div>
                </div>
                <div class="row">
                    <div class="text_info" > <p text_fr="Trop froid" text_esp="Demasiado frío"> Trop froid </p></div>
                    <div class="square2"></div>
                  </div>
            </div>
        </div>





      </div>
	

      <?php
      
            
      $id = $_SESSION["id"];
      $query  = "SELECT min_safe_temperature FROM sensors WHERE id = '$id'";
      $result = mysqli_query($db, $query);
      $result_str = mysqli_fetch_assoc($result);
      $min_safe =  $result_str["min_safe_temperature"];
      $query  = "SELECT max_safe_temperature FROM sensors WHERE id = '$id'";
      $result = mysqli_query($db, $query);
      $result_str = mysqli_fetch_assoc($result);
      $max_safe =  $result_str["max_safe_temperature"];

      echo 

      "
      <script> 
       



        const data = [3,7.3,16.9,18,21.2,22,23,36,21];

        const config = {
            type: 'line',
            data: {
                labels: ['8h', '9h', '10h', '11h', '12h', '13h', '14h', '15h','16h'],
                datasets: [{
                label: 'Temperature',
                data: data,
                backgroundColor: 'blue',
                pointBackgroundColor: data.map(value => {
                        if (value < '$min_safe') {
                            return 'red';
                        } else if (value > '$max_safe') {
                            return 'red';
                        } else {
                            return 'blue';
                        }
                    })


                }]
            },
            options: {
                scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                }]
                }
            }
            };

            const myChart = new Chart(document.getElementById('myChart'), config);



      </script>


      "; ?>




</body>


</html>
