
<?php 
require ('gabarit.php');
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Connexion</div>
                <div class="card-body">
                    <form  method="POST">
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" placeholder="Entrez votre nom d'utilisateur" name="username" required pattern="^[A-Za-z '-]+$" maxlength="15" autocomplete="on">
                        </div>
                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="text" class ="form-control" id="email" placeholder="Entrez votre email" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" autocomplete="on">
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" name="password" minlength="8">
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

