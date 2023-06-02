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
	<label>Sexe</label>
	  <select id="question-type" name="sexe" >
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		<option value="Demigirl">Demigirl (partially female)</option>
		<option value="Demiboy">Demiboy (partially male)</option>
		<option value="Demigender">Demigender (partially a gender)</option>
		<option value="Paragirl">Paragirl (51% or more girl)</option>
		<option value="Paraboy">Paraboy (51% or more boy)</option>
		<option value="Paragender">Paragender (51% or more gender)</option>
		<option value="Agender">Agender (no gender)</option>
		<option value="Nonbinary">Nonbinary (not male or female)</option>
		<option value="Gender apathetic">Gender apathetic (doesn't care)</option>
		<option value="Trigender">Trigender (3 genders)</option>
		<option value="Bigender">Bigender (2 genders)</option>
		<option value="Pangender">Pangender (all genders)</option>
		<option value="Polygender">Polygender (some but not all genders)</option>
		<option value="Genderfluid">Genderfluid (switches between genders)</option>
		<option value="Girlflux">Girlflux (fluctuates intensity of female)</option>
		<option value="Boyflux">Boyflux (fluctuates intensity of male)</option>
		<option value="Genderflux">Genderflux (fluctuates intensity of a gender)</option>
		<option value="Xenogender">Xenogender </option>
		<option value="Libragirl">Libragirl (49% or less than girl)</option>
		<option value="Libraboy">Libraboy (49% or less than boy)</option>
		<option value="Libragender">Libragender (49% or less than a gender)</option>
		<option value="Demifluid">Demifluid (fluctuates between demigenders)</option>
		<option value="Anonbinary">Anonbinary (outside of binary genders and nonbinary genders)</option>
		<option value="Genderfae">Genderfae (switches between feminine and androgynous genders)</option>
		<option value="Genderfaun">Genderfaun (switches between masculine and androgynous genders)</option>

      </select>
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