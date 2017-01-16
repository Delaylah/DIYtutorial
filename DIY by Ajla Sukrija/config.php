<?php
// Local
/*$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_db = "diy";*/

// Openshift
$mysql_host = getenv('OPENSHIFT_MYSQL_DB_HOST');
//define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT');
$mysql_user = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$mysql_pass  = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$mysql_db = getenv('OPENSHIFT_APP_NAME');

echo "HOST: ".$mysql_host;
echo "USER: ".$mysql_user;
echo "PASS: ".$mysql_pass;
echo "DB: ".$mysql_db;
?>