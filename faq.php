<?php

include('server.php'); 

?>


<!DOCTYPE html>
<html>
<head>
  <title>Page de questions</title>
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
    <div class="question" onclick="toggleAnswer('answer1')">Qu'est ce que Vitashield?</div>
    <div id="answer1" class="answer">
      Réponse à la question 1
    </div>

    <div class="question" onclick="toggleAnswer('answer2')">Qui est derrière Vitashield?</div>
    <div id="answer2" class="answer">
      Réponse à la question 2
    </div>

    <div class="question" onclick="toggleAnswer('answer3')">Comment utiliser ma coque Vitashield?</div>
    <div id="answer3" class="answer">
      Réponse à la question 3
    </div>
  </div>


  <div class="container">
    <h1>Contactez nous</h1>

    <form  id = "form"  method="post" action="faq.php" onsubmit="submitForm(event)" >  <!--onsubmit="submitForm(event)"-->
      <label for="question-type">Nature de la requête</label>
      <select id="question-type" name="object" value="<?php echo $object; ?>">
        <option value="Ma montre ne fonctionne plus/pas">Ma coque ontre ne fonctionne plus/pas</option>
        <option value="Question sur le fonctionnement">Question sur le fonctionnement</option>
        <option value="Suggestion d'amélioration">Suggestion d'amélioration</option>
        <option value="Partenariat">Partenariat</option>
        <option value="Autre">Autre</option>
        
      </select>

      <label for="question">Question :</label>
      <textarea id="question" rows="5" oninput="countCharacters()"  name="content" ></textarea>
      <div class="counter" id="counter">2000 caractère(s) restant(s)</div>

      <input type="submit" value="Envoyer" name="requete" >

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
      counter.textContent = remaining + ' caractère(s) restant(s)';
    }


    function submitForm(event) {
      event.preventDefault(); // Empêche le rechargement de la page par défaut

      var form = document.getElementById('form');
      form.style.display = 'none';

      var confirmation = document.getElementById('confirmation');
      confirmation.style.display = 'block';
    }
  </script>