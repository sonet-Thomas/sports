<?php

$con = new mysqli("localhost","root","","login");
if(isset($_POST['reg']))
{
    //print_r($_POST);

    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $sone="insert into login (username,password) values ('$user','$pass')";
$insert=$con->query($sone);
    if($insert==1)
    {
        echo "succesfully inserted";
    }
    else{
         echo "try again";
    }
}
$con = new mysqli("localhost","root","","login");
$querey="select * from login";
$result=$con->query($querey);
//print_r($result);
if(isset($_POST['submit']))
{
    $f=0;
   $user=$_POST['user'];
   $pass=$_POST['pass'];
   
   foreach($result as $resultSingle)
   {
    $dbuser = $resultSingle['username'];
    $dbpass = $resultSingle['password'];
   
    if($dbuser==$user && $dbpass==$pass)
    {
        $f=1;
       
    }
   }
   if($f==1)
   {
       header("location:sonet.html");
   }
   else{
       echo "try again";
       die;
   }
}

//header("location:index.php");
?>
