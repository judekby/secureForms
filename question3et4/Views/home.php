<?php
require('gabarit.php');
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: index.php?controller=connexion.php");
		exit(); 
	}
?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php?controller=home">Accueil</a>
        </nav>
    </header>
	<div class="deco">
    <a href="index.php?controller=deconnexion" class="btn btn-danger btn-right mb-3">Déconnexion</a>
</div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h1 class="text-center">Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Vous êtes maintenant connecté.</p>
                        <a href="index.php?controller=updateProfile" class="btn btn-primary btn-block">Modifier le profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

