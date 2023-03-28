
<?php
require ('./gabarit.php')   
?>
<form method="POST" class="mt-3">
    <div class="form-group">
        <label for="verification-code">Verification Code:</label>
        <input type="text" class="form-control" id="verification-code" name="verification-code" required>
    </div>
    <button type="submit" class="btn btn-primary">Confirm</button>
</form>