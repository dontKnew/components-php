<?php



// (A) CONNECT TO DATABASE - CHANGE SETTINGS TO YOUR OWN!
$dbhost = "localhost";
$dbname = "elect7wk_rapidexiwebs";
$dbchar = "utf8";
$dbuser = "elect7wk_rapidexiwebs";
$dbpass = "HemantSohan@#321";
try {
  $pdo = new PDO(
    "mysql:host=$dbhost;charset=$dbchar;dbname=$dbname",
    $dbuser, $dbpass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }

// (B) PHPSPREADSHEET TO LOAD EXCEL FILE
require "vendor/autoload.php";
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("ratelist.xlsx");
$worksheet = $spreadsheet->getActiveSheet();

// (C) READ DATA + IMPORT
$sql = "INSERT INTO `ratelist` (`destination`, `code`, `zone`, `service`,   `estimated_delivery`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `u`, `v`, `w`, `x`, `y`, `z`, `aa`, `ab`, `ac`, `ad`, `ae`, `af`, `ag`, `ah`, `ai`, `aj`, `ak`, `al`, `am`, `an`, `ao`, `ap`, `aq`, `ar`, `as1`, `at`, `au`, `av`, `aw`, `ax`, `ay`, `az`, `ba`, `bb`, `bc`, `bd`, `be`, `bf`, `bg`, `bh`, `bi`, `bj`, `bk`, `bl`, `bm`, `bn`, `bo`, `bp`) VALUES (?, ?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
foreach ($worksheet->getRowIterator() as $row) {
  // (C1) FETCH DATA FROM WORKSHEET
  $cellIterator = $row->getCellIterator();
  $cellIterator->setIterateOnlyExistingCells(false);
  $data = [];
  foreach ($cellIterator as $cell) { $data[] = $cell->getValue(); }

  // (C2) INSERT INTO DATABASE
  print_r($data);
  try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
    echo "OK - USER ID - {$pdo->lastInsertId()}<br>";
  } catch (Exception $ex) { echo $ex->getMessage() . "<br>"; }
  $stmt = null;
}

// (D) CLOSE DATABASE CONNECTION
if ($stmt !== null) { $stmt = null; }
if ($pdo !== null) { $pdo = null; }
