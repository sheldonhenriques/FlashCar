<?php
    if (isset($_POST['login'])) {
     
include 'connect.php';
$username=$_POST['username'];
$password = $_POST['password'];
$result= mysqli_query($conn,"SELECT `id`, `username`, `password` FROM `user` WHERE username='$username'");
$pass = mysqli_fetch_array($result);
//create session
if($password == $pass['password'])
{
 SESSION_START();
 $_SESSION['user'] = $pass['id'];//session variable assign

phpAlert1(   "Login Successful"   );
 if(!empty($_POST["remember"])) {
	setcookie ("username",$_POST["username"],time()+ 3600);
	setcookie ("password",$_POST["password"],time()+ 3600);
	phpAlert(   "Cookies Set"   );

} else {
	setcookie("username","");
	setcookie("password","");
	phpAlert(   "Cookies not set"   );

}
}
else phpAlert(   "User does not exist"   );
?>
<!--to start session-->
<?php
include "connect.php";

SESSION_UNSET();



    }
    elseif (isset($_POST['delete'])) {
       
include 'connect.php';
$username=$_POST['username'];
$password=$_POST['password'];

if ($username&&$password)
{

$query = mysqli_query($conn,"SELECT `id`, `username`, `password` FROM `user` WHERE username='$username'"); 
$numrows = mysqli_num_rows($query);

if($numrows!=0)
{
while($row = mysqli_fetch_assoc($query))
{
$dbusername = $row['username'];
$dbpassword = $row['password'];

}
if($username==$dbusername&&$password==$dbpassword)
{
$query = mysqli_query($conn,"DELETE FROM `user` WHERE username = '$username' ");
phpAlert(   "delete Successful"   );
$_SESSION['username']= $dbusername;
}
else
phpAlert(   "Incorrect password"   );
}
else
phpAlert("That username doesnt exist");
}
else
phpAlert("Please enter username and password");
mysqli_close($conn);



    }
  elseif (isset($_POST['update'])) {

       
include 'connect.php';
$username=$_POST['username'];
$password=$_POST['password'];
$passwordnew=$_POST['passwordnew'];

if ($username&&$password&&$passwordnew)
{

$query = mysqli_query($conn,"SELECT `id`, `username`, `password` FROM `user` WHERE username='$username'"); 
$numrows = mysqli_num_rows($query);

if($numrows!=0)
{
while($row = mysqli_fetch_assoc($query))
{
$dbusername = $row['username'];
$dbpassword = $row['password'];

}
if($username==$dbusername&&$password==$dbpassword)
{$query = mysqli_query($conn,"update user set password='$passwordnew' where username='$username'");
phpAlert(   "update Successful"   );
$_SESSION['username']= $dbusername;
}
else
phpAlert(   "Incorrect password"   );
}
else
phpAlert("That username doesnt exist");
}
else
phpAlert("Please enter username and password");
mysqli_close($conn);


}
?>
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	echo "<script>window.location.href='../index.html'; </script>";
}
?>
<?php
function phpAlert1($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';

}
?>

