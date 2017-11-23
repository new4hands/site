<?php
$resource = mysql_connect('localhost', 'root', '');
if (!$resource) {
die('Ошибка при подключении: ' . mysql_error());
}
echo 'Подключено успешно!';
mysql_close($resource);