<?php 

header("Content-type: text/csv"); 
header("Content-Disposition: attachment; filename=export-students.csv"); 
header("Pragma: no-cache"); 
header("Expires: 0"); 

$dbHost     = "localhost"; 
$dbUsername = "u2538870_default"; 
$dbPassword = "45kw3U3HkfqFWb7m"; 
$dbName     = "u2538870_default"; 
// Подключение к БД.
$connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
$r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
$r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
$r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
$r = mysqli_query($connect_to_db, "SELECT * FROM students") or die(mysqli_error($connect_to_db));
 
$prods = array();
foreach($r as $row) {
    
	$prods[] = array(
		'znum' => $row['znum'],
		'name' => $row['name'],
		'dateBirth'    => $row['dateBirth'],
		'course'    => $row['course'],
		'groups'    => $row['groups'],
	);
}


// скачивание файла 


 
$buffer = fopen('php://output', 'w'); 
fputs($buffer, chr(0xEF) . chr(0xBB) . chr(0xBF));
foreach($prods as $val) { 
	fputcsv($buffer, $val, ';'); 
} 
fclose($buffer); 
exit();




//сохранение копии файла на сервере:

$buffer = fopen(__DIR__ . '/export/students.csv', 'w'); 
fputs($buffer, chr(0xEF) . chr(0xBB) . chr(0xBF));
foreach($prods as $val) { 
	fputcsv($buffer, $val, ';'); 
} 
fclose($buffer); 
exit();
