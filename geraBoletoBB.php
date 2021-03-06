<?php
include_once 'novaRemessa.php';
//echo $LoteServico_G002."<br>";

$remessaBB = new dataSource();
//HeaderDoArquivo
$remessaBB->Append($headerArquivo);
$remessaBB->addField("CodBancoComp_G001", $CodBancoComp_G001);  /*03 Banco do Brasil 001 */
$remessaBB->addField("LoteServico_G002", "0000");    /*04 */
$remessaBB->addField("TipoRegistro_G003", 0);                   /*01 0-Header do arquivo*/
$remessaBB->addField("FEBRABAN1_G004", "");                     /*09 Brancos */
$remessaBB->addField("tpPessoa_G005", $tpPessoa_G005);          /*01 1-CPF 2-CNPJ */
$remessaBB->addField("tpPessoaNum_G006", $tpPessoaNum_G006);    /*14 */

$ConvBanco_G007_1 = $ConvBanco_G007." ";
$remessaBB->addField("CodConvBanco_G007",$ConvBanco_G007_1);    /*20 Brancos */
$remessaBB->addField("NumAgencia_G008",$NumAgencia_G008);       /*05 */
$remessaBB->addField("DVAgencia_G009", $DVAgencia_G009);        /*01 */
$remessaBB->addField("NumContaC_G010", $NumContaC_G010);        /*12 */
$remessaBB->addField("DVConta_G011", $DVConta_G011);            /*01 */        
$remessaBB->addField("DVAgConta_G012", "");                     /*01 Brancos Não tratado*/
$remessaBB->addField("NomeEmpresa_G013",$NomeEmpresa_G013);     /*30 */
$remessaBB->addField("NomeBanco_G014",$NomeBanco_G014);         /*30 */
$remessaBB->addField("FEBRABAN2_G004", "");                     /*10 Brancos*/
$remessaBB->addField("CodRemRet_G015", "1");                    /*01 1-Remessa(Cliente->Banco),2-Retorno(Banco->Cliente)*/
$remessaBB->addField("DataGeracao_G016", $DataGeracao_G016);    /*08 DDMMAAAA */
$remessaBB->addField("HoraGeracao_G017", "000000");             /*06 Zeros Informar zeros ou hora no formato HHMMSS*/ 
$remessaBB->addField("NumSeqArquivo_G018", $NumSeqArquivo_G018);/*06 ???? Numero sequencial de controle */
$remessaBB->addField("LayoutArquivo_G019","083");               /*03 Zeros  -  - Nexxera Pediu pra enviar 083*/      
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
$remessaBB->addField("LayoutArquivo_G030", "042");               /*03 Zeros Campo nao criticado - Nexxera Pediu pra enviar 042*/
$remessaBB->addField("FEBRABAN2_G004", "");                      /*01 Brancos*/
$remessaBB->addField("tpPessoa_G005", $tpPessoa_G005);           /*01 1-CPF 2-CNPJ */
$remessaBB->addField("tpPessoaNum_G006", $tpPessoaNum_G006);     /*15 */

$ConvBanco_G007_2 = $ConvBanco_G007."  ";
$remessaBB->addField("CodConvBanco_G007", $ConvBanco_G007_2);      /*20 NumeroConvenio+CobrancaCedente+NumeroCarteira+CmpIdRemTestes*/
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
    $IdTituloBanco_G069 = $_NumeroConvenio.$I_REQUISICAO;            /*07Digitos numero do convenio + 10 Digitos Num Sequencial de controle */
    $remessaBB->Append($SeguimentoP); 
    $remessaBB->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03 */
    $remessaBB->addField("LoteServico_G002",$LoteServico_G002);     /*04 */
    $remessaBB->addField("TipoRegistro_G003",3);                    /*01 3-Detalhe */
    $remessaBB->addField("NumSeqRegLote_G038",$NumSeqRegLote_G038); /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
    $remessaBB->addField("CodSegRegDetalhe_G039","P");              /*01 */
    $remessaBB->addField("FEBRABAN1_G004", "");                     /*01 */
/**/$remessaBB->addField("CodMovRemessa_C004", "01");               /*02 01 – Entrada de títulos,02 – Pedido de baixa.... Manual Pag8 */
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
    $remessaBB->addField("IdTitulo_C016", "N");                     /*01 (reconhecimento da dívida pelo Sacado).(A-Aceite)(N-Nao Aceite) */ 
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
    $remessaBB->Append($SeguimentoQ);
    $remessaBB->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03 */
    $remessaBB->addField("LoteServico_G002",$LoteServico_G002);     /*04 */
    $remessaBB->addField("TipoRegistro_G003",3);                    /*01 Default 3*/
    $remessaBB->addField("NumSeqRegLote_G038",$NumSeqRegLote_G038); /*05 Sequencial iniciar 00001 icrementar a cada nova linha*/
    $remessaBB->addField("CodSegRegDetalhe_G039","Q");              /*01 */
    $remessaBB->addField("FEBRABAN1_G004","");                      /*01 */
