<?php

$remessaCEF = new dataSet();
//HeaderDoArquivo----------------------------------------------------------------------------------------------------------------------------------------
$remessaCEF->Append("headerArquivo");
$remessaCEF->addField("CodBancoComp_G001", $CodBancoComp_G001);  /*03 CEF 104*/
$remessaCEF->addField("LoteServico_G002", "0000");               /*04 Se registro for Header do Arquivo='0000' */
$remessaCEF->addField("TipoRegistro_G003",0);                    /*01 0-Header do arquivo*/
$remessaCEF->addField("FEBRABAN1_G004"," ");                     /*   */
$remessaCEF->addField("tpPessoa_G005", 2);                       /*01 1-CPF 2-CNPJ */
$remessaCEF->addField("tpPessoaNum_G006", $tpPessoaNum_G006);    /*14 */
$remessaCEF->addField("Exclusivo_CAIXA1","");                    /*20 USO CAIXA */
$remessaCEF->addField("NumAgencia_G008",$NumAgencia_G008);       /*05 */
$remessaCEF->addField("DVAgencia_G009", $DVAgencia_G009);        /*01 */
$remessaCEF->addField("CodConvBanco_G007",$_NumeroConvenio);     /*06 */
$remessaCEF->addField("Exclusivo_CAIXA2","");                    /*08 USO CAIXA */
$remessaCEF->addField("NomeEmpresa_G013",$NomeEmpresa_G013);     /*30 */
$remessaCEF->addField("NomeBanco_G014",$NomeBanco_G014);         /*30 */
$remessaCEF->addField("FEBRABAN2_G004", "");                     /*10 */
$remessaCEF->addField("CodRemRet_G015", "1");                    /*01 1-Remessa(Cliente->Banco),2-Retorno(Banco->Cliente)*/
$remessaCEF->addField("DataGeracao_G016", $DataGeracao_G016);    /*08 DDMMAAAA */
$remessaCEF->addField("HoraGeracao_G017", "000000");             /*06 Zeros Informar zeros ou hora no formato HHMMSS*/ 
$remessaCEF->addField("NumSeqArquivo_G018", $NumSeqArquivo_G018);/*06 Numero sequencial de controle */
$remessaCEF->addField("LayoutArquivo_G019","050");               /*03 Zeros  -  Conforme validador CAIXA*/      
$remessaCEF->addField("DensGravArquivo_G020", "00000");          /*05 Padrao CAIXA prencher com zeros */
$remessaCEF->addField("Exclusivo_CAIXA3"," ");                   /*20 G021 Filler Espacos*/
$remessaCEF->addField("ReservEmpresa_G022","REMESSA TESTE");     /*20 G022 Em producao informar em branco              */
$remessaCEF->addField("VersaoApp_C077"," ");                     /*04 C077 Uso Interno   */
$remessaCEF->addField("FEBRABAN3_G004"," ");                     /*25 G004 Filler        */
$remessaCEF->post();
//------------------------------------------------------------------------------HeaderDoLote----------------------------------------------------------
$remessaCEF->Append("headerLote");
$remessaCEF->addField("CodBancoComp_G001", $CodBancoComp_G001);   /*03 Banco do Brasil 001 */
$remessaCEF->addField("LoteServico_G002", $LoteServico_G002);     /*04 */
$remessaCEF->addField("TipoRegistro_G003", 1);                    /*01 1-Header do lote*/
$remessaCEF->addField("TipoOperacao_G028", "R");                  /*01 R–Remessa, T–Retorno.*/
$remessaCEF->addField("TipoServico_G025", "01");                  /*02 01-Cobranca Registrada,03-Desconto De titulos,04-Caução de titulos*/
$remessaCEF->addField("FEBRABAN1_G004", "00");                    /*02 */
$remessaCEF->addField("LayoutArquivo_G030", "030");               /*03 */
$remessaCEF->addField("FEBRABAN2_G004", " ");                     /*01 Branco */
$remessaCEF->addField("tpPessoa_G005", $tpPessoa_G005);           /*01 1-CPF 2-CNPJ */
$remessaCEF->addField("tpPessoaNum_G006", $tpPessoaNum_G006);     /*15 */
$remessaCEF->addField("CodConvBanco_G007",$_NumeroConvenio);      /*06 */
$remessaCEF->addField("Exclusivo_CAIXA1","0");                    /*14 */
$remessaCEF->addField("NumAgencia_G008", $NumAgencia_G008);       /*05 */
$remessaCEF->addField("DVAgencia_G009", $DVAgencia_G009);         /*01 */
$remessaCEF->addField("CodConvBanco_G007",$_NumeroConvenio);      /*06 */
$remessaCEF->addField("CodModBoletos_C078","0");                  /*07 Se nao tem o codigo preencher com zeros */
$remessaCEF->addField("Exclusivo_CAIXA2","0");                    /*01 */
$remessaCEF->addField("NomeEmpresa_G013", $NomeEmpresa_G013);     /*30 */
$remessaCEF->addField("Mensagem1_C073", "");                      /*40 C073*/
$remessaCEF->addField("Mensagem2_C073", "");                      /*40 C073*/
$remessaCEF->addField("NumRemRet_G079", $NumRemRet_G079);         /*08 Numero da remessa pelo sistema*/
$remessaCEF->addField("DataGravRemRet_G068",$DataGravRemRet_G068);/*08 */
$remessaCEF->addField("DataCredito_C003", "");                    /*08 Brancos. Nao tratado pelo BB*/
$remessaCEF->addField("FEBRABAN3_G004", "");                      /*33 */
$remessaCEF->post();//Fim do header do lote


