<?php
include_once 'class/fileGenerate.class.php';
include_once 'class/castType.class.php';
include_once 'class/dataSet.class.php';
include_once 'class/dataSource.class.php';

$teste = new dataSource($dataSet);
print $teste->Append();        
$teste->addField("CodBancoComp_G001", "2");
$teste->addField("LoteServico_G002", "3");
$teste->post();
$teste->addField("CodBancoComp_G001", "2");
$teste->addField("LoteServico_G002", "3");

var_dump($teste->getLineStr());

