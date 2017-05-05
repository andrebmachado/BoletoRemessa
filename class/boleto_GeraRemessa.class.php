<?php
include_once 'DBConnect.php';
include_once 'dadosComunsCEF.php';

//verifica se existe boletos para registrar V_STATUS='2'
//$SemRegistros = $con->prepare("select * from boletoscc where I_BOLETOSCC_ID=301143");// limit 1");
$SemRegistros = $con->prepare("select * from boletoscc");// limit 1");
try{
    $SemRegistros->execute();
    $SReg     = $SemRegistros->fetchAll(PDO::FETCH_OBJ);        
} catch (PDOException $e) {
    echo '<pre>PDOException: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";
}

//Se tem boletos para registrar gera uma nremessa 
if($SReg){
    //Gera o numero para o proximo lote
    $GeraNumeroLote = $con->prepare("select MAX(LoteServico_G002)+1 as nLote from boleto_remessa");
    $GeraNumeroLote->execute();
    $nLote = $GeraNumeroLote->fetch(PDO::FETCH_OBJ);
    
    $Lote = $nLote->nLote;
    if($nLote->nLote==""){
        $Lote=1;
    }
    try{
        $SQL = "insert into boleto_remessa set "
                . "DataGeracao_G016=".date("dmY").","
                . "LoteServico_G002=0000,"
                . "NumSeqArquivo_G018=".$Lote.","
                . "NumRemRet_G079=".$Lote.","
                . "CodMovRemessa_C004=".$Lote.","
                . "TAQtdeLoteArquivo_G049=1,"
                . "STATUS='0'";
        $GeraRemessa = $con->prepare($SQL);
        $GeraRemessa->execute();        
    } catch (Exception $e) {
        echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";                                 
    }     
        
    $LoteServico_G002   = $Lote;
    $NumSeqArquivo_G018 = $Lote;
    //$DataGeracao_G016   = date("dmY");
    //$DataGravRemRet_G068= date("Ymd");
    $NumRemRet_G079     = $Lote;
    //include_once 'geraBoletoCEF.php';
    include_once 'boleto_dataMap.class.php';    
    if($CodBancoComp_G001==104){
        include_once 'boleto_SetaDados_CEF.class.php';        
    }   
    
}



