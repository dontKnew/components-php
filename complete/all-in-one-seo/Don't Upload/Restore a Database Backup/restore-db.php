<?php

/*
 * @author Balaji
 * @name: Rainbow PHP Framework
 * @copyright © 2018 ProThemes.Biz
 *
 */
 
function gzUnCompressFile($srcName, $dstName) {
    $sfp = gzopen($srcName, "rb");
    $fp = fopen($dstName, "w");

    while (!gzeof($sfp)) {
        $string = gzread($sfp, 4096);
        fwrite($fp, $string, strlen($string));
    }
    gzclose($sfp);
    fclose($fp);
}

function restoreMySQLDB($dbHost, $dbUser, $dbPass, $dbName, $filePath, $gzip=false){
    
    $con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (mysqli_connect_errno()) {
        die("Unable to connect to Mysql Server");
    }

    $templine = '';
    
    if($gzip){
        gzUnCompressFile($filePath, substr($filePath,0,-3));
        $filePath =  substr($filePath,0,-3);
    }
    
    $file = new SplFileObject($filePath);
    $i = 0;
    
    while (!$file->eof()) {
        $line = trim($file->fgets());
                    
        if (substr($line, 0, 2) == '--' || $line == '')
            continue;
            
        $templine .= $line;
        
        if (substr(trim($line), -1, 1) == ';'){
            mysqli_query($con,$templine) or print('Error performing query: <br />' . $templine . '  <br />Error Log: '. mysqli_error($con) . '<br /><br />');
            $templine = '';
        }
    }
    $file = null;
    
    if($gzip)
        unlink($filePath);

    echo 'Successfully restored the tables!';
    mysqli_close($con);
}

//Application Path
define('ROOT_DIR', realpath(dirname(__FILE__)) .DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR .'core'.DIRECTORY_SEPARATOR);
define('CONFIG_DIR', APP_DIR .'config'.DIRECTORY_SEPARATOR);

//Get Database Details
require CONFIG_DIR.'config.php';

//Performing a restore operation
if(file_exists(ROOT_DIR.'restore-db.sql'))
    restoreMySQLDB($dbHost, $dbUser, $dbPass, $dbName, ROOT_DIR.'restore-db.sql');
elseif(file_exists(ROOT_DIR.'restore-db.sql.gz'))
    restoreMySQLDB($dbHost, $dbUser, $dbPass, $dbName, ROOT_DIR.'restore-db.sql.gz',true);
else
    die('Backup file not found!');