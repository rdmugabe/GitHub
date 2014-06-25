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
        

	<?php
            // Sources:
            //     o http://www.pontikis.net/blog/how-to-use-php-improved-mysqli-extension-and-why-you-should
            //     o http://www.php.net/manual/en/book.mysqli.php
            
            // See if there is form data submitted
            if (! array_key_exists('pop', $_REQUEST)) {
                // Put up a form to get a population number 
        ?>
                <form action="index.php" method="get">
                    
                    <input type="submit" name="pop" value="Select all">
                </form>
		<div class="container">
			<a href="http://www.richardmgb.comeze.com/richard/login.php" class="button">Login</a>
			<a href="http://www.richardmgb.comeze.com/richard/index2.html" class="button">Register</a>
		</div>
        <?php
            }
            else {
                // This is a form submission with population data input "pop"
                // Display the data
                
                // Connect to the world database on this host
                define("DB_HOST", "mysql17.000webhost.com");
                define("DB_USER", "a5248262_mugabe");
                define("DB_PASS", "secret1");
                define("DB_NAME", "a5248262_richard");
                //define("DB_UNIX_SOCKET", "/var/run/mysqld/mysqld.sock");  // from phpinfo()
                define("DB_PORT", 3306);
                $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT); //, DB_UNIX_SOCKET);
                if ($db->connect_errno) {
                    // The database connection failed.
                    die('Unable to connect to database [' . $db->connect_error . ']');
                }
       
                // Find all the countries with populations at least the population specified
                //$pop = intval($_REQUEST['pop']);  // The population entered
                
                if (!$stmt = $db->prepare("SELECT firstName, lastName FROM example")) {
                    die("Prepare failed");
                }
		
                else if (!$stmt->execute()) {
                    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
                }
		?>
		<table class="center">
                <caption>
                    All Names
                </caption>
                <thead>
                    <tr><th>First Name</th><th>Last Name</th></tr>
                </thead>
                <tbody>
			<?php
                        $stmt->bind_result($firstName, $lastName);
                        while ($stmt->fetch()) {
                            echo '<tr><td>' . htmlentities($firstName) . '</td>' .
                                 '<td>' . htmlentities($lastName) . '</td></tr>';
                        }
                                                
                        // Close the prepared statement and the database connection
                        $stmt->close();
                        $db->close();
            ?>
	    </tbody>
            </table>
        <?php
            }
        ?>
	</div>
</body>
</html>