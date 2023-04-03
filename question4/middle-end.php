<?php
// Vérifier si l'adresse e-mail existe déjà dans la base de données
$email = $_POST['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // L'adresse e-mail existe déjà, retourner une erreur
  $errors[] = "Cette adresse e-mail est déjà utilisée";
}

?>
