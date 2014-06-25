<?php
 
                define("DB_HOST", "mysql17.000webhost.com");
                define("DB_USER", "a5248262_mugabe");
                define("DB_PASS", "secret1");
                define("DB_NAME", "a5248262_richard");
		$connection = mysql_connect("mysql17.000webhost.com","a5248262_mugabe","secret1");
		if (!$connection)
		  {
		  die('Could not connect: ' . mysql_error());
		  }
		 
		$select_db= mysql_select_db("a5248262_richard", $connection);
?>