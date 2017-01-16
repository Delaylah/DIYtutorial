<?php
include "config.php";

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$conditions = array();

if (isset($_GET['titleContains'])) {
    $titleContains = $conn->real_escape_string($_GET['titleContains']);
    array_push($conditions, "title LIKE '%$titleContains%'");
}

if (isset($_GET['descriptionContains'])) {
    $descContains = $conn->real_escape_string($_GET['descriptionContains']);
    array_push($conditions, "description LIKE '%$descContains%'");
}

if (isset($_GET['moreVotesThan'])) {
    $votesCount = $conn->real_escape_string($_GET['moreVotesThan']);
    array_push($conditions, "(SELECT COUNT(*) FROM votes v WHERE v.image_id=i.id)>=$votesCount");
}

$sql = "SELECT *, (SELECT COUNT(*) FROM votes v WHERE v.image_id=i.id) AS votes FROM images i";
if (count($conditions) > 0) {
    $sql = $sql . " WHERE " . implode(" AND ", $conditions);
}

$result = $conn->query($sql) or die("ERROR: " . $conn->error);
$allData = $result->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($allData);

$conn->close();
?>