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
<div class="container">
<h1>Success</h1>

        <?php
        //    }
            //else {
                // This is a form submission with population data input "pop"
                // Display the data
                
                // Connect to the world database on this host
                define("DB_HOST", "mysql17.000webhost.com");
                define("DB_USER", "a5248262_mugabe");
                define("DB_PASS", "secret1");
                define("DB_NAME", "a5248262_richard");
                //define("DB_UNIX_SOCKET", "/var/run/mysqld/mysqld.sock");  // from phpinfo()
                //define("DB_PORT", 3306);
                //$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT); //, DB_UNIX_SOCKET);
		
		/* instantiate our class, and select our database automatically */
		//$db = mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		 
		/*
		let's assume we've just received a form submission.
		so we'll receive the information, and we'll escape it
		this step is not necessary, but why not.
		*/
		//$fName  = $_POST['firstName'];
		//$lName   = $_POST['lastName'];
		 
		/* build the query, we'll use an insert this time */
		//$query = "INSERT INTO `example` (`firstName`, `lastName`) VALUES ($fName, $lName);";
		 
		/*
		bind your parameters to your query
		in our case, string integer string
		*/
		//$query->bind_param("si",$fName,$lName);
		/* execute the query, nice and simple */
		//$query->execute();
		
		$con = mysql_connect("mysql17.000webhost.com","a5248262_mugabe","secret1");
		if (!$con)
		  {
		  die('Could not connect: ' . mysql_error());
		  }
		 
		mysql_select_db("a5248262_richard", $con);
		 
		$sql="INSERT INTO example (firstName, lastName, username, password)
		VALUES
		('$_POST[fname]','$_POST[lname]','$_POST[username]','$_POST[password]')";
		 
		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "1 record added";
		 
		mysql_close($con)
		?>
		</div>
	</div>
</body>
</html>