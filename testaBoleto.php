<?php
include_once 'class/fileGenerate.class.php';
include_once 'class/castType.class.php';
include_once 'class/dataSet.class.php';
include_once 'class/dataSource.class.php';
include_once 'class/dadosComuns.php';
include_once 'class/DBConnect.php';

$BoletoHeaders      = $con->prepare("select * from boleto_remessa");
$BoletoHeaders->execute();
$BOLETO_REMESSA     = $BoletoHeaders->fetchAll(PDO::FETCH_OBJ);

//Dados do boleto
$LoteServico_G002   = $BOLETO_REMESSA[0]->LoteServico_G002;
$NumSeqArquivo_G018 = $BOLETO_REMESSA[0]->NumSeqArquivo_G018;

$DataGeracao        = date_create($BOLETO_REMESSA[0]->DataGeracao_G016);
$DataGeracao_G016   = date_format($DataGeracao,"dmY");
$DataGravRemRet_G068= date_format($DataGeracao,"dmY");

$NumRemRet_G079     = $BOLETO_REMESSA[0]->NumRemRet_G079;

$remessaBB = new dataSource();
//HeaderDoArquivo
$remessaBB->Append($headerArquivo);
$remessaBB->addField("CodBancoComp_G001", $CodBancoComp_G001);  /*03 Banco do Brasil 001 */
$remessaBB->addField("LoteServico_G002", $LoteServico_G002);    /*04 */
$remessaBB->addField("TipoRegistro_G003", 0);                   /*01 0-Header do arquivo*/
$remessaBB->addField("FEBRABAN1_G004", "");                     /*09 Brancos */
$remessaBB->addField("tpPessoa_G005", $tpPessoa_G005);          /*01 1-CPF 2-CNPJ */
$remessaBB->addField("tpPessoaNum_G006", $tpPessoaNum_G006);    /*14 */
$remessaBB->addField("CodConvBanco_G007",$ConvBanco_G007);      /*20 Brancos */
$remessaBB->addField("NumAgencia_G008",$NumAgencia_G008);       /*05 */
$remessaBB->addField("DVAgencia_G009", $DVAgencia_G009);        /*01 */
$remessaBB->addField("NumContaC_G010", $NumContaC_G010);        /*12 */
$remessaBB->addField("DVConta_G011", $DVConta_G011);            /*01 */        
$remessaBB->addField("DVAgConta_G012", "");                     /*01 Brancos Não tratado*/
$remessaBB->addField("NomeEmpresa_G013",$NomeEmpresa_G013);     /*30 */
$remessaBB->addField("NomeBanco_G014",$NomeBanco_G014);         /*30 */
$remessaBB->addField("FEBRABAN2_G004", "");                     /*10 Brancos*/
$remessaBB->addField("CodRemRet_G015", "1");        /*01 1-Remessa(Cliente->Banco),2-Retorno(Banco->Cliente)*/
$remessaBB->addField("DataGeracao_G016", $DataGeracao_G016);    /*08 DDMMAAAA */
$remessaBB->addField("HoraGeracao_G017", "000000");             /*06 Zeros Informar zeros ou hora no formato HHMMSS*/ 
$remessaBB->addField("NumSeqArquivo_G018", $NumSeqArquivo_G018);/*06 ???? Numero sequencial de controle */
$remessaBB->addField("LayoutArquivo_G019","0");                 /*03 Zeros */      
$remessaBB->addField("DensGravArquivo_G020", "");               /*05 Brancos */
$remessaBB->addField("ReservBB_G021", "");                      /*20 Brancos */
$remessaBB->addField("ReservEmpresa_G022","");                  /*20 Não tratado*/
$remessaBB->addField("FEBRABAN3_G004", "");                     /*29 Brancos, porem se o layout for 030 pode ser informado CSP nas posições 223 a 225 */
$remessaBB->post(); //Fim do header do arquivo

