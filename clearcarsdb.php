<?php 

$db = mysqli_connect('127.0.0.1', 'root', '', 'cars');
$result = $db->query('DELETE FROM cars');
echo $result;

?>