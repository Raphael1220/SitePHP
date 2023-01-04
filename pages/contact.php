
<?php
//Variables des input
$civilite = filter_input(INPUT_POST, 'civilite', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$raison = filter_input(INPUT_POST, 'raison', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//Variables de submit
$submit = filter_input(INPUT_POST, 'submit', FILTER_DEFAULT);

//Variables radio et select
$genre=['Homme','Femme'];
$proposistion=['Proposition','Demande','Prestations'];

//Variables de file_put_contents
$fichier = "contact_".date('Y-m-d-H-i-s').".txt";
$devise = $civilite.' '.$nom.' '.$prenom.' '.$email.' '.$raison.' '.$message;

$validation ='';

//Vérifie si la civilité est correspondante aux varaibles définies
if(in_array($civilite, $genre)){
}
else{
     echo "la civilité n'est pas valide";
     $validation = false;
}

// Vérifie si le nom n'a pas d'espaces
if ($nom) {
    $nom = trim($nom);
    if ($nom === '') {
        echo'Entrez votre nom';
        $validation = false;
    }
} else {
    echo'Entrez votre nom';
    $validation = false;
}

// Vérifie si le prenom n'a pas d'espaces
if ($prenom) {
    $prenom = trim($prenom);
    if ($prenom === '') {
        echo'Entrez votre prenom';
        $validation = false;
    }
} else {
    echo'Entrez votre prenom';
    $validation = false;
}

// Vérifie si le mail est valide
if (!$email) {
    echo"L'email n'est pas valide";
    $validation = false;
}

//Vérifie si la raison est correspondante aux varaibles définies
if(in_array($raison, $proposistion)){
}
else{
    echo "la raison n'est pas valide";
    $validation = false;
}

// Vérifie si le mail est valide est fait au moins 5 caracteres

if(strlen($message) < 5){
 echo 'Le message doit contenir au moins 5 caractères';
    $validation = false;
}

// Si $validation est vrai alors nous pouvons ecrire dans le fichier
if(!$validation){
    // Si le formulaire n'est soumis ou qu les champs sont vide alors erreur sinon ecriture dans un fichier
    if($submit || ((empty($civilite) || empty($nom ) || empty($prenom) || empty($email) || empty($raison) || empty($message)))){?>
        <p>Veuillez remplir tous les champs !</p>
        <?php
    }
    else{
        file_put_contents($fichier, $devise);
    }
}
else{
    echo"C'est pas ca";
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