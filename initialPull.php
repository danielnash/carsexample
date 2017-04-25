<?php

$db = mysqli_connect('127.0.0.1', 'root', '', 'cars');
$queryString = 'SELECT * FROM ';
if ($_POST['backup'] === 'false') {
	$queryString = $queryString.'cars';
}
else {
	$queryString = $queryString.'allcars';
}

if ($_POST['driver'] !== 'false') {
	$queryString = $queryString.' WHERE Driver="'.$_POST['driver'].'"';
}

$result = $db->query($queryString);
$toHTML = '<table>';
while ($row = $result->fetch_assoc()) {
	$toHTML = $toHTML.'<tr><td><b>Model: </b></td></td><td style="width: 20px;"></td><td>'.$row['Model'].'</td><td style="width: 40px;"></td><td><b>Manufacturer: </b></td><td style="width: 20px;"></td><td>'.$row['Manufacturer'].'</td></tr>';
}
$toHTML = $toHTML.'</table>';
echo $toHTML;



// 6 rows 5 columns
?>