//--------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------Detalhe-------------------------------------------------------------------
function df($d,$format){ 
    $dt=date_create($d);
    return date_format($dt,$format);
}

$Linha = $SReg;
$NumSeqRegLote_G038=0;
foreach($Linha as $col){    
    $I_BOLETO_ID    = $col->I_BOLETOSCC_ID;
    $I_NOSSONUMERO  = $col->I_NOSSONUMERO;
    $I_BOLETOSCC_ID = str_pad($col->I_BOLETOSCC_ID,10,'0',STR_PAD_LEFT);
    $I_VIA          = $col->I_VIA;
    $F_VALOR        = str_replace(".","",$col->F_VALORBOLETO);
    $F_MULTA        = $col->F_MULTA;
    //$F_MORA         = $col->F_MORA;
    $D_EMISSAO      = df($col->D_EMISSAOBOLETO,"dmY");
    $D_VENCIMENTO   = df($col->D_VENCIMENTOBOLETO,"dmY");
    
    //--------------------------------------------------------------------------SeguimentoP---------------------------------------------------------------
    $NumSeqRegLote_G038++;    
    $remessaCEF->Append("SeguimentoP"); 
    //Controle
    $remessaCEF->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03 */
    $remessaCEF->addField("LoteServico_G002",$LoteServico_G002);     /*04 */
    $remessaCEF->addField("TipoRegistro_G003",3);                    /*01 3-Detalhe */
    //Serviço
    $remessaCEF->addField("NumSeqRegLote_G038",$NumSeqRegLote_G038); /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
    $remessaCEF->addField("CodSegRegDetalhe_G039","P");              /*01 */
    $remessaCEF->addField("FEBRABAN1_G004","");                      /*01 */
/**/$remessaCEF->addField("CodMovRemessa_C004", "01");               /*02 01–Entrada de títulos,02–Pedido de baixa*/
    //Cod. Id. Beneficiario
    $remessaCEF->addField("NumAgencia_G008",$NumAgencia_G008);       /*05 Validador da CAIXA espera zeros 00000*/
    $remessaCEF->addField("DVAgencia_G009",$DVAgencia_G009);         /*01 */
    $remessaCEF->addField("CodConvBanco_G007","0");                  /* G007 Cod.Conv.Banco Caixa*/    
    $remessaCEF->addField("Exclusivo_CAIXA1","0");                   /* Campo11.3 EXCLUSIVO CAIXA*/    
/**/$remessaCEF->addField("FEBRABAN2_G004","0");                     /* Campo12.3 Filler Caixa   */
    //NOSSO NUMERO CAMPO 13.3P 
    $remessaCEF->addField("IdTituloBanco_G069",$I_NOSSONUMERO);      /* */
    //Caracteristicas da cobrança
    $remessaCEF->addField("CodCarteira_C006",1);                     /*01 C006 (1=Cobrança Simples)*/
    $remessaCEF->addField("FormCadTitBanco_C007",1);                 /*01 C007 (1=Cobrança Registrada)*/
    $remessaCEF->addField("TipoDoc_C008",2);                         /*01 C008 (2=Escritural)*/
    $remessaCEF->addField("IdEmiBloqueto_C009", "");                 /*01 C009 (2=Cliente Emite)*/
    $remessaCEF->addField("IdDistribuicao_C010",0);                  /*01 C010 (0=Postagem pelo Beneficiário)*/
    $remessaCEF->addField("NumDocCobranca_C011",$I_BOLETOSCC_ID);      /**/    
    $remessaCEF->addField("Exclusivo_CAIXA2","");                    /* Campo19.3 Filler Caixa   */    
    $remessaCEF->addField("DataVencTit_C012",$D_VENCIMENTO);         /**/        
    $remessaCEF->addField("VlrNominalTit_G070",$F_VALOR);            /**/        
    
    $remessaCEF->addField("AgEncCobranca_C014","xxxxx");                /*05 Zeros, A agência encarregada da Cobrança é definida de acordo com o CEP do sacado. */
    $remessaCEF->addField("DVAgencia_G009", "0");                     /*01 Branco*/                
    $remessaCEF->addField("EspecieTit_C015", "99");                  /*02 Espécie do Título (99)Outros */ 
    $remessaCEF->addField("IdTitulo_C016", "N");                     /*01 (reconhecimento da dívida pelo Sacado).(A-Aceite)(N-Nao Aceite) */ 
    $remessaCEF->addField("DataEmitTit_G071", $D_EMISSAO);           /*08 */              
    //@todo Juros 
    $remessaCEF->addField("CodJurosMora_C018", "3");                 /*01 (3)-isento, não é tratado automaticamente pelo Banco.*/
    $remessaCEF->addField("DataJurosMora_C019", "00000000");         /*08 */
    $remessaCEF->addField("JurosMoraDiaTx_C020", "0");               /*13,2 */
    //Desconto
    $remessaCEF->addField("CodDesconto1_C021", "0");                 /*01 (0)-Nao ha desconto */
    $remessaCEF->addField("DataDesconto1_C022", "0");                /*08   Zeros, quando não houver desconto a ser concedido.*/
    $remessaCEF->addField("PercentDesconto1_C023", "0");             /*13,2 Zeros, quando não houver desconto a ser concedido.*/
    
    $remessaCEF->addField("IOFRecolhido_C024", "0");                 /*13,2 Zeros, quando não houver desconto a ser concedido. */    
    $remessaCEF->addField("ValorAbatimento_G045", "0");              /*13,2 Deduzido do valor original do titulo*/
    $remessaCEF->addField("IdTituloEmpresa_G072",$I_NOSSONUMERO);    /*25 */
    $remessaCEF->addField("CodProtesto_C026", "3");                  /*01 (3)Nao protestar */
    $remessaCEF->addField("NumDiasProtesto_C027", "0");              /*02 se CodProtesto_C026=3 entao informar zero*/
    $remessaCEF->addField("CodBaixa_C028", "0");                     /*01 Zeros o sistema considera a carteira junto ao banco */
    $remessaCEF->addField("NumDiasBaixaDev_C029", "0");              /*03 Zeros o sistema considera a carteira junto ao banco */
    $remessaCEF->addField("CodMoeda_G065", "09");                    /*02 09-Real, 02-DolarComercial(Venda),03-Dolar Turismo(Venda) */
    $remessaCEF->addField("Exclusivo_CAIXA3", 0);                    /*10*/   
    $remessaCEF->addField("FEBRABAN3_G004"," ");                     /*01 Brancos*/
    $remessaCEF->post();                                             
    
    //--------------------------------------------------------------------------SeguimentoQ---------------------------------------------------------------
    $NumSeqRegLote_G038++;
    $tpPessoa_G005=2;
    $tpPessoaNum_G006=preg_replace("/[^0-9]/", "", $col->V_CNPJ);
    $Nome_G013       =   $col->V_NOME;
    //Verifica se tem dados de PJ se nao PF
    if($col->V_CNPJ==null){
        $tpPessoa_G005=1;
        $tpPessoaNum_G006=preg_replace("/[^0-9]/", "", $col->V_CPF);
        $Nome_G013       =   $col->V_NOME;
    }
    $remessaCEF->Append("SeguimentoQ");
    $remessaCEF->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03 */
    $remessaCEF->addField("LoteServico_G002",$LoteServico_G002);     /*04 */
    $remessaCEF->addField("TipoRegistro_G003",3);                    /*01 Default3 */
    $remessaCEF->addField("NumSeqRegLote_G038",$NumSeqRegLote_G038); /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
    $remessaCEF->addField("CodSegRegDetalhe_G039","Q");              /*01 */
    $remessaCEF->addField("FEBRABAN1_G004","");                      /*01 */
    $remessaCEF->addField("CodMovRemessa_C004","01");                /*02 */
    $remessaCEF->addField("tpPessoa_G005",$tpPessoa_G005);           /*01 */
    $remessaCEF->addField("tpPessoaNum_G006",$tpPessoaNum_G006);     /*15 */
    $remessaCEF->addField("Nome_G013", $Nome_G013);                  /*40 */
    $remessaCEF->addField("Endereco_G032","Rua Nascimento Silva 107");                      /*40 */
    $remessaCEF->addField("Bairro_G032","Jardim do Eden");                        /*15 */
    $remessaCEF->addField("CEP_G032","12345");                       /*05 */ 
    $remessaCEF->addField("SufixoCEP_G034","678");                   /*03 */
    $remessaCEF->addField("Cidade_G033","Cidade");                   /*15 */
    $remessaCEF->addField("UF_G036","UF");                           /*02 */
    $remessaCEF->addField("TipoInsc_G005","");                       /*01 Brancos(Sacador/Avalista)*/
    $remessaCEF->addField("NumInscricao_G006","");                   /*15 Brancos(Sacador/Avalista)*/
    $remessaCEF->addField("NomeSacadoAvalista_C060","Sacado-Avalis");/*40 Brancos(Sacador/Avalista)*/
    $remessaCEF->addField("CodBcoCompesacao_C031"," ");               /*03 Zeros (Campo nao tratado)*/
    $remessaCEF->addField("NossoNumBancCorresp_C032"," ");           /*20 Brancos (Campo nao tratado)*/
    $remessaCEF->addField("FEBRABAN2_G004"," ");                     /*08 Brancos */
    $remessaCEF->post();
    
//    if(!$col->I_BOLETO_AVULSO_ID){
//        $col->I_BOLETO_AVULSO_ID=0;
//    }
//    if(!$col->I_BOLETO_ID){
//        $col->I_BOLETO_ID=0;
//    }
//
//    try {                                
//        $SQLReg = "insert into boleto_remessa_reg set "
//                . "I_BOLETO_REMESSA=".$NumRemRet_G079.","
//                . "I_BOLETO =".$col->I_BOLETO_ID.","
//                . "I_BOLETO_AVULSO=".$col->I_BOLETO_AVULSO_ID;    
//        $Reg = $con->prepare($SQLReg);
//        //echo $SQLReg."<br>";
//        //$Reg->execute();        
//    } catch (Exception $e) {
//        echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";                                 
//    }     
}
//--------------------------------------------------------------------------------------------------------------------------------------------------------
//Trailer do lote ----------------------------------------------------------------------------------------------------------------------------------------
$remessaCEF->Append("TrailerLote");
$remessaCEF->addField("CodBancoComp_G001",104);/*03  Codigo do banco cedente */
$remessaCEF->addField("LoteServico_G002",0001);  /*04  */
$remessaCEF->addField("TipoRegistro_G003",5);                 /*01  '5'= Trailer de Lote*/
$remessaCEF->addField("FEBRABAN1_G004"," ");                  /*09  Brancos*/
//Total de registros no lote
$remessaCEF->addField("QtdeRegistLote_G057","");              /*06  Soma quantidade de lotes do arquivo conforma o tipo 1,3,4,5*/
//Totalizacao cobranca simples
$remessaCEF->addField("QtdeTitCobranca1_C070","000001");      /*06  C070 Quantidade de titulos emitidos no lote*/
$remessaCEF->addField("ValorTotTitCart1_C071","000100");      /*17  C071 Valor total dos titulos */
//Totalizacao cobranca caucionada
$remessaCEF->addField("QtdeTitCobranca2_C070","0");           /*06  C070 Quantidade de titulos emitidos no lote*/
$remessaCEF->addField("ValorTotTitCart2_C071","0");           /*17  C071 Valor total dos titulos */
//Totalizacao cobranca descontada
$remessaCEF->addField("QtdeTitCobranca3_C070","0");           /*06  C070 Quantidade de titulos emitidos no lote*/
$remessaCEF->addField("ValorTotTitCart3_C071","0");           /*17  C071 Valor total dos titulos */
//CNAB
$remessaCEF->addField("FEBRABAN2_G004","");                  /*31  C071 Valor total dos titulos */
$remessaCEF->addField("FEBRABAN3_G004","");                  /*117  C071 Valor total dos titulos */
$remessaCEF->post();

