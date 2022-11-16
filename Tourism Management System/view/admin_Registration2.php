<?php
include("../control/admin_reg_process2.php");
if(isset($_SESSION['firstName']))
{
    header("Location: admin_profile.php");
}
?>
<html>
    <body>
    <form action ="" method="POST" enctype ="multipart/form-data">

        <center><br><br><br><br>
        <h1> Your registration is complete!</h1>
        
        <h2>
        <table><tr>
        <td><a href="../view/admin_login.php">Login</a></td>
    </tr>
<tr><td>
<a href="../view/homepage.php">Go to homepage</a>
</td></tr></table>
        </h2>
        </center>
        
</form>
</body>
</html>
