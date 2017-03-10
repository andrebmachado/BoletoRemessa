<?php

$tb= array(
            "CodBancoComp_G001"=>array("nCmp"=>"1.0","posInicio"=>"1","posFim"=>"3","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"001","valueReplace"=>"0")
            ,"LoteServico_G002"=>array("nCmp"=>"2.0","posInicio"=>"4","posFim"=>"7","leng"=>"4","Dec"=>"","type"=>"Num","Default"=>"0000","valueReplace"=>"0")
            ,"TipoRegistro_G003"=>array("nCmp"=>"3.0","posInicio"=>"8","posFim"=>"8","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"0","valueReplace"=>"0")
            ,"FEBRABAM1_G004"=>array("nCmp"=>"4.0","posInicio"=>"9","posFim"=>"17","leng"=>"9","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>" ")
            ,"tpPessoa_G005"=>array("nCmp"=>"5.0","posInicio"=>"18","posFim"=>"18","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"2","valueReplace"=>"0")/* 1-PF 2-PJ */
            ,"tpPessoaNum_G006"=>array("nCmp"=>"6.0","posInicio"=>"19","posFim"=>"32","leng"=>"14","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"0")
            ,"ConvBanco_G007"=>array("nCmp"=>"7.0","posInicio"=>"33","posFim"=>"52","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>" ")
            ,"NumAgencia_G008"=>array("nCmp"=>"8.0","posInicio"=>"53","posFim"=>"57","leng"=>"5","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"0")
            ,"DVAgencia_G009"=>array("nCmp"=>"9.0","posInicio"=>"58","posFim"=>"58","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>" ")            
            ,"NumContaC_G010"=>array("nCmp"=>"10.0","posInicio"=>"59","posFim"=>"70","leng"=>"12","Dec"=>"","type"=>"Num","Default"=>"0","valueReplace"=>"0")
            ,"DVConta_G011"=>array("nCmp"=>"11.0","posInicio"=>"71","posFim"=>"71","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>"X","valueReplace"=>"X") /*se informar X maiusculo*/            
            ,"DVAgConta_G012"=>array("nCmp"=>"12.0","posInicio"=>"72","posFim"=>"72","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ")     /*Se BB informar branco*/
            ,"NomeEmpresa_G013"=>array("nCmp"=>"13.0","posInicio"=>"73","posFim"=>"102","leng"=>"30","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ") 
            ,"NomeBanco_G014"=>array("nCmp"=>"14.0","posInicio"=>"103","posFim"=>"132","leng"=>"30","Dec"=>"","type"=>"Alpha","Default"=>"BANCO DO BRASIL S.A.","valueReplace"=>" ")             
            ,"FEBRABAM2_G004"=>array("nCmp"=>"15.0","posInicio"=>"133","posFim"=>"142","leng"=>"10","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ")            
            ,"CodRemRet_G015"=>array("nCmp"=>"16.0","posInicio"=>"143","posFim"=>"143","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"")
            ,"DataGeracao_G016"=>array("nCmp"=>"17.0","posInicio"=>"144","posFim"=>"151","leng"=>"8","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"")/*DDMMAAAA nao maior que a de envio*/
            ,"HoraGeracao_G017"=>array("nCmp"=>"18.0","posInicio"=>"152","posFim"=>"157","leng"=>"6","Dec"=>"","type"=>"Num","Default"=>"000000","valueReplace"=>"0")
            ,"NumSeqArquivo_G018"=>array("nCmp"=>"19.0","posInicio"=>"158","posFim"=>"163","leng"=>"6","Dec"=>"","type"=>"Num","Default"=>"000000","valueReplace"=>"0")/*zeros ou numero sequencial de controle*/                        
            ,"LayoutArquivo_G019"=>array("nCmp"=>"20.0","posInicio"=>"164","posFim"=>"166","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"083","valueReplace"=>"0")/* campo nao criticado - zerros ou numero da versao*/
            ,"DensGravArquivo_G020"=>array("nCmp"=>"21.0","posInicio"=>"167","posFim"=>"171","leng"=>"5","Dec"=>"","type"=>"Num","Default"=>"083","valueReplace"=>"0")/*campo nao criticado - zeros ou 01600 ou 06250*/
            ,"ReservBB_G021"=>array("nCmp"=>"22.0","posInicio"=>"172","posFim"=>"191","leng"=>"20","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>" ")/*campo nao criticado - zeros ou 01600 ou 06250*/
            ,"ReservEmpresa_G022"=>array("nCmp"=>"23.0","posInicio"=>"192","posFim"=>"211","leng"=>"20","Dec"=>"","type"=>"Num","Default"=>"                    ","valueReplace"=>" ")/* a criterio da empresa */         
            ,"FEBRABAM3_G004"=>array("nCmp"=>"24.0","posInicio"=>"212","posFim"=>"240","leng"=>"29","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>" ")/* a criterio da empresa */            
        );

$sql = "CREATE TABLE x(
CODIGO int(9) ZEROFILL NOT NULL AUTO_INCREMENT ,<br>";

foreach ($tb as $key => $value) {
    //echo $key."=>".$value['leng']."<br>";
    if($value['type']=="Alpha"){ $tipo="varchar(".$value['leng'].")";}
    if($value['type']=="Num"){ $tipo="Int";}
    if($value['Dec']<>""){ $tipo="double(9,";}
    
    $sql .= $key." ".$tipo."<br>";
            
}

//(9,2) NULL AFTER

$sql .= "PRIMARY KEY (CODIGO))";
echo $sql;