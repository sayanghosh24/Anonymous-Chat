<?php
include_once "conn.php";

$id = mysqli_real_escape_string($con, $_POST["id"]);
$ip_add = mysqli_real_escape_string($con, $_POST["ip_add"]);
$mac_add = mysqli_real_escape_string($con, $_POST["mac_add"]);
$message = mysqli_real_escape_string($con, $_POST["message"]);

$sql = "INSERT INTO messages (id, ip_add, mac_add, message) VALUES ('$id', '$ip_add', '$mac_add', '$message')";

$status = mysqli_query($con, $sql);

if ($status) {
    header("Location: typing.php?status=200");
} else {
    header("Location: typing.php?status=404");
}
?>
