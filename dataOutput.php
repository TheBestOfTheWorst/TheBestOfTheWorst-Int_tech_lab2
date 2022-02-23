<?php
	if(empty($data))
		echo 'Информация в базе данных отсутствует!';
	else {
		echo '<table border = \'1\'>';
		foreach ($data as $arr) {
			echo '<tr>';	
			foreach($arr as $key => $value) {
				echo '<td>';

				switch(get_class((object)$value))
				{
					case "MongoDB\Model\BSONArray":
						foreach($value as $soft)
						echo $soft.'<br>';
						break;
					case "MongoDB\BSON\UTCDateTime": 
						echo $value->toDateTime()->format('Y-m-d H:i:s');
						break;
					default: 
						echo $value;
						break; 
				}			
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '</table>';
	}
?>