<form method="POST" action="traitement.php">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
  
    <label for="email">Adresse e-mail :</label>
    <input type="email" id="email" name="email" required>
  
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
  
    <button type="submit">Enregistrer</button>
  </form>

  <script>
    const form = document.querySelector('form');
    const nom = document.querySelecto('#nom');
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');

    form.addEventListener('submit', (event) => {
    // Empêche le formulaire de se soumettre
    event.preventDefault();

    // Vérifie que les champs ne sont pas vides
    if (nom.value === '' || email.value === '' || password.value === '') {
        alert('Veuillez remplir tous les champs.');
        return;
    }

    // Soumet le formulaire
    form.submit();
    });
  </script>

