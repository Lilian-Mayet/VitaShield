<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="login_register_style.css">
</head>
<body>
  <div class="header">
  	<h2>Connexion</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Identifiant</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Mot de passe</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">S'identifier</button>
  	</div>
  	<p>
  		Pas encore membre? <a href="https://www.ameli.fr/">Contact ton medecin traitant pour faire une demande</a>
  	</p>
  </form>
</body>
</html>