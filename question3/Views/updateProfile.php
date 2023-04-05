<?php 
require('gabarit.php'); 
?>

<form id="user-profile-form">
  <label for="name">Nom:</label>
  <input type="text" id="name" name="name" required>
  <label for="email">Adresse e-mail:</label>
  <input type="email" id="email" name="email" required>
  <label for="password">Mot de passe:</label>
  <input type="password" id="password" name="password" minlength="8" required>
  <button type="submit">Enregistrer</button>
</form>
