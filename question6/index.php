<!-- Formulaire avec différents champs qui permettent de mettre en place un chiffrement applicatif. -->

<form id="user-profile-form" onsubmit="submitForm(event)">
  <label for="name">Nom:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Adresse e-mail:</label>
  <input type="email" id="email" name="email" required>

  <label for="password">Mot de passe:</label>
  <input type="password" id="password" name="password" minlength="8" required>

  <button type="submit">Enregistrer</button>
</form>



<?php
// Vérifier que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $name = $_POST['name'] ?? '';
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  // Vérifier que les données sont valides
  if (!empty($name) && !empty($email) && !empty($password)) {
    // Choisir l'algorithme de chiffrement
    $cipher_algo = 'aes-256-cbc';

    // Générer une clé de chiffrement
    $key = random_bytes(32); // 256 bits

    // Générer un vecteur d'initialisation
    $iv = random_bytes(openssl_cipher_iv_length($cipher_algo));

    // Chiffrer les données
    $encrypted_name = openssl_encrypt($name, $cipher_algo, $key, OPENSSL_RAW_DATA, $iv);
    $encrypted_email = openssl_encrypt($email, $cipher_algo, $key, OPENSSL_RAW_DATA, $iv);
    $encrypted_password = openssl_encrypt($password, $cipher_algo, $key, OPENSSL_RAW_DATA, $iv);

    // Stocker les données chiffrées dans la base de données

    // Déchiffrer les données
    $decrypted_name = openssl_decrypt($encrypted_name, $cipher_algo, $key, OPENSSL_RAW_DATA, $iv);
    $decrypted_email = openssl_decrypt($encrypted_email, $cipher_algo, $key, OPENSSL_RAW_DATA, $iv);
    $decrypted_password = openssl_decrypt($encrypted_password, $cipher_algo, $key, OPENSSL_RAW_DATA, $iv);

    // Utiliser les données déchiffrées
    echo $decrypted_name;
    echo $decrypted_email;
    echo $decrypted_password;
    echo "Chiffrement réussi";

  } else {
    // Afficher un message d'erreur si les données sont invalides
    echo 'Veuillez remplir tous les champs';
  }
}
?>
