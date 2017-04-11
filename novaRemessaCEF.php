<?php
include_once 'class/DBConnect.php';
include_once 'class/fileGenerate.class.php';
include_once 'class/castType.class.php';
include_once 'class/dataSet.class.php';
include_once 'class/dataSource.class.php';
include_once 'class/dadosComunsCEF.php';
include_once 'class/loadFileEnvio.class.php';

//verifica se existe boletos para registrar V_STATUS='2'
$SemRegistros = $con->prepare("
    select b.I_BOLETO_ID, '' as I_BOLETO_AVULSO_ID, r.Razao_Social, r.Nome_Fantasia, r.CNPJ, r.Nome_Responsavel, r.CPF_Responsavel, 
        b.I_NOSSONUMERO, 
        b.I_REQUISICAO,
        b.I_VIA,
        b.F_VALOR,
        b.F_MORA,
        b.F_MULTA,
        b.D_EMISSAO,
        b.D_VENCIMENTO
    from boleto b 
        left join boleto_remessa_reg rg on b.I_BOLETO_ID=rg.I_BOLETO
        inner join requisicao r on r.I_REQUISICAO_ID = b.I_REQUISICAO
    where rg.I_BOLETO is null

    union all

    select '', b2.I_NOSSONUMERO, 
        case LENGTH(V_CPF)
        when '18' THEN V_NOME
        end, '', 
        case LENGTH(V_CPF)
        when '18' THEN V_CPF
        end, 
        V_NOME, 
        V_CPF, 
        b2.I_NOSSONUMERO,
        '',
        b2.I_VIA,
        b2.F_VALOR,
        b2.F_MORA,
        b2.F_MULTA,
        b2.D_EMISSAO,
        b2.D_VENCIMENTO
    from boleto_avulso b2 
        left join boleto_remessa_reg rg on b2.I_NOSSONUMERO =rg.I_BOLETO_AVULSO
    where rg.I_BOLETO is null
    limit 1");//
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

        //echo $SQL."<br>";
        $GeraRemessa = $con->prepare($SQL);
        $GeraRemessa->execute();        
    } catch (Exception $e) {
        echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";                                 
    }     
        
    $LoteServico_G002   = $Lote;
    $NumSeqArquivo_G018 = $Lote;
    //$DataGeracao        = date("Ymd");
    $DataGeracao_G016   = date("dmY");
    $DataGravRemRet_G068= date("Ymd");
    $NumRemRet_G079     = $Lote;
    include_once 'geraBoletoCEF.php';
}