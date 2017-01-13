<?php

         $host = "localhost";          //address to the server where database resides
         $user = "root";            //login id
         $pw   = "root";                //password
         $database = "hpvcente_test_order_database";     //database name

         $db = mysql_connect($host,$user, $pw) or die("Cannot connect to MySQL.");
  
         mysql_select_db($database,$db) or die("Cannot connect to database.");
?>
