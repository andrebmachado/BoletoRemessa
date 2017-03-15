<?php
//@todo header do arquivo
//RegexBB [0-9]{3}[0-9]{4}[0-9]{1}\s{9}[0-9]{1}[0-9]{14}\s{20}[0-9]{5}[0-9]{1}[0-9]{12}[0-9]{1}\s{1}..............................BANCO DO BRASIL S.A.
$headerArquivo = 
        array(
            "CodBancoComp_G001"    =>array("nCmp"=>"1.0", "posInicio"=>"1",  "posFim"=>"3",  "leng"=>"3", "Dec"=>"","type"=>"Num",  "Default"=>"001", "valueReplace"=>"0")
            ,"LoteServico_G002"    =>array("nCmp"=>"2.0", "posInicio"=>"4",  "posFim"=>"7",  "leng"=>"4", "Dec"=>"","type"=>"Num",  "Default"=>"0000","valueReplace"=>"0")
            ,"TipoRegistro_G003"   =>array("nCmp"=>"3.0", "posInicio"=>"8",  "posFim"=>"8",  "leng"=>"1", "Dec"=>"","type"=>"Num",  "Default"=>"0",   "valueReplace"=>"0")
            ,"FEBRABAN1_G004"      =>array("nCmp"=>"4.0", "posInicio"=>"9",  "posFim"=>"17", "leng"=>"9", "Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")
            ,"tpPessoa_G005"       =>array("nCmp"=>"5.0", "posInicio"=>"18", "posFim"=>"18", "leng"=>"1", "Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"0")/* 1-PF 2-PJ */
            ,"tpPessoaNum_G006"    =>array("nCmp"=>"6.0", "posInicio"=>"19", "posFim"=>"32", "leng"=>"14","Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"0")
            ,"ConvBanco_G007"      =>array("nCmp"=>"7.0", "posInicio"=>"33", "posFim"=>"52", "leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>"",    "valueReplace"=>" ")
            ,"NumAgencia_G008"     =>array("nCmp"=>"8.0", "posInicio"=>"53", "posFim"=>"57", "leng"=>"5", "Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"0")
            ,"DVAgencia_G009"      =>array("nCmp"=>"9.0", "posInicio"=>"58", "posFim"=>"58", "leng"=>"1", "Dec"=>"","type"=>"Alpha","Default"=>"",    "valueReplace"=>" ")            
            ,"NumContaC_G010"      =>array("nCmp"=>"10.0","posInicio"=>"59", "posFim"=>"70", "leng"=>"12","Dec"=>"","type"=>"Num",  "Default"=>"0",   "valueReplace"=>"0")
            ,"DVConta_G011"        =>array("nCmp"=>"11.0","posInicio"=>"71", "posFim"=>"71", "leng"=>"1", "Dec"=>"","type"=>"Alpha","Default"=>"X",   "valueReplace"=>"X") /*se informar X maiusculo*/            
            ,"DVAgConta_G012"      =>array("nCmp"=>"12.0","posInicio"=>"72", "posFim"=>"72", "leng"=>"1", "Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")     /*Se BB informar branco*/
            ,"NomeEmpresa_G013"    =>array("nCmp"=>"13.0","posInicio"=>"73", "posFim"=>"102","leng"=>"30","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ") 
            ,"NomeBanco_G014"      =>array("nCmp"=>"14.0","posInicio"=>"103","posFim"=>"132","leng"=>"30","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")             
            ,"FEBRABAN2_G004"      =>array("nCmp"=>"15.0","posInicio"=>"133","posFim"=>"142","leng"=>"10","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")            
            ,"CodRemRet_G015"      =>array("nCmp"=>"16.0","posInicio"=>"143","posFim"=>"143","leng"=>"1", "Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"")
            ,"DataGeracao_G016"    =>array("nCmp"=>"17.0","posInicio"=>"144","posFim"=>"151","leng"=>"8", "Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"")/*DDMMAAAA nao maior que a de envio*/
            ,"HoraGeracao_G017"    =>array("nCmp"=>"18.0","posInicio"=>"152","posFim"=>"157","leng"=>"6", "Dec"=>"","type"=>"Num",  "Default"=>"0",   "valueReplace"=>"0")
            ,"NumSeqArquivo_G018"  =>array("nCmp"=>"19.0","posInicio"=>"158","posFim"=>"163","leng"=>"6", "Dec"=>"","type"=>"Num",  "Default"=>"0",   "valueReplace"=>"0")/*zeros ou numero sequencial de controle*/                        
            ,"LayoutArquivo_G019"  =>array("nCmp"=>"20.0","posInicio"=>"164","posFim"=>"166","leng"=>"3", "Dec"=>"","type"=>"Num",  "Default"=>"0",   "valueReplace"=>"0")/* campo nao criticado - zerros ou numero da versao*/
            ,"DensGravArquivo_G020"=>array("nCmp"=>"21.0","posInicio"=>"167","posFim"=>"171","leng"=>"5", "Dec"=>"","type"=>"Num",  "Default"=>" ",   "valueReplace"=>"0")/*campo nao criticado - zeros ou 01600 ou 06250*/
            ,"ReservBB_G021"       =>array("nCmp"=>"22.0","posInicio"=>"172","posFim"=>"191","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")/*campo nao criticado - zeros ou 01600 ou 06250*/
            ,"ReservEmpresa_G022"  =>array("nCmp"=>"23.0","posInicio"=>"192","posFim"=>"211","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")/* a criterio da empresa */         
            ,"FEBRABAN3_G004"      =>array("nCmp"=>"24.0","posInicio"=>"212","posFim"=>"240","leng"=>"29","Dec"=>"","type"=>"Alpha","Default"=>"",    "valueReplace"=>" ")/* a criterio da empresa */            
        );  
//@todo header do lote
$headerLote = 
        array(
            "CodBancoComp_G001"=>   array("nCmp"=>"1.1", "posInicio"=>"1",  "posFim"=>"3",  "leng"=>"3", "Dec"=>"","type"=>"Num",  "Default"=>"001", "valueReplace"=>"0")/* 001 Banco do brasil*/
            ,"LoteServico_G002"=>   array("nCmp"=>"2.1", "posInicio"=>"4",  "posFim"=>"7",  "leng"=>"4", "Dec"=>"","type"=>"Num",  "Default"=>"0000","valueReplace"=>"0")
            ,"TipoRegistro_G003"=>  array("nCmp"=>"3.1", "posInicio"=>"8",  "posFim"=>"8",  "leng"=>"1", "Dec"=>"","type"=>"Num",  "Default"=>"1",   "valueReplace"=>"0")
            ,"TipoOperacao_G028"=>  array("nCmp"=>"4.1", "posInicio"=>"9",  "posFim"=>"9",  "leng"=>"1", "Dec"=>"","type"=>"Alpha","Default"=>"R",   "valueReplace"=>"")/*R-Remessa/T-Retorno*/
            ,"TipoServico_G025"=>   array("nCmp"=>"5.1", "posInicio"=>"10", "posFim"=>"11", "leng"=>"2", "Dec"=>"","type"=>"Num",  "Default"=>"01",  "valueReplace"=>"")
            ,"FEBRABAN1_G004"=>     array("nCmp"=>"6.1", "posInicio"=>"12", "posFim"=>"13", "leng"=>"2", "Dec"=>"","type"=>"Alpha","Default"=>"  ",  "valueReplace"=>" ")/* espaços em branco*/
            ,"LayoutArquivo_G030"=> array("nCmp"=>"7.1", "posInicio"=>"14", "posFim"=>"16", "leng"=>"3", "Dec"=>"","type"=>"Num",  "Default"=>"000", "valueReplace"=>"0")/* */
            ,"FEBRABAN2_G004"=>     array("nCmp"=>"8.1", "posInicio"=>"17", "posFim"=>"17", "leng"=>"1", "Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")/* espaços em branco*/
            ,"tpPessoa_G005"=>      array("nCmp"=>"9.1", "posInicio"=>"18", "posFim"=>"18", "leng"=>"1", "Dec"=>"","type"=>"Num",  "Default"=>"2",   "valueReplace"=>"0")/* 1-PF 2-PJ */
            ,"tpPessoaNum_G006"=>   array("nCmp"=>"10.1","posInicio"=>"19", "posFim"=>"33", "leng"=>"15","Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"0")
            ,"ConvBanco_G007"=>     array("nCmp"=>"11.1","posInicio"=>"34", "posFim"=>"53", "leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>"",    "valueReplace"=>" ")            
            ,"NumAgencia_G008"=>    array("nCmp"=>"12.1","posInicio"=>"54", "posFim"=>"58", "leng"=>"5", "Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"0")            
            ,"DVAgencia_G009"=>     array("nCmp"=>"13.1","posInicio"=>"59", "posFim"=>"59", "leng"=>"1", "Dec"=>"","type"=>"Alpha","Default"=>"X",   "valueReplace"=>"")            
            ,"NumContaC_G010"=>     array("nCmp"=>"14.1","posInicio"=>"60", "posFim"=>"71", "leng"=>"12","Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"0")
            ,"DVConta_G011"=>       array("nCmp"=>"15.1","posInicio"=>"72", "posFim"=>"72", "leng"=>"1", "Dec"=>"","type"=>"Alpha","Default"=>"X",   "valueReplace"=>"") /*se informar X maiusculo*/            
            ,"DVAgConta_G012"=>     array("nCmp"=>"16.1","posInicio"=>"73", "posFim"=>"73", "leng"=>"1", "Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")     /*Se BB informar branco*/
            ,"NomeEmpresa_G013"=>   array("nCmp"=>"17.1","posInicio"=>"74", "posFim"=>"103","leng"=>"30","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")             
            ,"Mensagem1_C073"=>     array("nCmp"=>"18.1","posInicio"=>"104","posFim"=>"143","leng"=>"40","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ") 
            ,"Mensagem2_C073"=>     array("nCmp"=>"19.1","posInicio"=>"144","posFim"=>"183","leng"=>"40","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ") 
            ,"NumRemRet_G079"=>     array("nCmp"=>"20.1","posInicio"=>"184","posFim"=>"191","leng"=>"8", "Dec"=>"","type"=>"Num",  "Default"=>" ",   "valueReplace"=>" ") 
            ,"DataGravRemRet_G068"=>array("nCmp"=>"21.0","posInicio"=>"192","posFim"=>"199","leng"=>"8", "Dec"=>"","type"=>"Num",  "Default"=>"0",   "valueReplace"=>"")/*DDMMAAAA nao obrigatorio informar zeros*/
            ,"DataCredito_C003"=>   array("nCmp"=>"21.0","posInicio"=>"200","posFim"=>"207","leng"=>"8", "Dec"=>"","type"=>"Num",  "Default"=>"      ","valueReplace"=>" ")/*DDMMAAAA nao obrigatorio informar zeros*/
            ,"FEBRABAN3_G004"=>     array("nCmp"=>"22.1","posInicio"=>"208","posFim"=>"240","leng"=>"33","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")/* espaços em branco*/            
        );

 //@todo SeguimentoP 
$SeguimentoP = 
        array(
            "CodBancoComp_G001"=>       array("nCmp"=>"1.3", "posInicio"=>"1",  "posFim"=>"3",  "leng"=>"3", "Dec"=>"", "type"=>"Num",  "Default"=>"1","valueReplace"=>"0")/* 001 Banco do brasil*/
            ,"LoteServico_G002"=>       array("nCmp"=>"2.3", "posInicio"=>"4",  "posFim"=>"7",  "leng"=>"4", "Dec"=>"", "type"=>"Num",  "Default"=>"0","valueReplace"=>"0")            
            ,"TipoRegistro_G003"=>      array("nCmp"=>"3.3", "posInicio"=>"8",  "posFim"=>"8",  "leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>"3","valueReplace"=>"")
            ,"NumSeqRegLote_G038"=>     array("nCmp"=>"3.3", "posInicio"=>"9",  "posFim"=>"13", "leng"=>"5", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"0")
            ,"CodSegRegDetalhe_G039"=>  array("nCmp"=>"3.3", "posInicio"=>"14", "posFim"=>"14", "leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>"P","valueReplace"=>"")
            ,"FEBRABAN1_G004"=>         array("nCmp"=>"6.3", "posInicio"=>"15", "posFim"=>"15", "leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/* espaços em branco*/            
            ,"CodMovRemessa_C004"=>     array("nCmp"=>"7.3", "posInicio"=>"16", "posFim"=>"17", "leng"=>"2", "Dec"=>"", "type"=>"Num",  "Default"=>"","valueReplace"=>"")            
            ,"NumAgencia_G008"=>        array("nCmp"=>"8.3", "posInicio"=>"18", "posFim"=>"22", "leng"=>"5", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"0")            
            ,"DVAgencia_G009"=>         array("nCmp"=>"9.3", "posInicio"=>"23", "posFim"=>"23", "leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>"X","valueReplace"=>"")            
            ,"NumContaC_G010"=>         array("nCmp"=>"10.3","posInicio"=>"24", "posFim"=>"35", "leng"=>"12","Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"0")
            ,"DVConta_G011"=>           array("nCmp"=>"11.3","posInicio"=>"36", "posFim"=>"36", "leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>"X","valueReplace"=>"") /*se informar X maiusculo*/            
            ,"DVAgConta_G012"=>         array("nCmp"=>"12.3","posInicio"=>"37", "posFim"=>"37", "leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/*Campo nao tratado pelo BB informar branco ou zero*/
            ,"IdTituloBanco_G069"=>     array("nCmp"=>"13.3","posInicio"=>"38", "posFim"=>"57", "leng"=>"20","Dec"=>"", "type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/*Ver manual*/
            ,"CodCarteira_C006"=>       array("nCmp"=>"14.3","posInicio"=>"58", "posFim"=>"58", "leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"")/*Ver manual pg9*/
            ,"FormCadTitBanco_C007"=>   array("nCmp"=>"15.3","posInicio"=>"59", "posFim"=>"59", "leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>" ","valueReplace"=>" ")/*Nao tratado pelo BB informe 0 ou branco*/
            ,"TipoDoc_C008"=>           array("nCmp"=>"16.3","posInicio"=>"60", "posFim"=>"60", "leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>" ","valueReplace"=>" ")/*Nao tratado pelo BB informe 0 ou branco*/
            ,"IdEmiBloqueto_C009"=>     array("nCmp"=>"17.3","posInicio"=>"61", "posFim"=>"61", "leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>" ","valueReplace"=>" ")/*Nao tratado pelo BB informe 0 ou branco*/
            ,"IdDistribuicao_C010"=>    array("nCmp"=>"18.3","posInicio"=>"62", "posFim"=>"62", "leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/*Nao tratado pelo BB informe 0 ou branco*/
            ,"NumDocCobranca_C011"=>    array("nCmp"=>"19.3","posInicio"=>"63", "posFim"=>"77", "leng"=>"15","Dec"=>"", "type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/* Obs no manual pg 9*/
            ,"DataVencTit_C012"=>       array("nCmp"=>"20.3","posInicio"=>"78", "posFim"=>"85", "leng"=>"8", "Dec"=>"", "type"=>"Num",  "Default"=>" ","valueReplace"=>" ")/* Obs no manual pg 9*/
            ,"VlrNominalTit_G070"=>     array("nCmp"=>"21.3","posInicio"=>"86", "posFim"=>"100","leng"=>"13","Dec"=>"2","type"=>"Num",  "Default"=>"", "valueReplace"=>"")/* Obs no manual pg 9*/
            ,"AgEncCobranca_C014"=>     array("nCmp"=>"22.3","posInicio"=>"101","posFim"=>"105","leng"=>"5", "Dec"=>"", "type"=>"Num",  "Default"=>"0","valueReplace"=>"0")/* Obs no manual pg 9*/
            ,"DVAgencia_G009"=>         array("nCmp"=>"23.3","posInicio"=>"106","posFim"=>"106","leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/* Informar esp brancos */
            ,"EspecieTit_C015"=>        array("nCmp"=>"24.3","posInicio"=>"107","posFim"=>"108","leng"=>"2", "Dec"=>"", "type"=>"Num",  "Default"=>"0","valueReplace"=>"0")/* Obs no manual pg 9*/
            ,"IdTitulo_C016"=>          array("nCmp"=>"25.3","posInicio"=>"109","posFim"=>"109","leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>"", "valueReplace"=>"")/* Obs no manual pg 9*/
            ,"DataEmitTit_G071"=>       array("nCmp"=>"26.3","posInicio"=>"110","posFim"=>"117","leng"=>"8", "Dec"=>"", "type"=>"Alpha","Default"=>"", "valueReplace"=>"")/* Obs no manual pg 9*/            
            ,"CodJurosMora_C018"=>      array("nCmp"=>"27.3","posInicio"=>"118","posFim"=>"118","leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"")/* Obs no manual pg 10*/
            ,"DataJurosMora_C019"=>     array("nCmp"=>"28.3","posInicio"=>"119","posFim"=>"126","leng"=>"8", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"")/* Obs no manual pg 10*/
            ,"JurosMoraDiaTx_C020"=>    array("nCmp"=>"29.3","posInicio"=>"127","posFim"=>"141","leng"=>"13","Dec"=>"2","type"=>"Num",  "Default"=>"", "valueReplace"=>"")/* Obs no manual pg 10*/
            ,"CodDesconto1_C021"=>      array("nCmp"=>"30.3","posInicio"=>"142","posFim"=>"142","leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>"0","valueReplace"=>"0")/* Obs no manual pg 10*/
            ,"DataDesconto1_C022"=>     array("nCmp"=>"31.3","posInicio"=>"143","posFim"=>"150","leng"=>"8", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"0")/* Obs no manual pg 10*/
            ,"PercentDesconto1_C023"=>  array("nCmp"=>"32.3","posInicio"=>"151","posFim"=>"165","leng"=>"13","Dec"=>"2","type"=>"Num",  "Default"=>"", "valueReplace"=>"0")/* Obs no manual pg 10*/
            ,"IOFRecolhido_C024"=>      array("nCmp"=>"33.3","posInicio"=>"166","posFim"=>"180","leng"=>"13","Dec"=>"2","type"=>"Num",  "Default"=>"", "valueReplace"=>"0")/* Obs no manual pg 10*/
            ,"ValorAbatimento_G045"=>   array("nCmp"=>"34.3","posInicio"=>"181","posFim"=>"195","leng"=>"13","Dec"=>"2","type"=>"Num",  "Default"=>"", "valueReplace"=>"0")/* Obs no manual pg 10*/
            ,"IdTituloEmpresa_G072"=>   array("nCmp"=>"35.3","posInicio"=>"196","posFim"=>"220","leng"=>"25","Dec"=>"", "type"=>"Alpha","Default"=>"", "valueReplace"=>"0")/* Obs no manual pg 10*/
            ,"CodProtesto_C026"=>       array("nCmp"=>"36.3","posInicio"=>"221","posFim"=>"221","leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"0")/* Obs no manual pg 10*/
            ,"NumDiasProtesto_C027"=>   array("nCmp"=>"37.3","posInicio"=>"222","posFim"=>"223","leng"=>"2", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"0")/* Vinculo com o campo C026*/
            ,"CodBaixa_C028"=>          array("nCmp"=>"38.3","posInicio"=>"224","posFim"=>"224","leng"=>"1", "Dec"=>"", "type"=>"Num",  "Default"=>"0","valueReplace"=>"0")/* O BB prenche conforme cadastro da empresa*/            
            ,"NumDiasBaixaDev_C029"=>   array("nCmp"=>"39.3","posInicio"=>"225","posFim"=>"227","leng"=>"3", "Dec"=>"", "type"=>"Num",  "Default"=>"0","valueReplace"=>"0")/* O BB prenche conforme cadastro da empresa*/            
            ,"CodMoeda_G065"=>          array("nCmp"=>"40.3","posInicio"=>"228","posFim"=>"229","leng"=>"2", "Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"")/* O BB prenche conforme cadastro da empresa*/            
            ,"NumContratoOpCred_C030"=> array("nCmp"=>"41.3","posInicio"=>"230","posFim"=>"239","leng"=>"10","Dec"=>"", "type"=>"Num",  "Default"=>"", "valueReplace"=>"")/* O BB prenche conforme cadastro da empresa*/            
            ,"FEBRABAN2_G004"=>         array("nCmp"=>"42.3","posInicio"=>"240","posFim"=>"240","leng"=>"1", "Dec"=>"", "type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/* espaços em branco*/            
        );
//@todo seguimentoQ
$SeguimentoQ = 
        array(
            "CodBancoComp_G001"=>        array("nCmp"=>"1.3","posInicio"=>"1","posFim"=>"3","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"001","valueReplace"=>"0") /* 001 Banco do brasil*/
            ,"LoteServico_G002"=>        array("nCmp"=>"2.3","posInicio"=>"4","posFim"=>"7","leng"=>"4","Dec"=>"","type"=>"Num","Default"=>"0000","valueReplace"=>"0")            
            ,"TipoRegistro_G003"=>       array("nCmp"=>"3.3","posInicio"=>"8","posFim"=>"8","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"3","valueReplace"=>"")
            ,"NumSeqRegLote_G038"=>      array("nCmp"=>"3.3","posInicio"=>"9","posFim"=>"13","leng"=>"5","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"0")
            ,"CodSegRegDetalhe_G039"=>   array("nCmp"=>"3.3","posInicio"=>"14","posFim"=>"14","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>"P","valueReplace"=>"")
            ,"FEBRABAN1_G004"=>          array("nCmp"=>"6.3","posInicio"=>"15","posFim"=>"15","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ") /* espaços em branco*/            
            ,"CodMovRemessa_C004"=>      array("nCmp"=>"7.3","posInicio"=>"16","posFim"=>"17","leng"=>"2","Dec"=>"","type"=>"Num","Default"=>"P","valueReplace"=>"")            
            ,"tpPessoa_G005"=>           array("nCmp"=>"8.3","posInicio"=>"18","posFim"=>"18","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"2","valueReplace"=>"0")    /* 1-PF 2-PJ */
            ,"tpPessoaNum_G006"=>        array("nCmp"=>"9.3","posInicio"=>"19","posFim"=>"33","leng"=>"15","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"0")
            ,"Nome_G013"=>               array("nCmp"=>"10.3","posInicio"=>"34","posFim"=>"73","leng"=>"40","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>"0")      /*São tratadas somente 37 posições, da posição 34 a 70.*/
            ,"Endereco_G032"=>           array("nCmp"=>"11.3","posInicio"=>"74","posFim"=>"113","leng"=>"40","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ") /* Endereco completo somente quando o banco envia os boletos*/
            ,"Bairro_G032"=>             array("nCmp"=>"12.3","posInicio"=>"114","posFim"=>"128","leng"=>"15","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>"0")  /*Tratados somente 12 posicoes 114 a 125*/
            ,"CEP_G032"=>                array("nCmp"=>"13.3","posInicio"=>"129","posFim"=>"133","leng"=>"5","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"")  /* Cep valido ou sera recusado */
            ,"SufixoCEP_G034"=>          array("nCmp"=>"14.3","posInicio"=>"134","posFim"=>"136","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"")  /**/
            ,"Cidade_G033"=>             array("nCmp"=>"15.3","posInicio"=>"137","posFim"=>"151","leng"=>"15","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>"")  /**/
            ,"UF_G036"=>                 array("nCmp"=>"16.3","posInicio"=>"152","posFim"=>"153","leng"=>"2","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>"")  /**/            
            ,"TipoInsc_G005"=>           array("nCmp"=>"17.3","posInicio"=>"154","posFim"=>"154","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"0","valueReplace"=>"0")  /* So quando o cedente original do titulo for outro,*/
            ,"NumInscricao_G006"=>       array("nCmp"=>"18.3","posInicio"=>"155","posFim"=>"169","leng"=>"15","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"")/* Caso nao haja sacador/avalista (0) ou (branco)*/
            ,"NomeSacadorAvalista_G013"=>array("nCmp"=>"19.3","posInicio"=>"170","posFim"=>"209","leng"=>"40","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>"")/*Tratados21Posicoes default(0) ou (brancos). se informado nao podera utilizar Mensagem1 ou 3 */
            ,"CodBcoCompesacao_C031"=>   array("nCmp"=>"20.3","posInicio"=>"210","posFim"=>"212","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"0","valueReplace"=>"0")/* Nao tratato informar 0*/
            ,"NossoNumBancoCorresp_C032"=>array("nCmp"=>"21.3","posInicio"=>"213","posFim"=>"232","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/* Nao tratato informar 0*/
            ,"FEBRABAN2_G004"=>           array("nCmp"=>"22.3","posInicio"=>"233","posFim"=>"240","leng"=>"8","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/* espaços em branco*/
        );
//@todo Trailer do lote
$TrailerLote= array(
            "CodBancoComp_G001"=>       array("nCmp"=>"1.5","posInicio"=>"1", "posFim"=>"3",  "leng"=>"3",  "Dec"=>"","type"=>"Num",  "Default"=>"001", "valueReplace"=>"0")
            ,"LoteServico_G002"=>       array("nCmp"=>"2.5","posInicio"=>"4", "posFim"=>"7",  "leng"=>"4",  "Dec"=>"","type"=>"Num",  "Default"=>"0000","valueReplace"=>"0")
            ,"TipoRegistro_G003"=>      array("nCmp"=>"3.5","posInicio"=>"8", "posFim"=>"8",  "leng"=>"1",  "Dec"=>"","type"=>"Num",  "Default"=>"5",   "valueReplace"=>"5")
            ,"FEBRABAN1_G004"=>         array("nCmp"=>"4.5","posInicio"=>"9", "posFim"=>"17", "leng"=>"9",  "Dec"=>"","type"=>"Alpha","Default"=>"",    "valueReplace"=>" ")
            ,"QtdeRegistLote_G057"=>    array("nCmp"=>"5.5","posInicio"=>"18","posFim"=>"23", "leng"=>"6",  "Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"")            
            ,"FEBRABAN2_G004"=>         array("nCmp"=>"6.5","posInicio"=>"24","posFim"=>"240","leng"=>"217","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")
);
//@todo Trailer do arquivo
$TrailerArquivo= array(
            "CodBancoComp_G001"=>       array("nCmp"=>"1.9","posInicio"=>"1", "posFim"=>"3",  "leng"=>"3",  "Dec"=>"","type"=>"Num",  "Default"=>"001", "valueReplace"=>"0")
            ,"LoteServico_G002"=>       array("nCmp"=>"2.9","posInicio"=>"4", "posFim"=>"7",  "leng"=>"4",  "Dec"=>"","type"=>"Num",  "Default"=>"9999","valueReplace"=>"0")
            ,"TipoRegistro_G003"=>      array("nCmp"=>"3.9","posInicio"=>"8", "posFim"=>"8",  "leng"=>"1",  "Dec"=>"","type"=>"Num",  "Default"=>"9",   "valueReplace"=>"5")
            ,"FEBRABAN1_G004"=>         array("nCmp"=>"4.9","posInicio"=>"9", "posFim"=>"17", "leng"=>"9",  "Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")
            ,"QtdeLoteArquivo_G049"=>   array("nCmp"=>"5.9","posInicio"=>"18","posFim"=>"23", "leng"=>"6",  "Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"0")            
            ,"QtdeRegistArquivo_G056"=> array("nCmp"=>"6.9","posInicio"=>"24","posFim"=>"29", "leng"=>"6",  "Dec"=>"","type"=>"Num",  "Default"=>"",    "valueReplace"=>"")/* Numero de linhas do arquivo pg25 manual*/
            ,"FEBRABAN2_G004"=>         array("nCmp"=>"7.9","posInicio"=>"36","posFim"=>"240","leng"=>"205","Dec"=>"","type"=>"Alpha","Default"=>" ",   "valueReplace"=>" ")
);
