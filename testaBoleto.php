<?php
include_once 'class/fileGenerate.class.php';
include_once 'class/castType.class.php';
include_once 'class/dataSet.class.php';
include_once 'class/dataSource.class.php';
include_once 'class/dadosComuns.php';

$remessaBB = new dataSource();

//HeaderDoArquivo
$remessaBB->Append($headerArquivo);
$remessaBB->addField("CodBancoComp_G001", "001");        /*03 Banco do Brasil 001 */
$remessaBB->addField("LoteServico_G002", "0000");        /*04 ??????????????????????????????*/
$remessaBB->addField("TipoRegistro_G003", "1");          /*01 */
$remessaBB->addField("FEBRABAN1_G004", " ");             /*09 Brancos */
$remessaBB->addField("tpPessoa_G005", "2");              /*01 1-CPF 2-CNPJ */
$remessaBB->addField("tpPessoaNum_G006", $_CNPJCedente); /*14 */
$remessaBB->addField("ConvBanco_G007", " ");             /*20 Brancos */
$remessaBB->addField("NumAgencia_G008",$_AgenciaNumero); /*05 */
$remessaBB->addField("DVAgencia_G009", $_AgenciaDV);     /*01*/
$remessaBB->addField("NumContaC_G010", $_Conta);         /*12 */
$remessaBB->addField("DVConta_G011", $_ContaDV);         /*01*/        
$remessaBB->addField("DVAgConta_G012", " ");             /*01 Brancos Não tratado*/
$remessaBB->addField("NomeEmpresa_G013",$_RazaoSocCedente); /*30 */
$remessaBB->addField("NomeBanco_G014", $_NomeBanco);     /*30 */
$remessaBB->addField("FEBRABAN2_G004", " ");             /*10 Brancos*/
$remessaBB->addField("CodRemRet_G015", $_FormaRemRet);   /*01 */
$remessaBB->addField("DataGeracao_G016", date('dmY'));   /*08 DDMMAAAA */
$remessaBB->addField("HoraGeracao_G017", "000000");      /*06 Zeros Informar zeros ou hora no formato HHMMSS*/ 
$remessaBB->addField("NumSeqArquivo_G018", "000000");    /*06 ???? Numero sequencial de controle */
$remessaBB->addField("LayoutArquivo_G019","0");          /*03 Zeros */      
$remessaBB->addField("DensGravArquivo_G020", " ");       /*05 Brancos */
$remessaBB->addField("ReservBB_G021", " ");              /*20 Brancos */
$remessaBB->addField("ReservEmpresa_G022"," ");          /*20 Não tratado*/
$remessaBB->addField("FEBRABAN3_G004", " ");             /*29 Brancos, porem se o layout for 030 pode ser informado CSP nas posições 223 a 225 */
$remessaBB->post(); //Fim do header do arquivo


//HeaderDoLote
$remessaBB->Append($headerLote);
$remessaBB->addField("CodBancoComp_G001", "001");           /*03 Banco do Brasil 001 */
$remessaBB->addField("LoteServico_G002", "0");              /*04 ??????????????????????????????*/
$remessaBB->addField("TipoRegistro_G003", "1");             /*01 */
$remessaBB->addField("TipoOperacao_G028", "R");             /*01 R–Remessa, T–Retorno.*/
$remessaBB->addField("TipoServico_G025", "01");             /*02 */
$remessaBB->addField("FEBRABAN1_G004", "3");                /*02 Brancos*/
$remessaBB->addField("LayoutArquivo_G030", "0");            /*03 Zeros Campo nao criticado*/
$remessaBB->addField("FEBRABAN2_G004", "3");                /*01 Brancos*/
$remessaBB->addField("tpPessoa_G005", "2");                 /*01 1-CPF 2-CNPJ */
$remessaBB->addField("tpPessoaNum_G006", "$_CNPJCedente");  /*15 */
$remessaBB->addField("ConvBanco_G007", "3");                /*20 */
$remessaBB->addField("NumAgencia_G008", $_AgenciaNumero);   /*05 */
$remessaBB->addField("DVAgencia_G009", $_AgenciaDV);        /*01 */
$remessaBB->addField("NumContaC_G010", $_Conta);            /*12 */
$remessaBB->addField("DVConta_G011", $_ContaDV);            /*01 */
$remessaBB->addField("DVAgConta_G012", " ");                /*01 */
$remessaBB->addField("NomeEmpresa_G013", $_RazaoSocCedente);/*30 */
$remessaBB->addField("Mensagem1_C073", " ");                /*40 */
$remessaBB->addField("Mensagem2_C073", " ");                /*40 */
$remessaBB->addField("NumRemRet_G079", "3");                /*08 Numero da remessa pelo sistema*/
$remessaBB->addField("DataGravRemRet_G068", date('dmY'));   /*08 */
$remessaBB->addField("DataCredito_C003", " ");              /*08 Brancos. Nao tratado pelo BB*/
$remessaBB->addField("FEBRABAN3_G004", " ");                /*33 */
$remessaBB->post();//Fim do header do lote

