<html>
<head>
<title>Richard</title>

<link rel="stylesheet" type="text/css" href="/richard/css/styles.css">

</head>
<link rel="shortcut icon" type="image/x-icon" href="/richard/css/icon.jpg" />`
<body>
<h1>Welcome to Richard's World</h1>
<p>
	<img border="0" src="/richard/images/icon.jpg" alt="icon" width="445" height="300">	
</p>
<form action="http://google.com">
    <input type="submit" value="Go to Google">
</form>
	<?php
            // Sources:
            //     o http://www.pontikis.net/blog/how-to-use-php-improved-mysqli-extension-and-why-you-should
            //     o http://www.php.net/manual/en/book.mysqli.php
            
            // See if there is form data submitted
            if (! array_key_exists('pop', $_REQUEST)) {
                // Put up a form to get a population number 
        ?>
                <form action="index.php" method="get">
                    <label> all:
                        <input type="number" name="pop" min="100000" max="2000000000" step="100000" value="100000000" required placeholder="Min Population">
                    </label>
                    <input type="submit" value="Go">
                </form>
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
                $pop = intval($_REQUEST['pop']);  // The population entered
                
                if (!$stmt = $db->prepare("SELECT firstName, lastName FROM example
					  where 0 <= ?")) {
                    die("Prepare failed");
                }
		else if (!$stmt->bind_param("i", $pop)) {
                    die("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
                }
                else if (!$stmt->execute()) {
                    die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
                }
		?>
		<table>
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
</body>
</html>