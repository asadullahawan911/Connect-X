<?php
require_once "db_Connection.php";
?>
<!DOCTYPE html>
<html>
<body>

<form action="uploads.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>
