<?php
include('server.php');

if (isset($_GET['accept'])) {
    $username = $_SESSION['username'];
    $query = "UPDATE users
  SET  cond_accepte = 1


  WHERE username = '$username'";
  mysqli_query($db, $query);
    header("location: capteur");
}


if (isset($_GET['refuse'])) {
  $username = $_SESSION['username'];
  $query = "DELETE FROM users where username='$username'";



mysqli_query($db, $query);
  header("location: site.html");
}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Conditions d'utilisation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    
    .content {
      max-width: 600px;
      padding: 20px;
      background-color: #f1f1f1;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: auto;
    }
    
    h1 {
      text-align: center;
    }
    
    p {
      line-height: 1.5;
    }
    
    .accept-button {
      display: block;
      width: 200px;
      margin: 20px auto;
      padding: 10px;
      text-align: center;
      background-color: #4caf50;
      color: white;
      font-size: 16px;
      text-decoration: none;
      border-radius: 5px;
    }
    
    .accept-button:hover {
      background-color: #45a049;
    }



    .refuse-button {
      display: block;
      width: 200px;
      margin: 20px auto;
      padding: 10px;
      text-align: center;
      background-color: #db0f27;
      color: white;
      font-size: 16px;
      text-decoration: none;
      border-radius: 5px;
    }
    
    .refuse-button:hover {
      background-color: #b22222;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="content">
      <h1>Conditions d'utilisation</h1>
      <p> <strong> <?php echo $_SESSION["username"]?> </strong>  veuillez lire attentivement les conditions d'utilisation suivantes :</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed scelerisque aliquet nunc, eu dictum eros. In nec consectetur nisl. Aenean fringilla magna et lectus venenatis tincidunt. Sed dapibus, velit at congue molestie, nisi neque hendrerit nunc, eu interdum tellus magna eu mauris. Duis sit amet nisi ut velit elementum sodales. Aenean gravida viverra dolor nec auctor. Duis a odio et dui egestas ultricies non non odio. Fusce rutrum ligula ac nibh euismod, ut rutrum justo ullamcorper.</p>
      <p>...</p>
      <p>...</p>
      <p>...</p>
      <p>...</p>
      <p>En cliquant sur le bouton ci-dessous, vous acceptez les conditions d'utilisation.</p>
      <a class="accept-button" href="cgu.php?accept='1'">Accepter</a>
      <a class="refuse-button" href="cgu.php?refuse='1'">Refuser</a>
    </div>
  </div>
</body>
</html>
