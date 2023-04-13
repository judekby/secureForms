<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Récupère les données soumises par le formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Vérifie que tous les champs sont remplis
    if (empty($nom) || empty($email) || empty($password)) {
        die("Erreur : Tous les champs doivent être remplis.");
    }

    // Vérifie que l'e-mail est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Erreur : L'e-mail n'est pas valide.");
    }

    // Connexion à la base de données
    $mysqli = mysqli_connect("localhost", "root", "", "question6");

    // Vérification de la connexion
    if (!$mysqli) {
        die("Erreur de connexion: " . mysqli_connect_error());
    }

    // Générer une clé de chiffrement aléatoire
    $key = openssl_random_pseudo_bytes(32);

    // Chiffrer le mot de passe, l'email et le nom
    $encrypted_password = openssl_encrypt($password, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, '0123456789abcdef');
    $encrypted_email = openssl_encrypt($email, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, '0123456789abcdef');
    $encrypted_nom = openssl_encrypt($nom, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, '0123456789abcdef');

    // Stocker les données chiffrées dans la base de données
    $stmt = $mysqli->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die("Erreur de préparation de la requête : " . $mysqli->error);
    }

    // Lier les paramètres
    $stmt->bind_param("sss", $encrypted_nom, $encrypted_email, $encrypted_password);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Nouvel enregistrement créé avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    // Déchiffrement des données
    $decrypted_password = openssl_decrypt($encrypted_password, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, '0123456789abcdef');
    $decrypted_email = openssl_decrypt($encrypted_email, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, '0123456789abcdef');
    $decrypted_nom = openssl_decrypt($encrypted_nom, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, '0123456789abcdef');

    // Affichage des données déchiffrées
    echo "<br>";
    echo "Nom: " . $decrypted_nom;
    echo "<br>";
    echo "E-mail: " . $decrypted_email;
    echo "<br>";
    echo "Mot de passe: " . $decrypted_password;

    // Fermeture de la requête
    $stmt->close();

    // Fermeture de la connexion
    mysqli_close($mysqli);
}
?> 