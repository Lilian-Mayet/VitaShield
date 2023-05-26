
<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'project');

?>


<!DOCTYPE php>
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
            <li class="listTitle"><h1>Capteur cardiaque</h1></li>
            <p class="welcome-message">
        Welcome <strong><?php echo $_SESSION["mail_sent"]; ?></strong>
    </p>
            <li class="listTitle"><img class="icon_img" src="assets/image/capteur/icon coeur.png" alt="capteur"></li>

        </ul>
		<nav>
			<ul>
				<li><a href="sonore.html">Capteur sonore</a></li>
				<li><a href="temperaure.html">Capteur température</a></li>
				<li><a href="#">Capteur particules</a></li>
				<li><a href="led.html">LED RGB</a></li>
			</ul>
		</nav>
    </div>

    <div class="image-container">
        <img src="assets/image/icon/user.png" alt="image1">

        

       

        <img src="assets/image/icon/setting.png" alt="image2">
      </div>
        
	</header>
	
    <div class="container">
        <div class="item large">
                <p> <strong><?php
            $id = $_SESSION["id"];
            $query  = "SELECT valeur_instant_cardiaque FROM sensors WHERE id = '$id'";
            $result = mysqli_query($db, $query);
            $result_str = mysqli_fetch_assoc($result);
            echo $result_str["valeur_instant_cardiaque"];

        ?>
        </strong>BPM </p>
        </div>
        <div class="item">
            <H2>BPM optimale</H2>
            78
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
            </div>
        </div>


       
        <div class="item small"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item large"></div>
      </div>
	

      <?php
      
            
      $id = $_SESSION["id"];
      $query  = "SELECT min_safe_cardiaque FROM sensors WHERE id = '$id'";
      $result = mysqli_query($db, $query);
      $result_str = mysqli_fetch_assoc($result);
      $min_safe =  $result_str["min_safe_cardiaque"];
      $query  = "SELECT max_safe_cardiaque FROM sensors WHERE id = '$id'";
      $result = mysqli_query($db, $query);
      $result_str = mysqli_fetch_assoc($result);
      $max_safe =  $result_str["max_safe_cardiaque"];

      echo 

      "
      <script> 
       



        const data = [85,92,35,77,80,140,68,75,90];

        const config = {
            type: 'line',
            data: {
                labels: ['8h', '9h', '10h', '11h', '12h', '13h', '14h', '15h','16h'],
                datasets: [{
                label: 'BPM moyen',
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
