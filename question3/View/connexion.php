
<?php 
require ('gabarit.php');
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">Connexion</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="username" placeholder="Entrez votre nom d'utilisateur">
                        </div>
                        <div class="form-group">
                            <label for="email"> Email </label>
                            <input type="text" class ="form-control" id="email" placeholder="Entrez votre email">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary"><a href="index.php?controller=authentification.php"></a>Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

