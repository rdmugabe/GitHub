<?php
	require('connect.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username']) && isset($_POST['password'])){
        
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$username = $_POST['username'];
        $password = $_POST['password'];
 
        $query = "INSERT INTO `user` (firstName, lastName, username, password) VALUES ('$firstName', '$lastName','$username', '$password')";
        $result = mysql_query($query);
        if($result){
            $msg = "User Created Successfully.";
        }
    }
    ?>
<!DOCTYPE html>
<html>
<head>
<title>Richard</title>
<link rel="stylesheet" type="text/css" href="/richard/css/styles.css" />
</head>
<body>
    <!-- Form for logging in the users -->
<div class="register-form">
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>
<h1>Register</h1>
<form action="" method="POST">
    <p><label>First Name : </label>
	<input id="firstName" type="text" name="firstName" placeholder="firstName" /></p>	

    <p><label>Last Name : </label>
	<input id="lastName" type="text" name="lastName" placeholder="lastName" /></p>
	
    <p><label>User Name : </label>
	<input id="username" type="text" name="username" placeholder="username" /></p>
 
     <p><label>Password&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password" placeholder="password" /></p>
 
    <a class="btn" href="login.php">Login</a>
    <input class="btn register" type="submit" name="submit" value="Register" />
    </form>
</div>
</body>
</html>