//HeaderDoLote
$remessaBB->Append($headerLote);
$remessaBB->addField("CodBancoComp_G001", $CodBancoComp_G001);   /*03 Banco do Brasil 001 */
$remessaBB->addField("LoteServico_G002", $LoteServico_G002);     /*04 ??????????????????????????????*/
$remessaBB->addField("TipoRegistro_G003", 1);                    /*01 1-Header do lote*/
$remessaBB->addField("TipoOperacao_G028", "R");                  /*01 R–Remessa, T–Retorno.*/
$remessaBB->addField("TipoServico_G025", "01");                  /*02 Default(01)*/
$remessaBB->addField("FEBRABAN1_G004", "");                      /*02 Brancos*/
$remessaBB->addField("LayoutArquivo_G030", "0");                 /*03 Zeros Campo nao criticado*/
$remessaBB->addField("FEBRABAN2_G004", "");                      /*01 Brancos*/
$remessaBB->addField("tpPessoa_G005", $tpPessoa_G005);           /*01 1-CPF 2-CNPJ */
$remessaBB->addField("tpPessoaNum_G006", $tpPessoaNum_G006);     /*15 */
$remessaBB->addField("CodConvBanco_G007", $ConvBanco_G007);      /*20 NumeroConvenio+CobrancaCedente+NumeroCarteira+CmpIdRemTestes*/
$remessaBB->addField("NumAgencia_G008", $NumAgencia_G008);       /*05 */
$remessaBB->addField("DVAgencia_G009", $DVAgencia_G009);         /*01 */
$remessaBB->addField("NumContaC_G010", $NumContaC_G010);         /*12 */
$remessaBB->addField("DVConta_G011", $DVConta_G011);             /*01 */
$remessaBB->addField("DVAgConta_G012", "");                      /*01 */
$remessaBB->addField("NomeEmpresa_G013", $NomeEmpresa_G013);     /*30 */
$remessaBB->addField("Mensagem1_C073", "");                      /*40 */
$remessaBB->addField("Mensagem2_C073", "");                      /*40 */
$remessaBB->addField("NumRemRet_G079", $NumRemRet_G079);         /*08 Numero da remessa pelo sistema*/
$remessaBB->addField("DataGravRemRet_G068",$DataGravRemRet_G068);/*08 */
$remessaBB->addField("DataCredito_C003", "");                    /*08 Brancos. Nao tratado pelo BB*/
$remessaBB->addField("FEBRABAN3_G004", "");                      /*33 */
$remessaBB->post();//Fim do header do lote

function df($d,$format){ 
    $dt=date_create($d);
    return date_format($dt,$format);
}
//--------------------------------------------------------------------SeguimentoP--------------------------------------------------------------------
$ListaBoletos = $con->prepare("select * from boleto limit 10");
$ListaBoletos->execute();
$Linha = $ListaBoletos->fetchAll(PDO::FETCH_OBJ);

