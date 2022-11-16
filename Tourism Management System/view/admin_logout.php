<?php

session_start();

session_destroy();


?>
<html>
    <body>
    <?php header("Location: admin_login.php"); ?>
    </body>
</html>