<?php
include("../control/admin_login_process.php");
if(isset($_SESSION['firstName']))
{
    header("Location: admin_profile.php");
}
?>


<html>
    <body>
  
    <div>  
        <p><h1 align="center">
           <span style="color:indianred"> TOURISM MANAGEMENT SYSTEM </span>
           </h1>
        </p>
        <hr>  
    </div>

    <center>
        <h1>Admin Login</h1>
        <hr size="2" width="100%">



    <form action ="" method="POST" enctype="multipart/form-data">
        <center>          
<table>
    <tr>
        <td>User name:</td>
        <td><input type="text" name="username" ></td> 
</tr>

<tr>
        <td>Password:</td>
        <td><input type="password" name="password" ></td> <br>
</tr>

       <tr><td></td>
           <td>
                  <center>
                           <input type="submit" name="submit" value="Login">
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                          
                        
</td>
</tr>
</table>
<!-- <center>Not registered yet? <a href="../view/admin_Registration.php"> Click here </a></center>  -->
<br>
<a href="../view/homepage.php">Go to homepage</a>               
</center>


</form>
</center>

</body>
</html>