
<?php
include('./Views/updateProfile.php');
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['newusername'], $_POST['newmail'], $_POST['newpassword'] )){
        $newUsername = htmlspecialchars($_POST['newusername']);
        $newEmail = filter_var(htmlspecialchars($_POST['newemail'], FILTER_SANITIZE_EMAIL));
        $newpassword = htmlspecialchars($_POST['newusername']);
        try {
            require('Models/updateProfile.php');
            update_profile($username, $email, $password);
            header('Location: index.php?controller=home');
            exit;
        } catch (Exception $e) {
            echo"non";
            print_r($e);

    }
}
    else {
        die("vous devez remplir tous les champs");
    }

}
?>
