<?php
session_start();

$nameError="";
$emailError="";
$passError="";
$conditionError="";
$unameError="";
$confError="";
$dobError="";
$genderError="";
$uploadError="";
$mblerror="";
$fileerror="";
$gen="";

if(isset($_POST["Submit"]))
{
   // header("Location: Registration2.php");
    $bool1=TRUE;

    $password = $_POST["pass"];
    $user=  $_POST["uname"];
    $first= $_POST["fname"];
    $last= $_POST["lname"];;
    $mobile= $_POST["mbl_no"];
    $email= $_POST["email"];
    $confirm= $_POST["c_pass"];
    $dob= $_POST["dob"];

    //$gen= $_POST["gen"];
    $patternName="/^[a-zA-z ]*$/";
    $patternPass="/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";

    if( empty($password) || empty($user) || empty($first) || empty($last) || empty($email) || empty($confirm)  ){
        echo "Please fill up the form correctly";
        $bool1=FALSE;
    }

    
    if(empty($first) || empty($last)){
        $nameError=" First name or last name cannot be empty ";
        $bool1=FALSE;
    }
    else  if (!preg_match ($patternName, $first) || !preg_match ($patternName, $last) ) {  
        $nameError = "Only alphabets and whitespace are allowed.";  
        $bool1=FALSE;
                 //echo $ErrMsg;  
    }
    else{
        $_SESSION["name"]=$first;
        echo "<br>Name: ".$first." ".$last;
    }

    $patternUname='/^[A-Za-z][A-Za-z0-9]{5,31}$/';
    if(empty($user)){
        $unameError=" Username cannot be empty ";
        $bool1=FALSE;
    }
    else  if (!preg_match ($patternUname, $user)  ) {  
        $unameError = "Only alphabets and numbers allowed and first character should be a letter (length 6-30)";  
        $bool1=FALSE;
                 
    }
    else{
        echo "Username: ".$user;
    }

    if(empty($password)){
        $passError=" Password is not given ";
        $bool1=FALSE;
    }
    else if(!preg_match ($patternPass, $password)){
        $passError="Password should contain at least - length 8, one lowercase letter, one uppercase letter, one number ";
        $bool1=FALSE;
    }
    else{
        echo "<br>Password :".$password;
    }

    if(empty($confirm)){
        $confError=" Confirm password ";
        $bool1=FALSE;
    }
    else if($confirm!=$password){
        $confError="Password did not match";
        $bool1=FALSE;
    }
    
    $patternEmail = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";

    if(empty($email)){
        $emailError=" Email cannot be empty ";
        $bool1=FALSE;
    }
    else if(!preg_match ($patternEmail, $email)){
        $emailError="Email is not valid ";
        $bool1=FALSE;
    }
    else{
        echo "<br>Email: ".$email;
    }

    $date2=date("Y-m-d");//today's date

   $date1=new DateTime($dob); //dob hocche date attribute er variable
   $date2=new DateTime($date2);

   $interval = $date1->diff($date2);

   $myage= $interval->y; //$myage is his current age


    if(empty($dob)){
        $dobError=" Enter date of birth ";
        $bool1=FALSE;
    }
    else if($myage < 15 || $date1 > $date2){
        $dobError="Age must be above 15";
        $bool1=FALSE;
    }
    else{
        echo "<br>Date of birth: ".$dob;
    }

    if(!isset($_POST["gen"])){
        $genderError="select a gender";   
        $bool1=FALSE;
    }
    else{
        echo "<br>Gender: ".$_POST["gen"];
    }

    if(strlen($mobile)!=11){
        $mblerror="Length of phone number must be 11";
        $bool1=FALSE;
    }

    if(!isset($_POST["chk"])){
        $conditionError="You must accept term and conditions to continue";
        $bool1=FALSE;
    }
    


    
    echo $_FILES["myfile"]["name"];

    if(move_uploaded_file($_FILES["myfile"]["tmp_name"],"../uploads/file.jpeg"))
{ 
    //$filepath = "../uploads/".$_FILES["myfile"]["name"];
    echo "<br>File Uploaded";
}

else
{
    $fileerror = "File not uploaded";
    $bool1=FALSE;
}







//echo "my value: ".$mydata[0]->lastName;
/*	 foreach($mydata as $myobject)
{
foreach($myobject as $key=>$value)
{
  echo "your ".$key." is ".$value."<br>";
} 
}
*/
if($bool1==TRUE){
    
    $formdata = array(
        'firstName'=> $_POST["fname"],
        'lastName'=> $_POST["lname"],
        'uname' => $_POST["uname"],
        'password' => $_POST["pass"],
        'email'=>$_POST["email"],
        'mobile'=> $_POST["mbl_no"],
        'Dob'=> $_POST["dob"],
        'gen'=> $_POST["gen"],
        'Files: ' => $_FILES["myfile"]["name"]
     );
    
     $existingdata = file_get_contents('../data/admin_data.json');
     $tempJSONdata = json_decode($existingdata);
     $tempJSONdata[] =$formdata;
     //Convert updated array to JSON
     $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
     
     //write json data into data.json file
     if(file_put_contents("../data/admin_data.json", $jsondata)) {
          echo "Data successfully saved <br>";
      }
     else 
          echo "no data saved";
    
    $data = file_get_contents("../data/admin_data.json");
    $mydata = json_decode($data);

    header("Location: admin_profile.php");
}

}

?>
