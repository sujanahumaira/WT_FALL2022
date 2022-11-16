<?php
session_start();

if(isset($_POST["submit"])){


    $flag=0;

    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];

    $existingdata = file_get_contents('../data/admin_data.json');
    $existingdata = json_decode($existingdata, true);

    foreach ($existingdata as $row){
        if($_SESSION['username']==$row["uname"] && $_SESSION['password']==$row["password"])
                     {  
                        $_SESSION['username']=$row["uname"];
                        $_SESSION['password']=$row["password"];
                        $_SESSION['firstName']=$row["firstName"];
                        $_SESSION['lastName']=$row["lastName"];
                        $_SESSION['email']=$row["email"];
                        $_SESSION['mobile']=$row["mobile"]; 
                        $_SESSION['Dob']=$row["Dob"];
                        $_SESSION['gen']=$row["gen"];
                        $_SESSION['Files']=$row["Files"];

                        header('Location:admin_profile.php');

                            $flag=1;
                            /*if(!empty($_POST["remember"])) {
                                setcookie ("username",$_POST["username"],time()+ 120);
                                setcookie ("password",$_POST["password"],time()+ 120);
                                //echo "<h1>Cookies Set Successfuly</h1>";
                            } 
                            else {
                                setcookie("username","");
                                setcookie("password","");
                                //echo "<h1>Cookies Not Set</h1>";
                            }*/
                            //header('location:test.php');
                     }
    }
    if($flag==0){
        echo "<h2>Username or password is not valid</h2>" ;
    }
    
}


?>