<?php

//NomeDoCampo['NumeroCampo','Nome_Codigo','Valor','PosInicial','PosFinal','Tamanho','Decimal','TipoCampo','Default']

$dataSet = 
        array(
            "CodBancoComp_G001"=>array("nCmp"=>"1.0","posInicio"=>"1","posFim"=>"3","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"001")
            ,"LoteServico_G002"=>array("nCmp"=>"2.0","posInicio"=>"4","posFim"=>"7","leng"=>"4","Dec"=>"","type"=>"Num","Default"=>"0000")
            ,"TipoRegistro_G003"=>array("nCmp"=>"3.0","posInicio"=>"8","posFim"=>"8","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"0")
            ,"FEBRABAM_G004"=>array("nCmp"=>"4.0","posInicio"=>"9","posFim"=>"17","leng"=>"9","Dec"=>"","type"=>"Alpha","Default"=>"")
            ,"tpPessoa_G005"=>array("nCmp"=>"5.0","posInicio"=>"18","posFim"=>"18","leng"=>"1","Dec"=>"","type"=>"Numeric","Default"=>"2")
            ,"tpPessoaNum_G006"=>array("nCmp"=>"6.0","posInicio"=>"19","posFim"=>"32","leng"=>"14","Dec"=>"","type"=>"Numeric","Default"=>"")
            ,"ConvBanco_G007"=>array("nCmp"=>"7.1.0","posInicio"=>"33","posFim"=>"52","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>"")
            ,"ConvBanco_G008"=>array("nCmp"=>"7.2.0","posInicio"=>"33","posFim"=>"52","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>"")
        );  

//$dataSourse=array(
//    "CodBancoComp_G001"=>"0001"
//    ,"LoteServico_G002"=>""
//    ,"TipoRegistro_G003"=>""
//    ,"FEBRABAM_G004"=>""
//    ,"tpPessoa_G005"=>""
//    ,"tPessoaNum_G006"=>""
//    ,"ConvBanco_G007"=>""
//    ,"ConvBanco_G008"=>""
//);


class dataSource{
    private $fieldName;
    private $Value;
    private $dataSet;
    private $State="dsInactive";
    private $Stack=[];
    
    
    public function __construct($params = []){
        if(empty($params)){
            throw new Exception("Informe o dataSet");
        }else{
            $this->dataSet = $params;
        }
    }
    
    public function Append(){
        if($this->State == "dsInactive"){
            $this->State = "dsInsert";
        }else{                      
            try {                
                throw new Exception("Insert-mode Dataset");
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage()," <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"\n";
            }            
            
        }        
    }
    
    
    
    
    public function teste(){
        //var_dump($this->dataSet);
        //echo $this->State;        
    }
        
}
    

$teste = new dataSource($dataSet);
print $teste->Append();    
print $teste->Append();    
print $teste->teste();    
