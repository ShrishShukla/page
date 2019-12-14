<?php

define('server','localhost');
define('user1','tempuser');
define('pass1','shrish@23');
define('dbname','bfdi');

$link=mysqli_connect(server,user1,pass1,dbname);
if($link == FALSE){
	echo "couldn't connect check the credentials";
}
else{
	echo "connected";
}
?>