<?php
include 'connect.php';
$username=$_POST['username'];
$password=$_POST['password'];

if ($username&&$password)
{
	
	$query = mysqli_query($conn,"select `username` from `user` where username='$username'");
	$numrows = mysqli_num_rows($query);
		
		if($numrows!=0)
			phpAlert(   "Username already Exists"   );
		else
		{
			$query = mysqli_query($conn,"insert into `user` values(NULL,'$username','$password')");
			phpAlert(   "Signed up Successfully"   );	
		}
		
	
}


?>
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    echo "<script>window.location.href='../loginclient.html'; </script>";
}
?>