$NumSeqRegLote_G038=0;
foreach($Linha as $col){
    $NumSeqRegLote_G038++;
    $I_BOLETO_ID    = $col->I_BOLETO_ID;
    $I_NOSSONUMERO  = $col->I_NOSSONUMERO;
    $I_REQUISICAO   = str_pad($col->I_REQUISICAO,10,'0',STR_PAD_LEFT);
    $I_LOTE         = $col->I_LOTE;
    $I_VIA          = $col->I_VIA;
    $F_VALOR        = str_replace(".","",$col->F_VALOR);
    $F_MULTA        = $col->F_MULTA;
    $F_MORA         = $col->F_MORA;
    $D_EMISSAO      = df($col->D_EMISSAO,"dmY");
    $D_VENCIMENTO   = df($col->D_VENCIMENTO,"dmY");
    $V_STATUS       = $col->V_STATUS;
    
    $NumeroConvenio = "2970204";
    $IdTituloBanco_G069 = $NumeroConvenio.$I_REQUISICAO;       /*07Digitos numero do convenio + 10 Digitos Num Sequencial de controle */
    $remessaBB->Append($SeguimentoP); 
    $remessaBB->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03 */
    $remessaBB->addField("LoteServico_G002",$LoteServico_G002);     /*04 */
    $remessaBB->addField("TipoRegistro_G003",3);                    /*01 3-Detalhe */
    $remessaBB->addField("NumSeqRegLote_G038",$NumSeqRegLote_G038); /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
    $remessaBB->addField("CodSegRegDetalhe_G039","P");              /*01 */
    $remessaBB->addField("FEBRABAN1_G004", "");                     /*01 */
    $remessaBB->addField("CodMovRemessa_C004", "01");               /*02 01 – Entrada de títulos,02 – Pedido de baixa.... Manual Pag8 */
    $remessaBB->addField("NumAgencia_G008",$NumAgencia_G008);       /*05 */
    $remessaBB->addField("DVAgencia_G009",$DVAgencia_G009);         /*01 */
    $remessaBB->addField("NumContaC_G010",$NumContaC_G010);         /*12 */
    $remessaBB->addField("DVConta_G011", $DVConta_G011);            /*01 */
    $remessaBB->addField("DVAgConta_G012", "0");                    /*01 Brancos*/
    $remessaBB->addField("IdTituloBanco_G069",$IdTituloBanco_G069); /*20 NumeroConvenio+I_REQUISIÇAO+Brancos*/
    $remessaBB->addField("CodCarteira_C006", 7);                    /*01 7-para carteira 17 modalidade Simples.*/
    $remessaBB->addField("FormCadTitBanco_C007", "1");              /*01 1–(Cobrança registrada) 2-(Cobrança sem registro*/
    $remessaBB->addField("TipoDoc_C008", "");                       /*01 Branco Campo nao tratado*/
    $remessaBB->addField("IdEmiBloqueto_C009", "");                 /*01 Branco*/
    $remessaBB->addField("IdDistribuicao_C010",2);                  /*01 Brancos ou para carteira 17 informar  2(Cliente distribui) */
    $remessaBB->addField("NumDocCobranca_C011",$I_NOSSONUMERO);     /*15 Para Carteira 17 Igual ao campo Número do Documento do bloqueto impresso*/
    $remessaBB->addField("DataVencTit_C012",$D_VENCIMENTO);         /*15 ,Para vencimento “A vista” preencher com '11111111' */
    $remessaBB->addField("VlrNominalTit_G070",$F_VALOR);            /*13,2 Valor nominal do titulo  */
    $remessaBB->addField("AgEncCobranca_C014", "0");                /*05 Zeros, A agência encarregada da Cobrança é definida de acordo com o CEP do sacado. */
    $remessaBB->addField("DVAgencia_G009", "");                     /*01 Branco*/                
    $remessaBB->addField("EspecieTit_C015", "99");                  /*02 Espécie do Título (99)Outros */ 
    $remessaBB->addField("IdTitulo_C016", "A");                     /*01 (reconhecimento da dívida pelo Sacado).(A-Aceite)(N-Nao Aceite) */ 
    $remessaBB->addField("DataEmitTit_G071", $D_EMISSAO);           /*08 */              
    //@todo Juros 
    $remessaBB->addField("CodJurosMora_C018", "3");                 /*01 (3)-isento, não é tratado automaticamente pelo Banco.*/
    $remessaBB->addField("DataJurosMora_C019", "00000000");         /*08 verificar pagina10 */
    $remessaBB->addField("JurosMoraDiaTx_C020", "0");               /*13,2 */
    $remessaBB->addField("CodDesconto1_C021", "0");                 /*01 (0)-Nao ha desconto */
    $remessaBB->addField("DataDesconto1_C022", "0");                /*08   Zeros, quando não houver desconto a ser concedido.*/
    $remessaBB->addField("PercentDesconto1_C023", "0");             /*13,2 Zeros, quando não houver desconto a ser concedido.*/
    $remessaBB->addField("IOFRecolhido_C024", "0");                 /*13,2 Zeros, quando não houver desconto a ser concedido. */    
    $remessaBB->addField("ValorAbatimento_G045", "0");              /*13,2 Deduzido do valor original do titulo*/
    $remessaBB->addField("IdTituloEmpresa_G072",$I_NOSSONUMERO);    /*25 ?*/
    $remessaBB->addField("CodProtesto_C026", "3");                  /*01 (3)Nao protestar */
    $remessaBB->addField("NumDiasProtesto_C027", "0");              /*02 se CodProtesto_C026=3 entao informar zero*/
    $remessaBB->addField("CodBaixa_C028", "0");                     /*01 Zeros o sistema considera a carteira junto ao banco */
    $remessaBB->addField("NumDiasBaixaDev_C029", "0");              /*03 Zeros o sistema considera a carteira junto ao banco */
    $remessaBB->addField("CodMoeda_G065", "9");                     /*02 09 Real, 02 Dolar Comercial(Venda),03 Dolar Turismo(Venda) */
    $remessaBB->addField("NumContratoOpCred_C030", "0");            /*10 informar zeros ou numero do contrato de cobrança */
    $remessaBB->addField("FEBRABAN2_G004", "");                     /*01 Brancos*/
    $remessaBB->post();//Fim seguimento P

    //Seguimento Q
    $remessaBB->Append($SeguimentoQ);
    $remessaBB->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03 */
    $remessaBB->addField("LoteServico_G002",$LoteServico_G002);     /*04 */
    $remessaBB->addField("TipoRegistro_G003",3);                    /*01 Default 3*/
    $remessaBB->addField("NumSeqRegLote_G038",$NumSeqRegLote_G038); /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
    $remessaBB->addField("CodSegRegDetalhe_G039","Q");              /*01 */
    $remessaBB->addField("FEBRABAN1_G004","");                      /*01 */
    $remessaBB->addField("CodMovRemessa_C004","01");                /*02  */
    $remessaBB->addField("tpPessoa_G005","2");                      /*01 */
    $remessaBB->addField("tpPessoaNum_G006","08300713000182");      /*15 */
    $remessaBB->addField("Nome_G013","SCC CHECK");                  /*40 */
    $remessaBB->addField("Endereco_G032","R. Nassib Haddad");       /*40 */
    $remessaBB->addField("Bairro_G032","Zona 5");                   /*15 */
    $remessaBB->addField("CEP_G032","87015");                       /*05 */
    $remessaBB->addField("SufixoCEP_G034","270");                   /*03 */
    $remessaBB->addField("Cidade_G033","Maringa");                  /*15 */
    $remessaBB->addField("UF_G036","PR");                           /*02 */
    $remessaBB->addField("TipoInsc_G005","");                       /*01 Brancos(Sacador/Avalista)*/
    $remessaBB->addField("NumInscricao_G006","");                   /*15 Brancos(Sacador/Avalista)*/
    $remessaBB->addField("NomeSacadorAvalista_G013","");            /*40 Brancos(Sacador/Avalista)*/
    $remessaBB->addField("CodBcoCompesacao_C031","0");              /*03 Zeros (Campo nao tratado)*/
    $remessaBB->addField("NossoNumBancoCorresp_C032","");           /*20 Brancos (Campo nao tratado)*/
    $remessaBB->addField("FEBRABAN2_G004","");                      /*08 Brancos */
    $remessaBB->post();//Fim seguimento Q
}

