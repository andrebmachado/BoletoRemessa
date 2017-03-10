<?php
include_once 'class/fileGenerate.class.php';
include_once 'class/castType.class.php';
include_once 'class/dataSet.class.php';
include_once 'class/dataSource.class.php';

$remessaBB = new dataSource();

//HeaderDoArquivo
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
//HeaderDoLote
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

//HeadereSeguimentoP
$remessaBB->Append($SeguimentoP);
$remessaBB->addField("CodBancoComp_G001", "0");
$remessaBB->addField("LoteServico_G002", "0");
$remessaBB->addField("TipoRegistro_G003", "0");
$remessaBB->addField("NumSeqRegLote_G038", "0");
$remessaBB->addField("CodSegRegDetalhe_G039", "0");
$remessaBB->addField("FEBRABAN1_G004", "0");
$remessaBB->addField("CodMovRemessa_C004", "0");
$remessaBB->addField("CodMovRemessa_C004", "0");
$remessaBB->addField("NumAgencia_G008", "0");
$remessaBB->addField("DVAgencia_G009", "0");
$remessaBB->addField("NumContaC_G010", "0");
$remessaBB->addField("DVConta_G011", "0");
$remessaBB->addField("DVAgConta_G012", "0");
$remessaBB->addField("IdTituloBanco_G069", "0");
$remessaBB->addField("CodCarteira_C006", "0");
$remessaBB->addField("FormCadTitBanco_C007", "0");
$remessaBB->addField("TipoDoc_C008", "0");
$remessaBB->addField("IdEmiBloqueto_C009", "0");
$remessaBB->addField("IdDistribuicao_C010", "0");
$remessaBB->addField("NumDocCobranca_C011", "0");
$remessaBB->addField("DataVencTit_C012", "0");
$remessaBB->addField("VlrNominalTit_G070", "0");
$remessaBB->addField("AgEncCobranca_C014", "0");
$remessaBB->addField("DVAgencia_G009", "0");
$remessaBB->addField("EspecieTit_C015", "0");
$remessaBB->addField("IdTitulo_C015", "0");
$remessaBB->addField("DataEmitTit_G071", "0");
$remessaBB->addField("CodJurosMora_C018", "0");
$remessaBB->addField("DataJurosMora_C019", "0");
$remessaBB->addField("JurosMoraDiaTx_C020", "0");
$remessaBB->addField("CodDesconto1_C021", "0");
$remessaBB->addField("DataDesconto1_C022", "0");
$remessaBB->addField("PercentDesconto1_C023", "0");
$remessaBB->addField("IOFRecolhido_C023", "0");
$remessaBB->addField("ValorAbatimento_G45", "0");
$remessaBB->addField("IdTituloEmpresa_G72", "0");
$remessaBB->addField("CodProtesto_C026", "0");
$remessaBB->addField("NumDiasProtesto_C027", "0");
$remessaBB->addField("CodBaixa_C028", "0");
$remessaBB->addField("NumDiasBaixaDev_C029", "0");
$remessaBB->addField("CodMoeda_C065", "0");
$remessaBB->addField("NumContratoOpCred_C030", "0");
$remessaBB->addField("NumContratoOpCred_C030", "0");
$remessaBB->addField("FEBRABAN1_G004", "0");
$remessaBB->post();
//
$remessaBB->Append();
$remessaBB->addField("CodBancoComp_G001", "0");
$remessaBB->addField("LoteServico_G002", "0");
$remessaBB->addField("TipoRegistro_G003", "0");
$remessaBB->addField("FEBRABAN1_G004", "0");
$remessaBB->addField("QtdeRegistLote_G057", "0");
$remessaBB->addField("FEBRABAN2_G004", "0");
$remessaBB->post();
//
$remessaBB->Append($SeguimentoP);
$remessaBB->addField("CodBancoComp_G001", "0");
$remessaBB->addField("LoteServico_G002", "0");
$remessaBB->addField("TipoRegistro_G003", "0");
$remessaBB->addField("FEBRABAN1_G004", "0");
$remessaBB->addField("QtdeLoteArquivo_G049", "0");
$remessaBB->addField("QtdeRegistArquivo_G056", "0");
$remessaBB->addField("FEBRABAN2_G004", "0");
$remessaBB->post();

$remessaBB->saveToFile("");




//09 Real 
//02 Dolar Comercial(Venda)
//03 Dolar Turismo(Venda)


