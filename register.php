<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="login_register_style.css">
</head>
<body>
  <div class="header">
  	<h2>Inscription</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Identifiant</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
</div>


  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	  <div class="input-group">
  	  <label>Votre date de naissance</label>
  	  <input type="date" min="1900-01-01" max="2022-12-31" name="birthdate" value="<?php echo $birthdate; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Mot de passe</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirmer le mot de passe</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
	
  	  <button type="submit" class="btn" name="reg_user" 

	  >S'inscrire</button>
  	</div>
  	<p>
  		Déjà membre? <a href="login.php">S'identifier</a>
  	</p>
  </form>
</body>
</html>