
<?php
require ('gabarit.php');
session_start();

?>
<form method="POST" class="mt-3">
    <h2> we send you an email on <?php echo $_SESSION['email'];
; ?> </h2>
    <div class="form-group">
        <label for="verification-code">Verification Code:</label>
        <input type="text" class="form-control" id="verification-code" name="verification-code" >
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
</form>

