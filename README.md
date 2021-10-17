# php-compatability
A PHP include-file for old project compatibility with php versions after 5.6
This include-file basically creates a function if it does not exists. Example;

if (!function_exists('mysql_query')){
	function mysql_query($sql,$connection){
		GLOBAL $connection;
		return mysqli_query($connection,$sql);
	}
}