//SeguimentoP
$IdSequencia = "0000000001";
$IdTitulo = $_NumeroConvenio.$IdSequencia; /*7Digitos numero do convenio+ 10 Digitos Num Sequencial de controle */
$NumeroDoc= "NumeroIgualBloqueto";
$remessaBB->Append($SeguimentoP);
$remessaBB->addField("CodBancoComp_G001", "001");           /*03 */
$remessaBB->addField("LoteServico_G002", "0");              /*04 */
$remessaBB->addField("TipoRegistro_G003", "3");             /*01 Default 3*/
$remessaBB->addField("NumSeqRegLote_G038", "0");            /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
$remessaBB->addField("CodSegRegDetalhe_G039", "P");         /*01 */
$remessaBB->addField("FEBRABAN1_G004", " ");                /*01 */
$remessaBB->addField("CodMovRemessa_C004", "0");            /*02 01 – Entrada de títulos,02 – Pedido de baixa.... Manual Pag8 */
$remessaBB->addField("NumAgencia_G008",$_AgenciaNumero);    /*05 */
$remessaBB->addField("DVAgencia_G009",$_AgenciaDV);         /*01 */
$remessaBB->addField("NumContaC_G010",$_Conta);             /*12 */
$remessaBB->addField("DVConta_G011", $_ContaDV);            /*01 */
$remessaBB->addField("DVAgConta_G012", "0");                /*01 */
$remessaBB->addField("IdTituloBanco_G069",$IdTitulo);       /*20 Duvias na pagina 8*/
$remessaBB->addField("CodCarteira_C006", 7);                /*01 7-para carteira 17 modalidade Simples.*/
$remessaBB->addField("FormCadTitBanco_C007", "0");          /*01 1–(Cobrança registrada) 2-(Cobrança sem registro*/
$remessaBB->addField("TipoDoc_C008", " ");                  /*01 Branco Campo nao tratado*/
$remessaBB->addField("IdEmiBloqueto_C009", " ");            /*01 Branco*/
$remessaBB->addField("IdDistribuicao_C010", "0");           /*01 Brancos ou para carteira 17 informar  2(Cliente distribui) */
$remessaBB->addField("NumDocCobranca_C011", $NumeroDoc);    /*15 Para Carteira 17 Igual ao campo Número do Documento do bloqueto impresso*/
$remessaBB->addField("DataVencTit_C012", "11111111");       /*15 ,Para vencimento “A vista” preencher com '11111111' */
$remessaBB->addField("VlrNominalTit_G070", "0");            /*13,2 Valor nominao do titulo  */
$remessaBB->addField("AgEncCobranca_C014", "0");            /*05 Zeros, A agência encarregada da Cobrança é definida de acordo com o CEP do sacado. */
$remessaBB->addField("DVAgencia_G009", " ");                /*01 Branco*/                
//@todo Juros 
$remessaBB->addField("EspecieTit_C015", "99");              /*02 ??????????????????????????????? - Espécie do Título  */ 
$remessaBB->addField("IdTitulo_C016", "A");                 /*01 A ????????????? Identificação de titulo Aceito/Nao Aceito  */ 
$remessaBB->addField("DataEmitTit_G071", date('dmY'));      /*08 */              
$remessaBB->addField("CodJurosMora_C018", "3");             /*01 Confirmar??? (3)-isento, não é tratado automaticamente pelo Banco.*/
$remessaBB->addField("DataJurosMora_C019", date('dmY'));    /*08 verificar pagina10 */
$remessaBB->addField("JurosMoraDiaTx_C020", "0");           /*13,2 */
$remessaBB->addField("CodDesconto1_C021", "0");             /*01 (0)-Nao ha desconto */
$remessaBB->addField("DataDesconto1_C022", "0");            /*08 Zeros, quando não houver desconto a ser concedido.*/
$remessaBB->addField("PercentDesconto1_C023", "0");         /*13,2 Zeros, quando não houver desconto a ser concedido.*/
$remessaBB->addField("IOFRecolhido_C023", "0");             /*13,2 Zeros, quando não houver desconto a ser concedido. */
$remessaBB->addField("ValorAbatimento_G45", "0");           /*13,2 Deduzido do valor original do titulo*/
$remessaBB->addField("IdTituloEmpresa_G72", "0");           /*25 ?*/
$remessaBB->addField("CodProtesto_C026", "3");              /*01 (3)Nao protestar */
$remessaBB->addField("NumDiasProtesto_C027", "0");          /*02 se CodProtesto_C026=3 entao informar zero*/
$remessaBB->addField("CodBaixa_C028", "0");                 /*01 Zeros o sistema considera a carteira junto ao banco */
$remessaBB->addField("NumDiasBaixaDev_C029", "0");          /*03 Zeros o sistema considera a carteira junto ao banco */
$remessaBB->addField("CodMoeda_C065", "9");                 /*02 09 Real, 02 Dolar Comercial(Venda),03 Dolar Turismo(Venda) */
$remessaBB->addField("NumContratoOpCred_C030", "0");        /*10 informar zeros ou numero do contrato de cobrança */
$remessaBB->addField("FEBRABAN1_G004", " ");
$remessaBB->post();//Fim seguimento P

