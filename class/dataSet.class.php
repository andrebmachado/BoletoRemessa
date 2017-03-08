<?php

$hederArquivo = 
        array(
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
$headerArquivo = 
        array(
            "CodBancoComp_G001"=>array("nCmp"=>"1.1","posInicio"=>"1","posFim"=>"3","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"001","valueReplace"=>"0")/* 001 Banco do brasil*/
            ,"LoteServico_G002"=>array("nCmp"=>"2.1","posInicio"=>"4","posFim"=>"7","leng"=>"4","Dec"=>"","type"=>"Num","Default"=>"0000","valueReplace"=>"0")
            ,"TipoRegistro_G003"=>array("nCmp"=>"3.1","posInicio"=>"8","posFim"=>"8","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"1","valueReplace"=>"0")
            ,"TipoOperacao_G028"=>array("nCmp"=>"4.1","posInicio"=>"9","posFim"=>"9","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>"R","valueReplace"=>"")/*R-Remessa/T-Retorno*/
            ,"TipoServico_G025"=>array("nCmp"=>"5.1","posInicio"=>"10","posFim"=>"11","leng"=>"2","Dec"=>"","type"=>"Num","Default"=>"01","valueReplace"=>"")
            ,"FEBRABAM4_G004"=>array("nCmp"=>"6.1","posInicio"=>"12","posFim"=>"13","leng"=>"2","Dec"=>"","type"=>"Alpha","Default"=>"  ","valueReplace"=>" ")/* espaços em branco*/
            ,"LayoutArquivo_G030"=>array("nCmp"=>"7.1","posInicio"=>"14","posFim"=>"16","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"000","valueReplace"=>"0")/* */
            ,"FEBRABAM5_G004"=>array("nCmp"=>"8.1","posInicio"=>"17","posFim"=>"17","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/* espaços em branco*/
            ,"tpPessoa_G005"=>array("nCmp"=>"9.1","posInicio"=>"18","posFim"=>"18","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"2","valueReplace"=>"0")/* 1-PF 2-PJ */
            ,"tpPessoaNum_G006"=>array("nCmp"=>"10.1","posInicio"=>"19","posFim"=>"33","leng"=>"15","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"0")
            ,"ConvBanco_G007"=>array("nCmp"=>"11.1","posInicio"=>"34","posFim"=>"53","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>"","valueReplace"=>" ")            
            ,"NumAgencia_G008"=>array("nCmp"=>"12.1","posInicio"=>"54","posFim"=>"58","leng"=>"5","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"0")            
            ,"DVAgencia_G009"=>array("nCmp"=>"13.1","posInicio"=>"59","posFim"=>"59","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>"X","valueReplace"=>"")            
            ,"NumContaC_G010"=>array("nCmp"=>"14.1","posInicio"=>"60","posFim"=>"71","leng"=>"12","Dec"=>"","type"=>"Num","Default"=>"","valueReplace"=>"0")
            ,"DVConta_G011"=>array("nCmp"=>"15.1","posInicio"=>"72","posFim"=>"72","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>"X","valueReplace"=>"") /*se informar X maiusculo*/            
            ,"DVAgConta_G012"=>array("nCmp"=>"16.1","posInicio"=>"73","posFim"=>"73","leng"=>"1","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ")     /*Se BB informar branco*/
            ,"NomeEmpresa_G013"=>array("nCmp"=>"17.1","posInicio"=>"74","posFim"=>"103","leng"=>"30","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ")             
            ,"Mensagem1_C073"=>array("nCmp"=>"18.1","posInicio"=>"104","posFim"=>"143","leng"=>"40","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ") 
            ,"Mensagem2_C073"=>array("nCmp"=>"19.1","posInicio"=>"144","posFim"=>"183","leng"=>"40","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ") 
            ,"NumRemRet_G079"=>array("nCmp"=>"20.1","posInicio"=>"184","posFim"=>"191","leng"=>"8","Dec"=>"","type"=>"Num","Default"=>" ","valueReplace"=>" ") 
            ,"DataGravRemRet_G068"=>array("nCmp"=>"21.0","posInicio"=>"192","posFim"=>"199","leng"=>"8","Dec"=>"","type"=>"Num","Default"=>"0","valueReplace"=>"")/*DDMMAAAA nao obrigatorio informar zeros*/
            ,"DataCredito_C003"=>array("nCmp"=>"21.0","posInicio"=>"200","posFim"=>"207","leng"=>"8","Dec"=>"","type"=>"Num","Default"=>"        ","valueReplace"=>" ")/*DDMMAAAA nao obrigatorio informar zeros*/
            ,"FEBRABAM5_G004"=>array("nCmp"=>"22.1","posInicio"=>"208","posFim"=>"240","leng"=>"33","Dec"=>"","type"=>"Alpha","Default"=>" ","valueReplace"=>" ")/* espaços em branco*/            
        );
$SeguimentoP = 
        array(
            "CodBancoComp_G001"=>array("nCmp"=>"1.1","posInicio"=>"1","posFim"=>"3","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"001","valueReplace"=>"0")/* 001 Banco do brasil*/
            ,"LoteServico_G002"=>array("nCmp"=>"2.1","posInicio"=>"4","posFim"=>"7","leng"=>"4","Dec"=>"","type"=>"Num","Default"=>"0000","valueReplace"=>"0")
            
            ,"TipoRegistro_G003"=>array("nCmp"=>"3.1","posInicio"=>"8","posFim"=>"8","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"1","valueReplace"=>"0")
            
        );