<?
$aa=15;
function foo(){
	global $aa;
	echo $aa;
	return array(12,3,4);

}
foo(); 
?>