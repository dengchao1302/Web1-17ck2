<?php
	define("SERVER","remotemysql.com");
	define("DATABASE","4yRfI36w3r");
	define("USERNAME","4yRfI36w3r");
	define("PASSWORD","nYtKUp9bbG");

	class DataProvider
	{
		public static function execQuery($sql)
		{
			$connection = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE) or die("Could not connect to " .SERVER . ".");
			
			mysqli_select_db( $connection,DATABASE);
			mysqli_set_charset($connection,"utf8");
			
			$result = mysqli_query($connection,$sql);
			if(!$result) die("Query failed: " . mysql_error());
			
			mysqli_close($connection);
			return $result;
		}
        public static function execQ($sql)
        {
            $connection = new mysqli(SERVER,USERNAME,PASSWORD,DATABASE);
            if($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
                return 0;
            }
            if($connection->query($sql) == true){
                return 1;
            }
            else {
                 return 0;
            }
            $connection->close();
        }
	}
?>
