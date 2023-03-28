<?php
// Connexion à la base de données
$dsn = 'pgsql:host=localhost;dbname=secu_web';
$user = 'judekabeya';
$password = 'jude93zoo';


try {
    $db = new PDO($dsn, $user, $password);
    echo "oui";
} catch (PDOException $e) {
    echo "Une erreur est survenue";
    echo $e;
}

?>

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
    if (empty($_POST['ville']) || empty($_POST['numero'])) {
        $erreur = "Vous devez saisir l'ensemble des informations";
        echo $erreur;
    } else {
        $ville = $_POST['ville'];
        $numero = $_POST['numero'];

        $rs = "INSERT INTO personne (ville, numero) VALUES ('" . $ville . "', '" . $numero . "')";
        try {
            $rs_sql = $db->exec($rs);
            echo "Données insérées avec succès";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <form method="POST">
        <input type="text" name="nom" placeholder = "Entrer votre nom"><br>
        <input type="text" name="prenom" placeholder="Entrer votre prrénom"><br>
        <input type="text" name="age" placeholder = "Entrer votre age"><br>
        <input type="textarea" name="avis" placeholder="Entrer votre avis"> 
        <br>
        <button name="button2"> Envoyer</button>
       
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
        $ville = $_POST['ville'];
        $numero = $_POST['numero'];

        // Utilisation des requêtes préparées pour éviter les injections SQL
        $stmt = $db->prepare("INSERT INTO personne (ville, numero) VALUES (:ville, :numero)");
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':numero', $numero);

        try {
            $stmt->execute();
            echo "Les données ont été insérées avec succès.";
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}


$sql = "select * from personne";
$rs_sql = $db->prepare($sql);
$rs_sql->execute();
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<table align="center">
<thead>
    <tr>
        <th>Nom</th>
        <th>prenom</th>
        <th>Age</th>
        <th>ville</th>
        <th>numero</th>
        <th>Avis</th>

    </tr>
</thead>
<tbody>
    <?php while ($donnees = $rs_sql->fetch()) : ?>
        <tr>
            <!-- Affichage de l'ID de la tâche -->
            <td><?php echo $donnees['nom']; ?></td>
            <!-- Affichage de la description de la tâche -->
            <td><?php echo $donnees['prenom']; ?></td>
            <td><?php echo $donnees['age']; ?></td>
            <td><?php echo $donnees['ville']; ?></td>
            <td><?php echo $donnees['numero']; ?></td>
            <td><?php echo $donnees['avis']; ?></td>
        


        </tr>
    <?php endwhile; ?>
</tbody>
</table>

    
</body>
</html>
