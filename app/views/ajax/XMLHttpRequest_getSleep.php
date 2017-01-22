<?php 

header("Content-Type: text/plain");

$sleep = (isset($_GET["Sleep"])) ? $_GET["Sleep"] : NULL;

echo date("h:i:s") . "\n\n";

if ($sleep) {
	sleep($sleep);
	echo $sleep . "\n\n";
} else {
	sleep(10);
	echo "10\n\n";
}
echo date("h:i:s") . "\n";

?>