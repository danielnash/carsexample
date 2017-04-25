<?php 
$model = $_POST['mod'];
$manufacturer = $_POST['man'];

$db = mysqli_connect('127.0.0.1', 'root', '', 'cars');

if (strlen($model) < 2 || strlen($manufacturer) < 2 || strpos($model, ' ') || strpos($manufacturer, ' ')) {
	echo "That's not correct!";
	exit();
}

if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$queryString = getCarInsert('cars', $model, $manufacturer);

$response = $db->query($queryString);

$backupQuery = getCarInsert('allcars', $model, $manufacturer);

$secondResponse = $db->query($backupQuery);

echo 'First : '.$response.'Second : '.$secondResponse;

function getCarInsert($table, $model, $manufacturer) {
	return 'INSERT INTO '.$table.' (Model, Manufacturer) VALUES ("'.$model.'", "'.$manufacturer.'")';
};
?>