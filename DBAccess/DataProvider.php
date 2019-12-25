<?php
	define("SERVER","localhost");
	define("DATABASE","QLBanHang");
	define("USERNAME","root");
	define("PASSWORD","");

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
                echo "Successfully";
                return 1;
            }
            else {
                 echo "Error updating record: " . $connection->error;
                 return 0;
            }
            $connection->close();
        }
	}
?>