/**/$remessaBB->addField("CodMovRemessa_C004","01");                /*02 */
    $remessaBB->addField("tpPessoa_G005",$tpPessoa_G005);           /*01 */
    $remessaBB->addField("tpPessoaNum_G006",$tpPessoaNum_G006);     /*15 */
    $remessaBB->addField("Nome_G013", utf8_encode($Nome_G013));     /*40 */
    $remessaBB->addField("Endereco_G032"," ");                      /*40 */
    $remessaBB->addField("Bairro_G032"," ");                        /*15 */
    $remessaBB->addField("CEP_G032","00000");                       /*05 Nexxera prencher com zeros*/ 
    $remessaBB->addField("SufixoCEP_G034","000");                   /*03 Nexxera prencher com zeros*/
    $remessaBB->addField("Cidade_G033","Cidade");                   /*15 */
    $remessaBB->addField("UF_G036","UF");                           /*02 */
    $remessaBB->addField("TipoInsc_G005","");                       /*01 Brancos(Sacador/Avalista)*/
    $remessaBB->addField("NumInscricao_G006","");                   /*15 Brancos(Sacador/Avalista)*/
    $remessaBB->addField("NomeSacadorAvalista_G013","");            /*40 Brancos(Sacador/Avalista)*/
    $remessaBB->addField("CodBcoCompesacao_C031","0");              /*03 Zeros (Campo nao tratado)*/
    $remessaBB->addField("NossoNumBancoCorresp_C032","");           /*20 Brancos (Campo nao tratado)*/
    $remessaBB->addField("FEBRABAN2_G004","");                      /*08 Brancos */
    $remessaBB->post();//Fim seguimento Q    
    
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
        $Reg->execute();        
    } catch (Exception $e) {
        echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";                                 
    }     
    

}

//Trailer do lote
$remessaBB->Append($TrailerLote);
$remessaBB->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03  Codigo do banco cedente */
$remessaBB->addField("LoteServico_G002",$LoteServico_G002);     /*04  */
$remessaBB->addField("TipoRegistro_G003",5);                    /*01  '5'= Trailer de Lote*/
$remessaBB->addField("FEBRABAN1_G004","");                      /*09  Brancos*/
$remessaBB->addField("QtdeRegistLote_G057","");                 /*06  Soma quantidade de lotes do arquivo conforma o tipo 1,3,4,5*/
$remessaBB->addField("FEBRABAN2_G004","");                      /*217 */
$remessaBB->post();//Fim trailer do lote

//Trailer do arquivo 
$remessaBB->Append($TrailerArquivo);
$remessaBB->addField("CodBancoComp_G001",$CodBancoComp_G001);   /*03  Codigo do banco cedente */
$remessaBB->addField("LoteServico_G002",9999);                  /*04  Nexxera Pediu pra enviar 9999*/
$remessaBB->addField("TipoRegistro_G003",9);                    /*01  '9' = Trailer de Arquivo*/
$remessaBB->addField("FEBRABAN1_G004","");                      /*09  */
$remessaBB->addField("QtdeLoteArquivo_G049",1);                 /*06  Auto Somatória dos registros de tipo 1-Header do lote */
$remessaBB->addField("QtdeRegistArquivo_G056","");              /*06  Auto Somatória dos registros de tipo 0-HeaderArq,1-HeaderLote,3-Detalhe,5-TrailerLote e 9-TrailerArq */
$remessaBB->addField("QtdeContasConcil_G037","0");              /*06  */
$remessaBB->addField("FEBRABAN2_G004","");                      /*205 */
$remessaBB->post();//Fim trailer do arquivo 

echo "<pre>".$remessaBB->getStringFile();
try{
    $sql =  "UPDATE boleto_remessa SET "
            . "TLQtdeRegistLote_G057=".$remessaBB->getQtdeRegistLote_G057()
            . ",TAQtdeLoteArquivo_G049=1"
            .",TAQtdeRegistArquivo_G056=".$remessaBB->getQtdeRegsArquivo_G056()
            .",ArquivoRemessa=\"".$remessaBB->getStringFile()."\""
            ." WHERE LoteServico_G002=".$LoteServico_G002;               
    //echo "<pre>".$sql;
    $AtualizaQtdes=$con->prepare($sql);
    $AtualizaQtdes->execute();
} catch (Exception $e) {
    echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";
}


//Gerando o arquivo na pasta remessa/
$file = "remessa/".date("dmYhis").".tx3";

//apaga arquivo com extensão tx3 para gerar outro para o validador online
foreach (glob("remessa/*.tx3") as $filename) {
   //echo "$filename size " . filesize($filename) . "\n";
   unlink($filename);
}
$remessaBB->saveToFile("");
$remessaBB->saveToFile($file);

echo "<pre>";
$retornoBB = new loadFile(array("SeguimentoP"=>$SeguimentoP,"SeguimentoQ"=>$SeguimentoQ,"SeguimentoT"=>$SeguimentoT,"SeguimentoU"=>$SeguimentoU));
$retornoBB->loadFile($file);
var_dump($retornoBB->getRetornoMapeado());