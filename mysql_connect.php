<?php

         $host = "localhost";          //address to the server where database resides
         $user = "user";            //login id
         $pw   = "password";                //password
         $database = "database_name";     //database name

         $db = mysql_connect($host,$user, $pw) or die("Cannot connect to MySQL.");
  
         mysql_select_db($database,$db) or die("Cannot connect to database.");
?>