//Trailer do arquivo--------------------------------------------------------------------------------------------------------------------------------------
$remessaCEF->Append("TrailerArquivo");
$remessaCEF->addField("CodBancoComp_G001",104);/*03  Codigo do banco cedente */
$remessaCEF->addField("LoteServico_G002",9999);               /*04  Se registro for Trailer do Arquivo='9999' */
$remessaCEF->addField("TipoRegistro_G003",9);                 /*01  '9' = Trailer de Arquivo*/
//$remessaCEF->addField("FEBRABAN1_G004","X",array('leng'=>'11','Dec'=>'9','type'=>'Alpha','valueReplace'=>'B','side'=>'L'));                   /*09  */
$remessaCEF->addField("FEBRABAN1_G004","");                   /*09  */
//Totais
$remessaCEF->addField("QtdeLoteArquivo_G049",1);              /*06  Auto Somatória dos registros de tipo 1-Header do lote */
$remessaCEF->addField("QtdeRegistArquivo_G056","");           /*06  Auto Somatória dos registros de tipo 0-HeaderArq,1-HeaderLote,3-Detalhe,5-TrailerLote e 9-TrailerArq */
$remessaCEF->addField("FEBRABAN2_G004","");                   /* */
$remessaCEF->addField("FEBRABAN3_G004"," ");                  /* */
$remessaCEF->post();    



//Gerando o arquivo na pasta remessa/
$file = "remessa/".date("dmYhis").".tx3";
foreach (glob("remessa/*.tx3") as $filename) {//apaga arquivo com extensão tx3 para gerar outro para o validador online
   unlink($filename);
}
$remessaCEF->saveToFile($file);
echo "<pre>".$remessaCEF->printLineString();

