<?php

include('server.php'); 

?>


<!DOCTYPE html>
<html>
<head>
  <title>Page de questions</title>
  <script src="traduction.js"></script>
  <style>
    body {
      background-color: #f5f5f5;
      font-family: Arial, sans-serif;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    .question {
      background-color: #4fc3F7;
      padding: 15px;
      margin-bottom: 10px;
      
      cursor: pointer;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s ease;
      transition : transform 0.3s ease;
    }

    .question:hover {
      background-color: #f2f2f2;
      transform: scale(1.1);
    }

    .answer {
      display: none;
      padding: 15px;
      background-color: #ffffff;
      margin-bottom: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      animation: fade-in 0.5s ease-in-out;
    }

    @keyframes fade-in {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }



    label {
      display: block;
      margin-bottom: 10px;
    }

    select, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      resize: vertical;
    }

    .counter {
      font-size: 12px;
      margin-top: 5px;
      color: #888;
    }



    .confirmation {
      display : none;
      padding: 15px;
      background-color: #ffffff;
      margin-bottom: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      animation: fade-in 0.5s ease-in-out;
    }


  </style>
  <script>
    function toggleAnswer(id) {
      var answer = document.getElementById(id);
      if (answer.style.display === 'none') {
        answer.style.display = 'block';
      } else {
        answer.style.display = 'none';
      }
    }
  </script>
</head>
<body>
  <div class="container">
  <button onclick="traduire('français')"  text_fr="Français" text_esp="Français">Français</button>
    <button onclick="traduire('espagnol')" text_fr="Español" text_esp="Español">Español</button>
    <div class="question" onclick="toggleAnswer('answer1')"><p
    text_fr="Qu'est ce que Vitashield?" text_esp="¿Qué es Vitashield? ">
    Qu'est ce que Vitashield?</p></div>
    <div id="answer1" class="answer">
      <p
      text_fr="Vitashield est une start-up qui fut fondée par un groupe d'amis. Ce dernier avait constaté que beaucoup de personnes âgées ne pouvaient pas avoir accès à des données précises à tout moment. Ainsi Vitashield permet à ces personnes de pouvoir agir vite si une anomalie fait son apparition chez un individu."
       text_esp="Vitashield es una start-up fundada por un grupo de amigos. Se dieron cuenta que muchas personas de la tercera edad no podían tener acceso a datos precisos y en todo momento. Por lo tanto, Vitashield le permite a esas personas poder actuar rápido si alguna anomalía aparece.">
       Vitashield est une start-up qui fut fondée par un groupe d'amis. Ce dernier avait constaté que beaucoup de personnes âgées ne pouvaient pas avoir accès à des données précises à tout moment. Ainsi Vitashield permet à ces personnes de pouvoir agir vite si une anomalie fait son apparition chez un individu.
    </p>
    </div>

    <div class="question" onclick="toggleAnswer('answer2')">
    <p
    text_fr="Qui est derrière Vitashield?" text_esp="¿Quiénes están detrás de Vitashield? ">
    Qui est derrière Vitashield?  </p> </div>
    <div id="answer2" class="answer">
    <p
      text_fr="Vitashield est une start-up qui fut fondée par un groupe d'amis. Ce groupe d'amis est composé de :
- MAYET Lilian, Directeur Général
- CRUZ Matteo, Secrétaire Général
- MOREL Guylain, Directeur Technique
- MAYER Paul, Directeur Commercial
- TEJEDA Karimme, Responsable des Ressources Humaines
- GODET Rémi, Directeur Recherche et Développement
Ce dernier avait constaté que beaucoup de personnes âgées ne pouvaient pas avoir accès à des données précises à tout moment. Ainsi Vitashield permet à ces personnes de pouvoir agir vite si une anomalie fait son apparition chez un individu."
       text_esp="Vitashield es una start-up fundada por un grupo de amigos. Este grupo esta compuesto por:
