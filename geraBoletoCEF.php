<?php
include_once 'novaRemessaCEF.php';
//echo $LoteServico_G002."<br>";

$remessaCEF = new dataSource();
//HeaderDoArquivo
$remessaCEF->Append($headerArquivo);
$remessaCEF->addField("CodBancoComp_G001", $CodBancoComp_G001);  /*03 Banco do Brasil 001 */
$remessaCEF->addField("LoteServico_G002", "0000");               /*04 */
$remessaCEF->addField("TipoRegistro_G003", 0);                   /*01 0-Header do arquivo*/
$remessaCEF->addField("FEBRABAN1_G004", "");                     /*09 Brancos */
$remessaCEF->addField("tpPessoa_G005", 2);                       /*01 1-CPF 2-CNPJ */
$remessaCEF->addField("tpPessoaNum_G006", $tpPessoaNum_G006);    /*14 */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"20","Default"=>"","valueReplace"=>"0","SIDE_STR"=>"L"]);/*20 USO CAIXA */
$remessaCEF->addField("NumAgencia_G008",$NumAgencia_G008);       /*05 */
$remessaCEF->addField("DVAgencia_G009", $DVAgencia_G009);        /*01 */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"6","Default"=>"","valueReplace"=>"0","SIDE_STR"=>"L"]);/*08 USO CAIXA */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"8","Default"=>"","valueReplace"=>"0","SIDE_STR"=>"L"]);/*08 USO CAIXA */
//$remessaCEF->addField("NumContaC_G010", $NumContaC_G010);      /*12 */
//$remessaCEF->addField("DVConta_G011", $DVConta_G011);          /*01 */        
//$remessaCEF->addField("DVAgConta_G012", "");                   /*01 Brancos Não tratado*/
$remessaCEF->addField("NomeEmpresa_G013",$NomeEmpresa_G013);     /*30 */
$remessaCEF->addField("NomeBanco_G014",$NomeBanco_G014);         /*30 */
$remessaCEF->addField("FEBRABAN2_G004", "");                     /*10 Brancos*/
$remessaCEF->addField("CodRemRet_G015", "1");                    /*01 1-Remessa(Cliente->Banco),2-Retorno(Banco->Cliente)*/
$remessaCEF->addField("DataGeracao_G016", $DataGeracao_G016);    /*08 DDMMAAAA */
$remessaCEF->addField("HoraGeracao_G017", "000000");             /*06 Zeros Informar zeros ou hora no formato HHMMSS*/ 
$remessaCEF->addField("NumSeqArquivo_G018", $NumSeqArquivo_G018);/*06 ???? Numero sequencial de controle */
$remessaCEF->addField("LayoutArquivo_G019","050");               /*03 Zeros  -  Conforme validador CAIXA*/      
$remessaCEF->addField("DensGravArquivo_G020", "00000");          /*05 Padrao CAIXA prencher com zeros */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>" ","leng"=>"20","Default"=>" ","valueReplace"=>" ","SIDE_STR"=>"L"]);           /*20 G021 Filler Espacos*/
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"REMESSA TESTE","leng"=>"20","Default"=>"","valueReplace"=>" ","SIDE_STR"=>"R"]);/*20 G022 Em producao informar em branco              */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>" ","leng"=>"4","Default"=>" ","valueReplace"=>" ","SIDE_STR"=>"L"]);            /*04 C077 Uso Interno   */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>" ","leng"=>"25","Default"=>" ","valueReplace"=>" ","SIDE_STR"=>"L"]);           /*25 G004 Filler        */

$remessaCEF->post(); //Fim do header do arquivo


