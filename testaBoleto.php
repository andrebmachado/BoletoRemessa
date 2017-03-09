<?php
include_once 'class/fileGenerate.class.php';
include_once 'class/castType.class.php';
include_once 'class/dataSet.class.php';
include_once 'class/dataSource.class.php';

$remessaBB = new dataSource();

//
$remessaBB->Append($headerArquivo);
$remessaBB->addField("CodBancoComp_G001", "001"); /* Banco do Brasil 001 */
$remessaBB->addField("LoteServico_G002", "0000"); /* */
$remessaBB->addField("TipoRegistro_G003", "3");   /* */
$remessaBB->addField("FEBRABAM1_G004", "3");      /* */
$remessaBB->addField("tpPessoa_G005", "3");       /* */
$remessaBB->addField("tpPessoaNum_G006", "3");    /* */
$remessaBB->addField("ConvBanco_G007", "3");      /* */
$remessaBB->addField("NumAgencia_G008", "3");
$remessaBB->addField("DVAgencia_G009", "3");
$remessaBB->addField("NumContaC_G010", "3");
$remessaBB->addField("DVConta_G011", "3");
$remessaBB->addField("DVAgConta_G012", "3");
$remessaBB->addField("NomeEmpresa_G013", "3");
$remessaBB->addField("NomeBanco_G014", "3");
$remessaBB->addField("FEBRABAN2_G004", "3");
$remessaBB->addField("CodRemRet_G015", "3");
$remessaBB->addField("DataGeracao_G016", "3");
$remessaBB->addField("HoraGeracao_G017", "3");
$remessaBB->addField("NumSeqArquivo_G018", "3");
$remessaBB->addField("LayoutArquivo_G019", "3");
$remessaBB->addField("DensGravArquivo_G020", "3");
$remessaBB->addField("ReservBB_G021", "3");
$remessaBB->addField("ReservEmpresa_G022", "3");
$remessaBB->addField("FEBRABAN3_G004", "3");
$remessaBB->post();
//
$remessaBB->Append($headerLote);
$remessaBB->addField("CodBancoComp_G001", "3");
$remessaBB->addField("LoteServico_G002", "3");
$remessaBB->addField("TipoRegistro_G003", "3");
$remessaBB->addField("TipoOperacao_G028", "3");
$remessaBB->addField("TipoServico_G025", "3");
$remessaBB->addField("FEBRABAM4_G004", "3");
$remessaBB->addField("LayoutArquivo_G030", "3");
$remessaBB->addField("FEBRABAM5_G004", "3");
$remessaBB->addField("tpPessoa_G005", "3");
$remessaBB->addField("tpPessoaNum_G006", "3");
$remessaBB->addField("ConvBanco_G007", "3");
$remessaBB->addField("NumAgencia_G008", "3");
$remessaBB->addField("DVAgencia_G009", "3");
$remessaBB->addField("NumContaC_G010", "3");
$remessaBB->addField("DVConta_G011", "3");
$remessaBB->addField("DVAgConta_G012", "3");
$remessaBB->addField("NomeEmpresa_G013", "3");
$remessaBB->addField("Mensagem1_C073", "3");
$remessaBB->addField("Mensagem2_C073", "3");
$remessaBB->addField("NumRemRet_G079", "3");
$remessaBB->addField("DataGravRemRet_G068", "3");
$remessaBB->addField("DataCredito_C003", "3");
$remessaBB->addField("FEBRABAN5_G004", "3");
$remessaBB->post();

$remessaBB->Append($headerLote);
$remessaBB->addField("DataGravRemRet_G068", "3");
$remessaBB->post();



$remessaBB->saveToFile("");




//09 Real 
//02 Dolar Comercial(Venda)
//03 Dolar Turismo(Venda)