-MAYET Lilian, Director general
-CRUZ Matteo, Secretario general
-MOREL Guylain, Directos técnico 
- MAYER Paul, Director comercial
- TEJEDA Karimme, Responsable de recursos humanos
-GODET Rémi, Director de búsqueda y desarrollo
Se dieron cuenta que muchas personas de la tercera edad no podían tener acceso a datos precisos y en todo momento. Por lo tanto, Vitashield le permite a esas personas poder actuar rápido si alguna anomalía aparece.">
Vitashield est une start-up qui fut fondée par un groupe d'amis. Ce groupe d'amis est composé de :
- MAYET Lilian, Directeur Général
- CRUZ Matteo, Secrétaire Général
- MOREL Guylain, Directeur Technique
- MAYER Paul, Directeur Commercial
- TEJEDA Karimme, Responsable des Ressources Humaines
- GODET Rémi, Directeur Recherche et Développement
Ce dernier avait constaté que beaucoup de personnes âgées ne pouvaient pas avoir accès à des données précises à tout moment. Ainsi Vitashield permet à ces personnes de pouvoir agir vite si une anomalie fait son apparition chez un individu.
    </p>
    </div>

    <div class="question" onclick="toggleAnswer('answer3')">
    <p
    text_fr="Comment utiliser ma coque Vitashield?" text_esp="¿Cómo utilizar mi funda Vitashield? ">
    Comment utiliser ma coque Vitashield? </p></div>
    <div id="answer3" class="answer">
    <p
      text_fr="La coque Vitashield est composée de différents capteurs. Ces capteurs vont transmettre les données récoltés vers notre base de données. En se connectant sur le site de Vitashield, les utilisateurs pourront accéder à leurs données personnelles. Leurs médecins traitants pourront aussi accéder à ces données pour surveiller l'état de santé de leurs patients."
       text_esp="La funda Vitashield esta compuesta por diferentes sensores. Estos sensores van a transmitir los datos recibidos hacia nuestra base de datos. Al conectarse en el sitio de Vitashield, los usuarios podrán acceder a sus datos personales. Sus médicos tratantes podrán también acceder a sus datos para poder vigilar el estado de salud de sus pacientes.">
       La coque Vitashield est composée de différents capteurs. Ces capteurs vont transmettre les données récoltés vers notre base de données. En se connectant sur le site de Vitashield, les utilisateurs pourront accéder à leurs données personnelles. Leurs médecins traitants pourront aussi accéder à ces données pour surveiller l'état de santé de leurs patients.
    </p>
    </div>
  </div>


  <div class="container">
    <h1 text_fr="Contactez nous" text_esp="Contáctanos ">Contactez nous</h1>

    <form  id = "form"  method="post" action="faq.php" onsubmit="submitForm(event)" >  <!--onsubmit="submitForm(event)"-->
      <label for="question-type" text_fr="Nature de la requête" text_esp="Tipo de solicitud">Nature de la requête</label>
      <select id="question-type" name="object" value="<?php echo $object; ?>">
        <option value="Ma montre ne fonctionne plus/pas" text_fr="Ma coque ne fonctionne plus/pas" text_esp="Mi funda no funciona">Ma coque ontre ne fonctionne plus/pas</option>
        <option value="Question sur le fonctionnement" text_fr="Question sur le fonctionnement" text_esp="Preguntas sobre el funcionamiento ">Question sur le fonctionnement</option>
        <option value="Suggestion d'amélioration" text_fr="Suggestion d'amélioration" text_esp="Sugerencia de mejora ">Suggestion d'amélioration</option>
        <option value="Partenariat"  text_fr="Partenariat" text_esp=" Partenarios ">Partenariat</option>
        <option value="Autre"  text_fr="Autre" text_esp="Otra ">Autre</option>
        
      </select>

      <label for="question" text_fr="Question :" text_esp="Pregunta : ">Question :</label>
      <textarea id="question" rows="5" oninput="countCharacters()"  name="content" ></textarea>
      <div class="counter" id="counter">2000</div>

      <input type="submit" value="Envoyer" text_fr="Envoyer" text_esp="Enviar"  name="requete" >

    </form>
    <div id="confirmation" class="confirmation">
      <?php  echo $_SESSION["mail_sent"]  ?>
    </div>
  </div>



</body>




</html>
<script>
    function countCharacters() {
      var textarea = document.getElementById('question');
      var counter = document.getElementById('counter');
      var remaining = 2000 - textarea.value.length;
      counter.textContent = remaining ;
    }


    function submitForm(event) {
      event.preventDefault(); // Empêche le rechargement de la page par défaut

      var form = document.getElementById('form');
      form.style.display = 'none';

      var confirmation = document.getElementById('confirmation');
      confirmation.style.display = 'block';
    }
  </script>