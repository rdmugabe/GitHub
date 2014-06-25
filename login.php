<html>
<head>
<title>Richard</title>

<link rel="stylesheet" type="text/css" href="/richard/css/styles.css">
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="/richard/js/javascript.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
</head>
<link rel="shortcut icon" type="image/x-icon" href="/richard/css/icon.jpg" />`
<body>
        <div class="rmm">
            <ul>
                <li><a href='/richard/index.php'>Home</a></li>
                <li><a href='#about-me'>About me</a></li>
                <li><a href='#gallery'>Gallery</a></li>
                <li><a href='#blog'>Blog</a></li>
                <li><a href='#links'>Links</a></li>
                <li><a href='#sitemap'>Sitemap</a></li> 
            </ul>
<?php  //Start the Session
session_start();
 require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
 
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $username;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
echo "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "Hai " . $username . "
";
echo "This is the Members Area
";
?>
<div class="container1">
	<?php echo "<a href='logout.php'>Logout</a>"; ?>
</div>
<?php
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
?>

<!-- Form for logging in the users -->

<div class="rmm2">
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>
<h1>Login</h1>

<form action="index3.php" method="POST">
    <p><label>User Name : </label>
	<input id="username" type="text" name="username" placeholder="username" /></p>
 
     <p><label>Password&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password" placeholder="password" /></p>
<div class="container">
    <a href="http://www.richardmgb.comeze.com/richard/index2.html">Signup</a>
    <input class="container" type="submit" name="submit" value="Login" />
</div>
    </form>
</div>
<?php } ?>
</body>
</html>