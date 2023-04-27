<?php
require_once 'vendor/autoload.php';
use Assetic\Asset\StringAsset;



if(isset($_GET['minify-php']) && $_GET['minify-php']){
    $code = file_get_contents('test.php');
    $asset = new StringAsset($code);
    header("./");
}
if(isset($_GET['unminify-php']) && $_GET['unminify-php']){
    $minifier = new Minify\JS();
    $minifiedCode = file_get_contents('test.php');
    $minifier->add($minifiedCode);
    $unminifiedCode = $minifier->minify(null, null);
    file_put_contents('test.php', $unminifiedCode);
    header("./");
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<button>
    <a href="./index.php?minify-php=true">Minify PHP File</a>
</button>
<button>
    <a href="./index.php?unminify-php=true">Un-Minify PHP File</a>
</button>
</body>
</html>
