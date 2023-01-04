
<?php

$civilite = filter_input(INPUT_POST, 'civilite', FILTER_DEFAULT);
$nom = filter_input(INPUT_POST, 'nom', FILTER_DEFAULT);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$raison = filter_input(INPUT_POST, 'raison', FILTER_DEFAULT);
$message = filter_input(INPUT_POST, 'message', FILTER_DEFAULT);
$submit = filter_input(INPUT_POST, 'submit', FILTER_DEFAULT);

$fichier = "contact_".date('Y-m-d-H-i-s').".txt";

$devise = $civilite.' '.$nom.' '.$prenom.' '.$email.' '.$raison.' '.$message;

if($submit || ((empty($civilite) || empty($nom ) || empty($prenom) || empty($email) || empty($raison) || empty($message)))){?>
    <p>Veuillez remplir tous les champs !</p>
<?php
}

else{
    file_put_contents($fichier, $devise);
}
?>



<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
  <div class="form-group">
      <label for="civilité">Civilité</label>
      <select name="civilite" id="civilité">
          <option value="">Choisir</option>
          <option value="Homme">M.</option>
          <option value="Femme">Mme</option>
      </select>
      <div>
          <label for="Nom">Nom</label>
          <input type="text" class="form-control" name="nom" id="nom">
      </div>
      <div>
          <label for="Prénom">Prénom</label>
          <input type="text" class="form-control" name="prenom" id="prenom">
      </div>
      <div>
          <label for="Email">Email</label>
          <input type="email" class="form-control" name="email" id="email">
      </div>
      <div>
          <label for="Raison">Raison du Contact</label>
          <div>
              <input type="radio" class="form-control" id="proposition" name="raison" value="Proposition">
              <label for="Proposition">Proposition d’emploi</label>
          </div>
          <div>
              <input type="radio" class="form-control" id="demande" name="raison" value="Demande">
              <label for="Demande">Demande d'informations</label>
          </div>
          <div>
              <input type="radio" class="form-control" id="prestations" name="raison" value="Prestations">
              <label for="Prestations">Prestations</label>
          </div>
      </div>
      <div>
          <label for="Message">Message</label>
          <textarea class="form-control" name="message" id="message"></textarea>
      </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Soumettre</button>
</form>