<?php 
require('gabarit.php'); 
?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php?controller=home">Accueil</a>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Modifier le profil</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="username">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="newusername" name="newusername" value="<?php echo $_SESSION['username']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" class="form-control" id="newemail" name="newemail" value="<?php echo $_SESSION['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="newpassword" name="newpassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

