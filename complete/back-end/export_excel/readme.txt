1. access cell
	$spreadsheet->getActiveSheet()->setCellValue('A1', 'PhpSpreadsheet');
	Or $spreadsheet->getActiveSheet() ->getCell('B8')->setValue('Some value');
	1.1 Get the value from cell A1
		$cellValue = $spreadsheet->getActiveSheet()->getCell('A1')->getValue();
	1.2 set formula
		$spreadsheet->getActiveSheet()->setCellValue('A4','=IF(A3, CONCATENATE(A1, " ", A2), CONCATENATE(A2, " ", A1))');

3. setting range value from array
	$arrayData = [
    	[NULL, 2010, 2011, 2012],
   	 ['Q1',   12,   15,   21],
    	['Q2',   56,   73,   86],
    	['Q3',   52,   61,   69],
    	['Q4',   30,   32,    0],
	];
	$spreadsheet->getActiveSheet()
    	->fromArray(
        	$arrayData,  // The data to set
        	NULL,        // Array values with this value will not be set
        	'C3'         // Top left coordinate of the worksheet range where
                     //    we want to set these values (default is A1)
    	);
	
4.
