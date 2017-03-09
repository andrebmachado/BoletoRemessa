<?php
include_once 'class/fileGenerate.class.php';
include_once 'class/castType.class.php';
include_once 'class/dataSet.class.php';
include_once 'class/dataSource.class.php';

$teste = new dataSource();


$teste->Append($headerArquivo);
$teste->addField("CodBancoComp_G001", "2");
$teste->addField("LoteServico_G002", "3");
$teste->addField("TipoRegistro_G003", "3");
$teste->addField("FEBRABAM1_G004", "3");
$teste->addField("tpPessoa_G005", "3");
$teste->addField("tpPessoaNum_G006", "3");
$teste->addField("ConvBanco_G007", "3");
$teste->addField("NumAgencia_G008", "3");
$teste->addField("DVAgencia_G009", "3");
$teste->addField("NumContaC_G010", "3");
$teste->addField("DVConta_G011", "3");
$teste->addField("DVAgConta_G012", "3");
$teste->addField("NomeEmpresa_G013", "3");
$teste->addField("NomeBanco_G014", "3");
$teste->addField("FEBRABAN2_G004", "3");
$teste->addField("CodRemRet_G015", "3");
$teste->addField("DataGeracao_G016", "3");
$teste->addField("HoraGeracao_G017", "3");
$teste->addField("NumSeqArquivo_G018", "3");
$teste->addField("LayoutArquivo_G019", "3");
$teste->addField("DensGravArquivo_G020", "3");
$teste->addField("ReservBB_G021", "3");
$teste->addField("ReservEmpresa_G022", "3");
$teste->addField("FEBRABAN3_G004", "3");
$teste->post();


$teste->Append($headerLote);
$teste->addField("CodBancoComp_G001", "2");
$teste->addField("LoteServico_G002", "3");
$teste->post();

$teste->saveToFile("");




