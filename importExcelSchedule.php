<?php 
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('db_config.php');

error_reporting(-1);

if(isset($_POST['Submit'])){

 $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){

 $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
 move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);

 $Reader = new SpreadsheetReader($uploadFilePath);

 $totalSheet = count($Reader->sheets());

 echo "You have total ".$totalSheet." sheets".

 $html="<table border='1'>";
 $html.="<tr><th>День недели</th><th>Группа</th></tr>";

    
		        
    for($i=0;$i<$totalSheet;$i++){

      $Reader->ChangeSheet($i);

      foreach ($Reader as $Row)
      {
        $html.="<tr>";
        //$id  = isset($Row[0]) ? $Row[0] : '';
        $week = isset($Row[0]) ? $Row[0] : '';
        $day = isset($Row[1]) ? $Row[1] : '';
        $groups = isset($Row[2]) ? $Row[2] : '';
        $les1 = isset($Row[3]) ? $Row[3] : '';
        $les2 = isset($Row[4]) ? $Row[4] : '';
        $les3 = isset($Row[5]) ? $Row[5] : '';
        $les4 = isset($Row[6]) ? $Row[6] : '';
        $les5 = isset($Row[7]) ? $Row[7] : '';
        $les6 = isset($Row[8]) ? $Row[8] : '';
        $les7 = isset($Row[9]) ? $Row[9] : '';
        //echo ($les1 . $les2);
        
        $html.="<td>".$day."</td>";
        $html.="<td>".$groups."</td>";
        $html.="</tr>";

        if (strlen($groups)>0){
            $connect_to_db = mysqli_connect("localhost", "u2538870_default", "45kw3U3HkfqFWb7m", "u2538870_default");
        	$r = mysqli_query($connect_to_db, "SET NAMES 'utf8';") or die(mysqli_error($connect_to_db));
        	$r = mysqli_query($connect_to_db, "SET CHARACTER SET 'utf8';") or die(mysqli_error($connect_to_db));
        	$r = mysqli_query($connect_to_db, "SET SESSION collation_connection = 'utf8_general_ci';") or die(mysqli_error($connect_to_db));
        		        
            $mysqli->set_charset("utf8");
    		$query = "INSERT INTO `schedule` (`id`, `week`, `day`, `groups`, `les1`, `les2`, `les3`, `les4`, `les5`, `les6`, `les7`) VALUES (NULL, '$week', '$day', '$groups', '$les1', '$les2', '$les3', '$les4', '$les5', '$les6', '$les7')";
    		//echo $query;
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