/*
//Seguimento Q
$remessaBB->Append($TrailerLote);
$remessaBB->addField("CodBancoComp_G001","001");
$remessaBB->addField("LoteServico_G002","0000");
$remessaBB->addField("TipoRegistro_G003","3");
$remessaBB->addField("NumSeqRegLote_G038","");
$remessaBB->addField("CodSegRegDetalhe_G039","P");
$remessaBB->addField("FEBRABAN1_G004","");
$remessaBB->addField("CodMovRemessa_C004","P");
$remessaBB->addField("tpPessoa_G005","2");
$remessaBB->addField("tpPessoaNum_G006","");
$remessaBB->addField("Nome_G013","");
$remessaBB->addField("Endereco_G032","");
$remessaBB->addField("Bairro_G032","");
$remessaBB->addField("CEP_G032","");
$remessaBB->addField("SufixoCEP_G034","");
$remessaBB->addField("Cidade_G033","");
$remessaBB->addField("UF_G036","");
$remessaBB->addField("TipoInsc_G005","0");
$remessaBB->addField("NumInscricao_G006","");
$remessaBB->addField("NomeSacadorAvalista_G013","");
$remessaBB->addField("CodBcoCompesacao_C031","0");
$remessaBB->addField("NossoNumBancoCorresp_C032","");
$remessaBB->addField("FEBRABAN2_G004","");
$remessaBB->post();//Fim seguimento Q

//Trailer do lote
$remessaBB->Append($TrailerLote);
$remessaBB->addField("CodBancoComp_G001", "0");
$remessaBB->addField("LoteServico_G002", "0");
$remessaBB->addField("TipoRegistro_G003", "0");
$remessaBB->addField("FEBRABAN1_G004", "0");
$remessaBB->addField("QtdeRegistLote_G057", "0");
$remessaBB->addField("FEBRABAN2_G004", "0");
$remessaBB->post();//Fim trailer do lote

//Trailer do arquivo 
$remessaBB->Append($TrailerArquivo);
$remessaBB->addField("CodBancoComp_G001", "0");
$remessaBB->addField("LoteServico_G002", "0");
$remessaBB->addField("TipoRegistro_G003", "0");
$remessaBB->addField("FEBRABAN1_G004", "0");
$remessaBB->addField("QtdeLoteArquivo_G049", "0");
$remessaBB->addField("QtdeRegistArquivo_G056", "0");
$remessaBB->addField("FEBRABAN2_G004", "0");
$remessaBB->post();//Fim trailer do arquivo 
*/
//Gerando o arquivo na pasta remessa/
$remessaBB->saveToFile("");







