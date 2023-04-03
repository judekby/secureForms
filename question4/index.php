<!--Voici un exemple de formulaire HTML de gestion de profil 
utilisateur avec des contrôles front-end :-->

<form id="user-profile-form">
  <label for="name">Nom:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Adresse e-mail:</label>
  <input type="email" id="email" name="email" required>

  <label for="password">Mot de passe:</label>
  <input type="password" id="password" name="password" minlength="8" required>

  <button type="submit">Enregistrer</button>
</form>

<script>
  // Ajouter des contrôles front-end avec JavaScript ou jQuery ici
</script>
