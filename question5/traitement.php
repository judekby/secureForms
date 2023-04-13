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
    $mysqli = mysqli_connect("localhost", "root", "", "question5");

    // Vérification de la connexion
    if (!$mysqli) {
        die("Erreur de connexion: " . mysqli_connect_error());
    }

    // Requête SQL
    $sql = "INSERT INTO users (name, email, password) VALUES ('$nom', '$email', '$password')";

    // Exécution de la requête
    if (mysqli_query($mysqli, $sql)) {
        echo "Nouvel enregistrement créé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    // Récupération de l'identifiant de l'utilisateur
    $result = mysqli_query($mysqli, "SELECT id FROM users WHERE email='$email'");
    $row = mysqli_fetch_assoc($result);
    $id_utilisateur = $row['id'];

    // Enregistrement de la trace de modification dans un fichier de logs
    $log_file = 'logs/' . date('Y-m-d') . '.log'; // nom du fichier de logs
    $log_message = date('Y-m-d H:i:s') . ' - Utilisateur ' . $id_utilisateur . ' : modification du profil'; // message à enregistrer dans le fichier de logs
    error_log($log_message . "\n", 3, $log_file); // enregistrement du message dans le fichier de logs


    // Fermeture de la connexion
    mysqli_close($mysqli);

    }
?>