//Trailer do lote
$remessaBB->Append($TrailerLote);
$remessaBB->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03  Codigo do banco cedente */
$remessaBB->addField("LoteServico_G002",$LoteServico_G002);     /*04  */
$remessaBB->addField("TipoRegistro_G003",5);                    /*01  '5'= Trailer de Lote*/
$remessaBB->addField("FEBRABAN1_G004","");                     /*09  Brancos*/
$remessaBB->addField("QtdeRegistLote_G057","");                 /*06  Soma quantidade de lotes do arquivo conforma o tipo 1,3,4,5*/
$remessaBB->addField("FEBRABAN2_G004","");                     /*217 */
$remessaBB->post();//Fim trailer do lote

//Trailer do arquivo 
$remessaBB->Append($TrailerArquivo);
$remessaBB->addField("CodBancoComp_G001",$CodBancoComp_G001);  /*03  Codigo do banco cedente */
$remessaBB->addField("LoteServico_G002",$LoteServico_G002);    /*04  */
$remessaBB->addField("TipoRegistro_G003",9);                   /*01  '9' = Trailer de Arquivo*/
$remessaBB->addField("FEBRABAN1_G004","");                    /*09  */
$remessaBB->addField("QtdeLoteArquivo_G049",1);                /*06  Auto Somatória dos registros de tipo 1-Header do lote */
$remessaBB->addField("QtdeRegistArquivo_G056","");             /*06  Auto Somatória dos registros de tipo 0-HeaderArq,1-HeaderLote,3-Detalhe,5-TrailerLote e 9-TrailerArq */
$remessaBB->addField("QtdeContasConcil_G037","0");             /*06  */
$remessaBB->addField("FEBRABAN2_G004","");                    /*205 */
$remessaBB->post();//Fim trailer do arquivo 


$AtualizaQtdes=$con->prepare("UPDATE boleto_remessa SET TLQtdeRegistLote_G057=".$remessaBB->getQtdeRegistLote_G057().", TAQtdeRegistArquivo_G056=".$remessaBB->getQtdeRegistLote_G056()." WHERE (I_BOLETO_REMESSA_ID=".$BOLETO_REMESSA[0]->LoteServico_G002.") LIMIT 1");
$AtualizaQtdes->execute();

//Gerando o arquivo na pasta remessa/
$file = "remessa/".date("dmYhis").".tx3";

foreach (glob("remessa/*.tx3") as $filename) {
   //echo "$filename size " . filesize($filename) . "\n";
   unlink($filename);
}

$remessaBB->saveToFile("");
$remessaBB->saveToFile($file);