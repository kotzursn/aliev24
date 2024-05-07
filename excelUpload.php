<?php 
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('db_config.php');

error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

if(isset($_POST['Submit'])){

 $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){

 $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
 move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

 $Reader = new SpreadsheetReader($uploadFilePath);

 $totalSheet = count($Reader->sheets());

 echo "You have total ".$totalSheet." sheets".

 $html="<table border='1'>";
 $html.="<tr><th>Номер зачетки</th><th>ФИО</th></tr>";

    
		        
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row)
      {
        $html.="<tr>";
        //$id  = isset($Row[0]) ? $Row[0] : '';
        $znum = isset($Row[0]) ? $Row[0] : '';
        $name = isset($Row[1]) ? $Row[1] : '';
        $dateBirth = isset($Row[2]) ? $Row[2] : '';
        $course = isset($Row[3]) ? $Row[3] : '';
        $group = isset($Row[4]) ? $Row[4] : '';
        
        $html.="<td>".$znum."</td>";
        $html.="<td>".$name."</td>";
        $html.="</tr>";

        if (strlen($name)>=3){
            /* For Loop for all sheets */
            $connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
        	$r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
        	$r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
        	$r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
        		        
            $mysqli->set_charset("utf8");
    		$query = "INSERT INTO `students` (`id`, `znum`, `name`, `dateBirth`, `course`, `groups`) VALUES (NULL, '$znum', '$name', '$dateBirth', '$course', '$group')";
            $mysqli->query($query);
        }
       }
    }
    $html.="</table>";
    echo $html;
    echo "<br />Данные успешно добавлены.";
  }else { 
    die("<br/>Извините, возникла ошибка. Допустимы только excel-файлы."); 
  }
}
?>