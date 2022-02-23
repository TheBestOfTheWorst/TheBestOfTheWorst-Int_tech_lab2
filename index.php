<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа 2</title>
</head>

<body>
<form method="post">

<p>Выбрать тип центрального процессора:<br>
<select name="procTypes">
<?php
try {
    include 'connection.php';

	foreach ($collection->distinct("processor") as $proc) 
		echo "<option>$proc</option>";
}
catch (Exception $e) {
	echo $e->GetMessage();
}
?>
</select><br>

<p>Выбрать установленное ПО:<br>
<select name="softTypes">
<?php
try {
	foreach ($collection->distinct("software") as $soft) 
    echo "<option>$soft</option>";
}
catch (Exception $e) {
	echo $e->GetMessage();
}
?>
</select><br>

<p>Выбрать пункт задания для выполнения:<br>
<select name="mainSelect">
    <option>Task 1</option>
    <option>Task 2</option>
    <option>Task 3</option>
</select>

<br><p><input type="submit" name="SubmButton" value="Выполнить запрос">

 </form>
</body> 
</html>

<!-- BSON - Binary JavaScript Object Notation -->
<?php
if(isset($_POST['SubmButton'])){ // Check if form was submitted
    switch($_POST['mainSelect']) {
    case "Task 1":
        $cursor = $collection->find(array('processor' => $_POST['procTypes'])); break;
    case "Task 2":
        $cursor = $collection->find(array('software' => $_POST['softTypes'])); break;
    case "Task 3":
        //lt (less than) - извлекаем только те даты, которые уже прошли (меньше текущей)
        $cursor = $collection->find(['warranty' => ['$lt' => new MongoDB\BSON\UTCDateTime]]); break;
    }

    //data лучше превратить в массив для более простого вывода
    $data = $cursor->toArray();

    include 'dataOutput.php';
}
?>