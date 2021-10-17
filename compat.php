<?php

/*
function db () {
    static $connection;
    if ($connection===NULL){ 
        $connection = mysqli_connect($SETTINGS["hostname"], $SETTINGS["db_user"], $SETTINGS["db_pass"],$SETTINGS["app_db"]) or die ('Unable to connect to MySQL server.<br />Please make sure your MySQL login details are correct.<br /><br />' . mysqli_connect_error());
		//$db = mysqli_select_db($connection,$SETTINGS["app_db"]) or die ('Unable to select database.' . mysqli_error($connection));
    }
    return $connection;
}
*/
$connection = @mysqli_connect($SETTINGS["hostname"], $SETTINGS["mysql_user"], $SETTINGS["mysql_pass"],$SETTINGS["mysql_database"]) or die ('Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.');
$db = @mysqli_select_db($connection,$SETTINGS["mysql_database"]) or die ('Unable to select database.' . mysqli_error($connection));
GLOBAL $connection;
GLOBAL $db;

if (!function_exists('mysql_connect')){
	function mysql_connect($hostname,$db_user,$db_pass){
		$connection = @mysqli_connect($hostname, $db_user, $db_pass,$app_db,$SETTINGS["mysql_database"]) or die ('<br /><br />Unable to connect to MySQL server.<br ><br >Please make sure your MySQL login details are correct.' . mysqli_error($connection));
		return $GLOBALS[$connection];
	}	
}

if (!function_exists('mysql_select_db')){
	function mysql_select_db($app_db,$conn){
		$db = @mysqli_select_db($conn,$app_db) or die ('Unable to select database.' . mysqli_error($conn));
		return $db;
	}
}

if (!function_exists('mysql_set_charset')){
	function mysql_set_charset($charset){
		GLOBAL $connection;
		return mysqli_set_charset($connection,$charset);
	}	
}

if (!function_exists('mysql_query')){
	function mysql_query($sql,$connection){
		GLOBAL $connection;
		return mysqli_query($connection,$sql);
	}
}

if (!function_exists('mysql_fetch_array')){
	function mysql_fetch_array($query){
		GLOBAL $connection;
		GLOBAL $result;
		$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
		return $result;
	}	
}

if (!function_exists('mysql_fetch_assoc')){
	function mysql_fetch_assoc($query){
		GLOBAL $connection;
		GLOBAL $result;
		$result = mysqli_fetch_assoc($query);
		return $result;
	}
}

if (!function_exists('mysql_num_rows')){
	function mysql_num_rows($query){
		GLOBAL $connection;
		if ($query == NULL){
			return 0;
		}else{
			return mysqli_num_rows($query);
		}
	}
}

if (!function_exists('mysql_num_fields')){
	function mysql_num_fields($query){
		GLOBAL $connection;
		if ($query == NULL){
			return 0;
		}else{
			return mysqli_num_fields($query);
		}
	}
}

if (!function_exists('mysql_error')){
	function mysql_error(){
		GLOBAL $connection;
		return mysqli_error($connection);
	}
}

if (!function_exists('mysql_real_escape_string')){
	function mysql_real_escape_string($escapestring){
		GLOBAL $connection;
		return mysqli_real_escape_string($connection,$escapestring);
	}
}

if (!function_exists('mysql_free_result')){
	function mysql_free_result($query){
		GLOBAL $connection;
		return mysqli_free_result($query);
	}
}

if (!function_exists('mysql_field_name')){
	function mysql_field_name($query,$num){
		GLOBAL $connection;
		return mysqli_fetch_field_direct($query,$num);
	}
}
?>