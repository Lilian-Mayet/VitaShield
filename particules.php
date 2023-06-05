
<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');

?>


<!DOCTYPE php>
<html>
<head>
	<title text_esp="partículas" text_fr="particules"  >particules</title>
	<link rel="stylesheet" type="text/css" href="all_capteur.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="traduction.js"></script>
</head>
<body>
	<header>
        
            <div class="title">
                

        <ul class="titleIcon">
            <li class="listTitle"><h1 text_fr="Capteur de particules" text_esp="sensor de partículas " >Capteur de particules</h1></li>
            <p class="welcome-message" text_fr="Bienvenue <?php echo $_SESSION["username"]; ?>" 
            text_esp="Hola <?php echo $_SESSION["username"]; ?>"
        >
        Bienvenue <?php echo $_SESSION["username"]; ?>
    </p>
            <li class="listTitle"><img class="icon_img" src="assets/image/capteur/icon dust.png" alt="capteur"></li>

        </ul>
		<nav>
			<ul>
				<li><a href="sonore.php" text_fr="Capteur sonore" text_esp="Sensor de sonido" >Capteur sonore</a></li>
				<li><a href="temperature.php" text_fr="Capteur température" text_esp="Sensor de temperatura">Capteur température</a></li>
				<li><a href="#" text_fr="Capteur cardiaque" text_esp="Sensor cardíaco">Capteur cardiaque</a></li>
				<li><a href="led.html" text_fr="LED RGB" text_esp="LED RGB">LED RGB</a></li>
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
            $query  = "SELECT valeur_instant_particules FROM sensors WHERE id = '$id'";
            $result = mysqli_query($db, $query);
            $result_str = mysqli_fetch_assoc($result);
            echo $result_str["valeur_instant_particules"];

        ?>
        </strong>  <p text_fr="BPM" text_esp="LPM">g.L</p>
        </div>
        <div class="item">
            <H2 text_fr="densité maximum" text_esp="densidad  máxima  ">densité maximum</H2>
            3.2 g/L
        </div>

        <div class="item large">
            <canvas id="myChart"></canvas>
        </div>

        <div class="item">
            <div class="color_info">
                <div class="row">
                  <div class="text_info"><p text_fr="Dangeureux" text_esp="Riesgoso"> Dangeureux </p>    </div>
                  <div class="square1"></div>
                </div>
                <div class="row">
                  <div class="text_info"> <p text_fr="Normal" text_esp="Normal">  Normal </p>  </div>
                  <div class="square2"></div>
                </div>
            </div>
        </div>


       

      </div>
	

      <?php
      
            
      $id = $_SESSION["id"];
      $query  = "SELECT min_safe_particules FROM sensors WHERE id = '$id'";
      $result = mysqli_query($db, $query);
      $result_str = mysqli_fetch_assoc($result);
      $min_safe =  $result_str["min_safe_particules"];
      $query  = "SELECT max_safe_particules FROM sensors WHERE id = '$id'";
      $result = mysqli_query($db, $query);
      $result_str = mysqli_fetch_assoc($result);
      $max_safe =  $result_str["max_safe_particules"];

      echo 

      "
      <script> 
       



        const data = [0.6,1.3,1.8,2.2,2.4,1.8,1.4,2.5,1.1];

        const config = {
            type: 'line',
            data: {
                labels: ['8h', '9h', '10h', '11h', '12h', '13h', '14h', '15h','16h'],
                datasets: [{
                label: 'densité en particules moyenne',
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
