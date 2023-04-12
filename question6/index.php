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

    // ------------------ INSERTION DES DONNÉES CHIFFRÉES DANS LA BASE DE DONNÉES ------------------ //

    // Paramètres de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "question6";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Préparer la requête SQL
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

    // Préparer la requête
    $stmt = $conn->prepare($sql);

    // Lier les paramètres
    $stmt->bind_param("sss", $encrypted_name, $encrypted_email, $encrypted_password);

    // Exécuter la requête
    $stmt->execute();

    // Fermer la connexion
    $conn->close();

    // ------------------------------------------------------------------------------------------ //

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
