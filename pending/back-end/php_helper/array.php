<?php
$arr = array("user"=>"Ankit Kumar", "role"=>"Admin", "Id"=>8545, "special"=>array("key1"=>"value1", "key2"=>"value2"));
/*function 1 */
function find_value($key, array $array) {
        if (isset($array[$key])) {
            return $array[$key];
        }
        foreach ($array as $value) {
            if (is_array($value) && ($result = array_deep_search($key, $value))) {
                return $result;
            }
        }
        return null;
    }
/*var_dump(array_deep_search("key2",$arr));*/
/*end function 1*/

/*start function 2
    2ndParameter Optional will append the string to key like string.key with every key of array
*/
function single_key_pair(iterable $array, string $id = ''): array {
    $flattened = [];
    foreach ($array as $key => $value) {
        $newKey = $id . $key;
        if (is_array($value) && $value !== []) {
            $flattened = array_merge($flattened, single_key_pair($value, $newKey . '.'));
        } else {
            $flattened[$newKey] = $value;
        }
    }
    return $flattened;
}
//print_r(single_key_pair($arr, "test"));
/*output : Array ( [testuser] => Ankit Kumar [testrole] => Admin [testId] => 8545 [testspecial.key1] => value1 [testspecial.key2] => value2 )*/
/*end function 2*/


function uniqueArr($arr){
	$uniqueArr = [];
	foreach($arr as $k=>$v){
                if(!isset($uniqueArr[$k])){
                    $uniqueArr[$k] = $v;
                }    
            }
	return	$uniqueArr; 
}

function csvToArray($filename){
    $csvFile = fopen($filename, 'r');
    $data = array();
    $addedValues = array();
    while (($row1 = fgetcsv($csvFile)) !== false) {
        $row  = array();
        foreach($row1 as $r){
            array_push($row, trim($r));
        }
        if(!empty($row[2])){
            if (!in_array($row[2], $addedValues)) {
                array_push($data, $row);  
                array_push($addedValues, $row[1]);
            }
        }
    }
    fclose($csvFile);
    return $data;
}


?>
