<?php
include_once('globals.php');
	class dbmanager{
		public function executeQuery($sql){			
			$con=mysqli_connect(config::getBBDDServer(), config::getBBDDUser(), config::getBBDDPwd(), config::getBBDDName());
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
			$result = mysqli_query($con, $sql);
			mysqli_close($con);
			return $result;
		}
	}
?>