//HeaderDoLote
$remessaCEF->Append($headerLote);
$remessaCEF->addField("CodBancoComp_G001", $CodBancoComp_G001);   /*03 Banco do Brasil 001 */
$remessaCEF->addField("LoteServico_G002", $LoteServico_G002);     /*04 */
$remessaCEF->addField("TipoRegistro_G003", 1);                    /*01 1-Header do lote*/
$remessaCEF->addField("TipoOperacao_G028", "R");                  /*01 R–Remessa, T–Retorno.*/
$remessaCEF->addField("TipoServico_G025", "01");                  /*02 Default(01)*/
$remessaCEF->addField("FEBRABAN1_G004", "00");                    /*02 Brancos*/
$remessaCEF->addField("LayoutArquivo_G030", "030");               /*03 Zeros Campo nao criticado - Nexxera Pediu pra enviar 042*/
$remessaCEF->addField("FEBRABAN2_G004", " ");                     /*01 Branco */
$remessaCEF->addField("tpPessoa_G005", $tpPessoa_G005);           /*01 1-CPF 2-CNPJ */
$remessaCEF->addField("tpPessoaNum_G006", $tpPessoaNum_G006);     /*15 */

$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"6","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]); /*06 G007 Cod. do Beneficiário/ Padrão validador CAIXA prencher com zeros */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"14","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/*25 G007 Filler        */
$remessaCEF->addField("NumAgencia_G008", $NumAgencia_G008);       /*05 */
$remessaCEF->addField("DVAgencia_G009", $DVAgencia_G009);         /*01 */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"6","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/*25 G007 Cod. Convenio Banco mesmo do campo 11.1G007*/
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"7","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/*25 C078         */
$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"1","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/*25 Uso Caixa   */
$remessaCEF->addField("NomeEmpresa_G013", $NomeEmpresa_G013);     /*30 */
$remessaCEF->addField("Mensagem1_C073", "");                      /*40 C073*/
$remessaCEF->addField("Mensagem2_C073", "");                      /*40 C073*/
$remessaCEF->addField("NumRemRet_G079", $NumRemRet_G079);         /*08 Numero da remessa pelo sistema*/
$remessaCEF->addField("DataGravRemRet_G068",$DataGravRemRet_G068);/*08 */
$remessaCEF->addField("DataCredito_C003", "");                    /*08 Brancos. Nao tratado pelo BB*/
$remessaCEF->addField("FEBRABAN3_G004", "");                      /*33 */
$remessaCEF->post();//Fim do header do lote



function df($d,$format){ 
    $dt=date_create($d);
    return date_format($dt,$format);
}

