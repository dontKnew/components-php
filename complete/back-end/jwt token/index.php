<?php
require_once ("./apiExample/config/converter.php");
$converter = new Converter();
$binary =  $converter->stringToBinary("myapp");
echo $converter->binaryToString($binary);

?>