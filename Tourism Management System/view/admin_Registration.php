<?php
include("../control/admin_reg_process.php");
if(!isset($_SESSION['firstName']))
{
    header("Location: admin_login.php");
}
?>

<html>
    <body>
   <center>
    <div>  
        <p><h1 align="center">
           <span style="color:indianred"> TOURISM MANAGEMENT SYSTEM </span>
           </h1>
        </p>
           <h3 align= "right">
            <span> Welcome </span>
           <span><a style="color:purple;" href="../view/homepage.php"> | Logout </a></span>
           </h3>
        <hr>  
    </div>
<form action ="" method="POST" enctype ="multipart/form-data">
    
<h1>Agent Registration Form</h1>
<hr size="2" width="100%">
<table>
    <tr>
<td> First name </td>
<td> <input type="text" name="fname" placeholder="Enter first name here"  > </td>
</tr>
<tr>
<td>Last name </td>
<td> <input type="text" name="lname" placeholder="Enter last name here"  ><?php echo $nameError; ?></td>
</tr>
<tr>
<td>Username </td>
<td> <input type="text" name="uname" placeholder="Enter your username here"  ><?php echo $unameError; ?></td>
</tr>
<tr>
<td>Mobile no. </td>
    <td><input type="number" name="mbl_no" placeholder="e.g. 01987654321"><?php echo $mblerror; ?></td>
</tr>
<tr>
<td>Email </td>
    <td><input type="email" name="email" placeholder="e.g. abc123@gmail.com"  ><?php echo $emailError; ?></td>
</tr>
<tr>
<td> Password </td>
<td> <input type="password" name="pass" placeholder="Enter your password here"  ><?php echo $passError; ?><td>
</tr>
<tr>
<td> Confirm password </td>
<td> <input type="password" name="c_pass" placeholder="Enter your password again"  ><?php echo $confError; ?><td>
</tr>
<tr>
<td> Date of birth </td>
<td> <input type="date" name="dob"  ><?php echo $dobError; ?><td>
</tr>
<tr> 
<td>Gender</td>
<td><input type="radio" name="gen" value="Male" >Male  
<input type="radio" name="gen" value="Female">Female</td> <td><?php echo $genderError; ?></td>
</tr>
    
<tr>
<td> Upload a picture of yours </td>
<td> <input type="file" name="myfile"  > <?php echo $fileerror; ?></td>
</tr>

<tr>
    <td></td>
<td><h6><input type="checkbox"  name="chk" value="agree"  >BY CLICKING THIS YOU ARE AGREEING TO OUR TERMS & CONDITIONS</h6> <?php echo $conditionError; ?> </td>
</tr>

<tr> 
    <td></td>
     <td> <input type="submit" name="Submit"  value ="Next">
     <input type="reset" name="Reset"  value ="Reset"></td>
</tr>

</table>
</form>
<a href="../view/homepage.php">Go to homepage</a>
</center>
</body>
    </html>