$Linha = $SReg;
$NumSeqRegLote_G038=0;
foreach($Linha as $col){    
    $I_BOLETO_ID    = $col->I_BOLETO_ID;
    $I_NOSSONUMERO  = $col->I_NOSSONUMERO;
    $I_REQUISICAO   = str_pad($col->I_REQUISICAO,10,'0',STR_PAD_LEFT);
    $I_VIA          = $col->I_VIA;
    $F_VALOR        = str_replace(".","",$col->F_VALOR);
    $F_MULTA        = $col->F_MULTA;
    $F_MORA         = $col->F_MORA;
    $D_EMISSAO      = df($col->D_EMISSAO,"dmY");
    $D_VENCIMENTO   = df($col->D_VENCIMENTO,"dmY");
    
    //--------------------------------------------------------------------Seguimento P--------------------------------------------------------------------
    $NumSeqRegLote_G038++;
    //$IdTituloBanco_G069 = $_NumeroConvenio.$I_REQUISICAO;            /*07Digitos numero do convenio + 10 Digitos Num Sequencial de controle */
    $remessaCEF->Append($SeguimentoP); 
    $remessaCEF->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03 */
    $remessaCEF->addField("LoteServico_G002",$LoteServico_G002);     /*04 */
    $remessaCEF->addField("TipoRegistro_G003",3);                    /*01 3-Detalhe */
    
    $remessaCEF->addField("NumSeqRegLote_G038",$NumSeqRegLote_G038); /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
    $remessaCEF->addField("CodSegRegDetalhe_G039","P");              /*01 */
    $remessaCEF->addField("FEBRABAN1_G004", "");                     /*01 Filler CAIXA*/
/**/$remessaCEF->addField("CodMovRemessa_C004", "01");               /*02 01 – Entrada de títulos,02 – Pedido de baixa.... Manual Pag8 */

    $remessaCEF->addField("NumAgencia_G008",$NumAgencia_G008);       /*05 */
    $remessaCEF->addField("DVAgencia_G009",$DVAgencia_G009);         /*01 */
    $remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"6","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/*G007 Cod.Conv.Banco Caixa*/    
    $remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"8","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/*Campo11.3 EXCLUSIVO CAIXA*/    
/**/$remessaCEF->addField("CampoPersonalizado","",["Valor"=>"0","leng"=>"2","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/*Campo12.3 Filler Caixa   */
        
    //NOSSO NUMERO CAMPO 13.3P 
    $remessaCEF->addField("CampoPersonalizado","",["Valor"=>$I_NOSSONUMERO,"leng"=>"18","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/*Campo12.3 Filler Caixa*/
    $remessaCEF->addField("CodCarteira_C006",1);                     /*01 C006 (1=Cobrança Simples)*/
    $remessaCEF->addField("FormCadTitBanco_C007",1);                 /*01 C007 (1=Cobrança Registrada)*/
    $remessaCEF->addField("TipoDoc_C008",2);                         /*01 C008 (2=Escritural)*/
    $remessaCEF->addField("IdEmiBloqueto_C009", "");                 /*01 C009 (2=Cliente Emite)*/
    $remessaCEF->addField("IdDistribuicao_C010",0);                  /*01 C010 (0=Postagem pelo Beneficiário)*/
    $remessaCEF->addField("CampoPersonalizado","",["Valor"=>$I_REQUISICAO,"leng"=>"11","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/**/    
/**/$remessaCEF->addField("CampoPersonalizado","",["Valor"=>" ","leng"=>"4","Default"=>"0","valueReplace"=>" ","SIDE_STR"=>"L"]);/*Campo19.3 Filler Caixa   */    
    $remessaCEF->addField("CampoPersonalizado","",["Valor"=>$D_VENCIMENTO,"leng"=>"8","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/**/    
    $remessaCEF->addField("CampoPersonalizado","",["Valor"=>$F_VALOR,"leng"=>"15","Default"=>"0","valueReplace"=>"0","SIDE_STR"=>"L"]);/**/    
    
    $remessaCEF->addField("AgEncCobranca_C014", "0");                /*05 Zeros, A agência encarregada da Cobrança é definida de acordo com o CEP do sacado. */
    $remessaCEF->addField("DVAgencia_G009", "0  ");                     /*01 Branco*/                
    $remessaCEF->addField("EspecieTit_C015", "99");                  /*02 Espécie do Título (99)Outros */ 
    $remessaCEF->addField("IdTitulo_C016", "N");                     /*01 (reconhecimento da dívida pelo Sacado).(A-Aceite)(N-Nao Aceite) */ 
    $remessaCEF->addField("DataEmitTit_G071", $D_EMISSAO);           /*08 */              
    //@todo Juros 
    $remessaCEF->addField("CodJurosMora_C018", "3");                 /*01 (3)-isento, não é tratado automaticamente pelo Banco.*/
    $remessaCEF->addField("DataJurosMora_C019", "00000000");         /*08 verificar pagina10 */
    $remessaCEF->addField("JurosMoraDiaTx_C020", "0");               /*13,2 */
    $remessaCEF->addField("CodDesconto1_C021", "0");                 /*01 (0)-Nao ha desconto */
    $remessaCEF->addField("DataDesconto1_C022", "0");                /*08   Zeros, quando não houver desconto a ser concedido.*/
    $remessaCEF->addField("PercentDesconto1_C023", "0");             /*13,2 Zeros, quando não houver desconto a ser concedido.*/
    $remessaCEF->addField("IOFRecolhido_C024", "0");                 /*13,2 Zeros, quando não houver desconto a ser concedido. */    
    $remessaCEF->addField("ValorAbatimento_G045", "0");              /*13,2 Deduzido do valor original do titulo*/
    $remessaCEF->addField("IdTituloEmpresa_G072",$I_NOSSONUMERO);    /*25 ?*/
    $remessaCEF->addField("CodProtesto_C026", "3");                  /*01 (3)Nao protestar */
    $remessaCEF->addField("NumDiasProtesto_C027", "0");              /*02 se CodProtesto_C026=3 entao informar zero*/
    $remessaCEF->addField("CodBaixa_C028", "0");                     /*01 Zeros o sistema considera a carteira junto ao banco */
    $remessaCEF->addField("NumDiasBaixaDev_C029", "0");              /*03 Zeros o sistema considera a carteira junto ao banco */
    $remessaCEF->addField("CodMoeda_G065", "9");                     /*02 09 Real, 02 Dolar Comercial(Venda),03 Dolar Turismo(Venda) */
    $remessaCEF->addField("NumContratoOpCred_C030", "0");            /*10 informar zeros ou numero do contrato de cobrança */
    $remessaCEF->addField("FEBRABAN2_G004", "");                     /*01 Brancos*/
    $remessaCEF->post();//Fim seguimento P
    
    //--------------------------------------------------------------------Seguimento Q--------------------------------------------------------------------
    $NumSeqRegLote_G038++;
    $tpPessoa_G005=2;
    $tpPessoaNum_G006=preg_replace("/[^0-9]/", "", $col->CNPJ);
    $Nome_G013       =   $col->Razao_Social;
    //Verifica se tem dados de PJ se nao PF
    if($col->CNPJ==null){
        $tpPessoa_G005=1;
        $tpPessoaNum_G006=preg_replace("/[^0-9]/", "", $col->CPF_Responsavel);
        $Nome_G013       =   $col->Nome_Responsavel;
    }
    $remessaCEF->Append($SeguimentoQ);
    $remessaCEF->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03 */
    $remessaCEF->addField("LoteServico_G002",$LoteServico_G002);     /*04 */
    $remessaCEF->addField("TipoRegistro_G003",3);                    /*01 Default 3*/
    $remessaCEF->addField("NumSeqRegLote_G038",$NumSeqRegLote_G038); /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
    $remessaCEF->addField("CodSegRegDetalhe_G039","Q");              /*01 */
    $remessaCEF->addField("FEBRABAN1_G004","");                      /*01 */
/**/$remessaCEF->addField("CodMovRemessa_C004","01");                /*02 */
    $remessaCEF->addField("tpPessoa_G005",$tpPessoa_G005);           /*01 */
    $remessaCEF->addField("tpPessoaNum_G006",$tpPessoaNum_G006);     /*15 */
    $remessaCEF->addField("Nome_G013", utf8_encode($Nome_G013));     /*40 */
    $remessaCEF->addField("Endereco_G032"," ");                      /*40 */
    $remessaCEF->addField("Bairro_G032"," ");                        /*15 */
    $remessaCEF->addField("CEP_G032","00000");                       /*05 Nexxera prencher com zeros*/ 
    $remessaCEF->addField("SufixoCEP_G034","000");                   /*03 Nexxera prencher com zeros*/
    $remessaCEF->addField("Cidade_G033","Cidade");                   /*15 */
    $remessaCEF->addField("UF_G036","UF");                           /*02 */
    $remessaCEF->addField("TipoInsc_G005","");                       /*01 Brancos(Sacador/Avalista)*/
    $remessaCEF->addField("NumInscricao_G006","");                   /*15 Brancos(Sacador/Avalista)*/
    $remessaCEF->addField("NomeSacadorAvalista_G013","");            /*40 Brancos(Sacador/Avalista)*/
    $remessaCEF->addField("CodBcoCompesacao_C031","   ");            /*03 Zeros (Campo nao tratado)*/
    $remessaCEF->addField("NossoNumBancoCorresp_C032","");           /*20 Brancos (Campo nao tratado)*/
    $remessaCEF->addField("FEBRABAN2_G004","");                      /*08 Brancos */
    $remessaCEF->post();//Fim seguimento Q    
    
    if(!$col->I_BOLETO_AVULSO_ID){
        $col->I_BOLETO_AVULSO_ID=0;
    }
    if(!$col->I_BOLETO_ID){
        $col->I_BOLETO_ID=0;
    }

    try {                                
        $SQLReg = "insert into boleto_remessa_reg set "
                . "I_BOLETO_REMESSA=".$NumRemRet_G079.","
                . "I_BOLETO =".$col->I_BOLETO_ID.","
                . "I_BOLETO_AVULSO=".$col->I_BOLETO_AVULSO_ID;    
        $Reg = $con->prepare($SQLReg);
        //echo $SQLReg."<br>";
        //$Reg->execute();        
    } catch (Exception $e) {
        echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";                                 
    }     
    

}
//Trailer do lote
$remessaCEF->Append($TrailerLote);
$remessaCEF->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03  Codigo do banco cedente */
$remessaCEF->addField("LoteServico_G002",$LoteServico_G002);     /*04  */
$remessaCEF->addField("TipoRegistro_G003",5);                    /*01  '5'= Trailer de Lote*/
$remessaCEF->addField("FEBRABAN1_G004","");                      /*09  Brancos*/
$remessaCEF->addField("QtdeRegistLote_G057","");                 /*06  Soma quantidade de lotes do arquivo conforma o tipo 1,3,4,5*/
$remessaCEF->addField("QtdeTitCobranca_C070","");                /*06  C070 Quantidade de titulos emitidos no lote*/
$remessaCEF->addField("ValorTotTitCart_C071","");                /*06  C071 Valor total dos titulos */

//$remessaCEF->addField("FEBRABAN2_G004","");                    /*217 */

$remessaCEF->post();//Fim trailer do lote

//Trailer do arquivo 
$remessaCEF->Append($TrailerArquivo);
$remessaCEF->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03  Codigo do banco cedente */
$remessaCEF->addField("LoteServico_G002",9999);                  /*04  Nexxera Pediu pra enviar 9999*/
$remessaCEF->addField("TipoRegistro_G003",9);                    /*01  '9' = Trailer de Arquivo*/
$remessaCEF->addField("FEBRABAN1_G004","");                      /*09  */
$remessaCEF->addField("QtdeLoteArquivo_G049",1);                 /*06  Auto Somatória dos registros de tipo 1-Header do lote */
$remessaCEF->addField("QtdeRegistArquivo_G056","");              /*06  Auto Somatória dos registros de tipo 0-HeaderArq,1-HeaderLote,3-Detalhe,5-TrailerLote e 9-TrailerArq */
$remessaCEF->addField("QtdeContasConcil_G037","0");              /*06  */
$remessaCEF->addField("FEBRABAN2_G004","");                      /*205 */
$remessaCEF->post();//Fim trailer do arquivo 

echo "<pre>".$remessaCEF->getStringFile();
//try{
//    $sql =  "UPDATE boleto_remessa SET "
//            . "TLQtdeRegistLote_G057=".$remessaCEF->getQtdeRegistLote_G057()
//            . ",TAQtdeLoteArquivo_G049=1"
//            .",TAQtdeRegistArquivo_G056=".$remessaCEF->getQtdeRegsArquivo_G056()
//            .",ArquivoRemessa=\"".$remessaCEF->getStringFile()."\""
//            ." WHERE LoteServico_G002=".$LoteServico_G002;               
//    //echo "<pre>".$sql;
//    $AtualizaQtdes=$con->prepare($sql);
//    $AtualizaQtdes->execute();
//} catch (Exception $e) {
//    echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";
//}


//Gerando o arquivo na pasta remessa/
$file = "remessa/".date("dmYhis").".tx3";

//apaga arquivo com extensão tx3 para gerar outro para o validador online
foreach (glob("remessa/*.tx3") as $filename) {
   //echo "$filename size " . filesize($filename) . "\n";
   unlink($filename);
}
$remessaCEF->saveToFile("");
$remessaCEF->saveToFile($file);

echo "<pre>";
//$retornoBB = new loadFile(array("SeguimentoP"=>$SeguimentoP,"SeguimentoQ"=>$SeguimentoQ,"SeguimentoT"=>$SeguimentoT,"SeguimentoU"=>$SeguimentoU));
//$retornoBB->loadFile($file);
//var_dump($retornoBB->getRetornoMapeado());