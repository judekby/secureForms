
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <form method="POST">
        <input type="text" name="ville" placeholder = "Entrer votre Ville"><br>
        <input type="text" name="numero" placeholder = "Entrer Numero"><br>
        <br>
        <button> Envoyer</button>
       
    </form>
</head>
<body>
    
</body>
</html>


<?php
if (isset($_POST['ville'])) {
    if(empty($_POST['ville']) || empty($_POST['numero'])){
        $erreur = "Vous devez saisir l'ensemble des informations";
        echo $erreur;
    } else{
        $ville = htmlspecialchars(trim($_POST['ville']));
        $numero = trim($_POST['numero']);

       
        $stmt = $db->prepare("INSERT INTO personne (ville, numero) VALUES (:ville, :numero)");
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':numero', $numero, PDO::PARAM_INT);

        try {
            $stmt->execute();
            echo "Les données ont été insérées avec succès.";
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}


?>