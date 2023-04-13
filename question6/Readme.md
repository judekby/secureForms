Explication du code pour la question 6


1. Vérifier la méthode de soumission des données :
La première étape consiste à vérifier que la méthode utilisée pour soumettre les données est POST. Cela signifie que les données ont été envoyées depuis un formulaire et qu'elles ne peuvent pas être accessibles directement via l'URL.

2. Récupérer les données soumises par le formulaire :
Le code récupère les données soumises par le formulaire en utilisant la méthode $_POST. Les données sont stockées dans des variables (nom, email, password) pour une utilisation ultérieure.

3. Vérifier que tous les champs sont remplis et que l'e-mail est valide :
Cette étape vérifie si les champs nom, email et password sont remplis en utilisant la fonction empty(). Si l'un de ces champs est vide, le script affiche un message d'erreur et s'arrête.
De plus, cette étape vérifie que l'e-mail est valide en utilisant la fonction filter_var() avec le paramètre FILTER_VALIDATE_EMAIL. Si l'e-mail n'est pas valide, le script affiche un message d'erreur et s'arrête.

4. Se connecter à la base de données MySQL :
Le code établit une connexion avec la base de données MySQL en utilisant la fonction mysqli_connect(). Les paramètres nécessaires pour se connecter à la base de données sont le nom d'hôte, le nom d'utilisateur, le mot de passe et le nom de la base de données.

5. Générer une clé de chiffrement aléatoire :
Le code utilise la fonction openssl_random_pseudo_bytes() pour générer une clé de chiffrement aléatoire de 32 octets.

6. Chiffrer les données :
Le code utilise la fonction openssl_encrypt() pour chiffrer les données (nom, email, password) en utilisant l'algorithme AES-256-CBC et la clé de chiffrement aléatoire générée à l'étape précédente.

7. Stocker les données chiffrées dans la base de données :
Le code utilise la méthode préparée mysqli_prepare() pour préparer la requête SQL d'insertion dans la table 'users'. Les données chiffrées sont liées aux paramètres de la requête avec la méthode bind_param() et la requête est exécutée avec la méthode execute(). Si l'exécution est réussie, un message est affiché pour indiquer que l'enregistrement a été créé avec succès, sinon un message d'erreur est affiché.

8. Déchiffrer les données pour les afficher à l'utilisateur :
Le code utilise la fonction openssl_decrypt() pour déchiffrer les données (nom, email, password) chiffrées précédemment en utilisant la même clé de chiffrement aléatoire. Les données déchiffrées sont stockées dans des variables distinctes (decrypted_password, decrypted_email, decrypted_nom). Ces données sont ensuite affichées à l'utilisateur à l'aide de la fonction echo().

9. Fermer la requête et la connexion à la base de données :
Enfin, le code ferme la requête en utilisant la méthode close() et la connexion à la base de données en utilisant la fonction mysqli_close().