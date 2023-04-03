<?php
if (isset($_GET['erreur'])) {
    $erreur = $_GET['erreur'];
    echo '<div class="alert alert-danger">' . $erreur . '</div>';
}
?>