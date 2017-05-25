<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_peliiiiiiiculas = "localhost";
$database_peliiiiiiiculas = "bd_peliiiiiiiculas";
$username_peliiiiiiiculas = "root";
$password_peliiiiiiiculas = "123";
$peliiiiiiiculas = mysql_pconnect($hostname_peliiiiiiiculas, $username_peliiiiiiiculas, $password_peliiiiiiiculas) or trigger_error(mysql_error(),E_USER_ERROR); 
?>