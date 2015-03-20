<pre><?php

$date = date('H:i:s ');
$howMuch = rand(1, 30);
var_dump($date);
var_dump($howMuch);
for ($i=0; $i < $howMuch; $i++) {
	$data = str_pad($date, rand(10, 256), '.')."\r\n";
	echo $data;
	file_put_contents('access.log', $data, FILE_APPEND);
}