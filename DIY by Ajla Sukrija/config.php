<?php
// Local
/*$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_db = "diy";*/

// Openshift
$mysql_host = "10.1.34.36";
$mysql_user = "diyuser";
$mysql_pass  = "diy2017sa";
$mysql_db = "diydb";

function isUserLogedIn() {
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}
?>
