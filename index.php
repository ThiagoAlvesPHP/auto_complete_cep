<?php
    require 'PHPExcel/vendor/autoload.php';

    $fileName = "xls/MunicipiosBrasil.xls";
    $excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);

    $excelReader->setLoadAllSheets();
    $excelObj = $excelReader->load($fileName);
    $excelObj->getActiveSheet()->toArray(null, true,true,true);
     
    $worksheetNames = $excelObj->getSheetNames($fileName);
    $return = array();
    foreach($worksheetNames as $key => $sheetName){  
    //define a aba ativa
    $excelObj->setActiveSheetIndexByName($sheetName);
    //cria um array com o nome da aba como índice
    $return[$sheetName] = $excelObj->getActiveSheet()->toArray(null, true,true,true);
    }
    foreach ($return['Sheet1'] as $key => $value) {
        $latitude = $value['B'];
        $longitude = $value['C'];
        $MunUF = $value['D'];
        $municipio = $value['E'];
        $uf = $value['F'];
        $valor = $value['G'];

        if ($municipio == 'GANDU') {
            var_dump($value);
        }
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Auto Complete</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.mask.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h4>Preencha o campo com o CEP de sua cidade</h4>
                    <input type="text" name="" class="form-control cep" autofocus="">
                </div>
                <div class="panel-body">
                    <form>
                        <label>Cidade</label>
                        <input type="text" name="cidade" class="form-control cidade">
                        <label>UF</label>
                        <input type="text" name="uf" class="form-control uf">
                        <label>IBGE</label>
                        <input type="text" name="ibge" class="form-control ibge">
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>



