<?php
include_once 'class/fileGenerate.class.php';
include_once 'class/castType.class.php';
include_once 'class/dataSet.class.php';




$teste = new dataSource($dataSet);
print $teste->Append();        
$teste->addField("CodBancoComp_G001", "2");
$teste->addField("LoteServico_G002", "3");
$teste->post();
$teste->addField("CodBancoComp_G001", "2");
$teste->addField("LoteServico_G002", "3");

var_dump($teste->getLineStr());


//$teste->addField("LoteServico_G002", "0000");
//$teste->addField("TipoRegistro_G003", "0");
//$teste->addField("tpPessoa_G005", "0s");



exit;
//echo "<pre>";
//print_r($teste->fixType("CodBancoComp_G001","321321"));


//$str = str_pad("", 100, "0");
$str = "00000000010000000001";
$sb1 = "bob";
$sb2 = "99999";

echo "<br>";

$str = substr_replace($str,$sb1,4,strlen($sb1));
$str = substr_replace($str,$sb2,1,strlen($sb2));


echo $str."<br>";
echo strlen($str);

