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
</head>
<body>
	<header>
        
            <div class="title">
                

        <ul class="titleIcon">
            <li class="listTitle"><h1>Capteur sonore</h1></li>
            <p class="welcome-message">
        Welcome <strong><?php echo $_SESSION["username"]; ?></strong>
    </p>
            <li class="listTitle"><img class="icon_img" src="assets/image/capteur/icon son.png" alt="capteur"></li>

        </ul>
		<nav>
			<ul>
				<li><a href="cardiaque.php">Capteur cardiaque</a></li>
				<li><a href="temperature.php">Capteur température</a></li>
				<li><a href="particules.php">Capteur particules</a></li>
				<li><a href="led.html">LED RGB</a></li>
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
            <H2>Environnement sonore</H2>
            <p> <strong><?php
            $id = $_SESSION["id"];
            $query  = "SELECT valeur_instant_sonore FROM sensors WHERE id = '$id'";
            $result = mysqli_query($db, $query);
            $result_str = mysqli_fetch_assoc($result);
            echo $result_str["valeur_instant_sonore"];

        ?>
        </strong>dB </p>
        </div>
        <div class="item">
            <H2>Maximum conseillé</H2>
            105 dB
        </div>

        <div class="item large">
            <canvas id="myChart"></canvas>
        </div>

        <div class="item">
            <div class="color_info">
                <div class="row">
                  <div class="text_info">Dangeureux</div>
                  <div class="square1"></div>
                </div>
                <div class="row">
                  <div class="text_info">Normal</div>
                  <div class="square2"></div>
                </div>
                <div class="row">
                  <div class="text_info">Agréable</div>
                  <div class="square3"></div>
                </div>
              </div>

        </div>
        <div class="item_edit">
        <p class="edit_text">éditer seuil</p>
        <button class = "edit_button ">edit</button>
        </div>

        <div class="item"></div>
        <div class="item"></div>
        <div class="item large"></div>
      </div>
	


      <?php
      
            
      $id = $_SESSION["id"];
      $query  = "SELECT min_safe_sonore FROM sensors WHERE id = '$id'";
      $result = mysqli_query($db, $query);
      $result_str = mysqli_fetch_assoc($result);
      $min_safe =  $result_str["min_safe_sonore"];
      $query  = "SELECT max_safe_sonore FROM sensors WHERE id = '$id'";
      $result = mysqli_query($db, $query);
      $result_str = mysqli_fetch_assoc($result);
      $max_safe =  $result_str["max_safe_sonore"];

      echo 

        "
     
      <script>
        const data = [71, 94, 88, 73, 49, 60, 77, 104, 94, 89, 52, 120, 45, 63, 42, 78,118];
    
        const config = {
            type: 'line',
            data: {
                labels: ['8h','8h30', '9h','9h30', '10h','10h30', '11h','11h30', '12h','12h30', '13h','13h30', '14h','14h30', '15h','15h30','16h'],
                datasets: [{
                    label: 'Environnement sonore au cours de la journée',
                    data: data,
                    backgroundColor: 'blue',
                    pointBackgroundColor: data.map(value => {
                        if (value < $min_safe) {
                            return 'green';
                        } else if (value > $max_safe) {
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
    "
    ?>
    




</body>


</html>
