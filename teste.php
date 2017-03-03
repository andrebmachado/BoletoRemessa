<?php


//class changeType{
//    private $fieldName;
//    private $value;   
//    
//    public function AsString($param){
//        $this->value = str_pad($param, 10, "-=", STR_PAD_LEFT); 
//        return $this->property1;
//    }    
//    
//    
//}
//
//class SubMain{
//    private $property2;
//    private $FieldName;
//    private $keyValue;
//    
//    public function __construct() {
//        $this->property2 = new changeType();
//    }        
//    public function fieldByName($fieldName){
//        $this->FieldName = $fieldName;
//        return $this->property2;
//    }
//    private function _add(){
//        
//    }
//    
//}
//
//$x = new SubMain();
////var_dump($x->fieldByName("CampoX")->getProperty1());


$dataSet = 
        array(
            "CodBancoComp_G001"=>array("nCmp"=>"1.0","posInicio"=>"1","posFim"=>"3","leng"=>"3","Dec"=>"","type"=>"Num","Default"=>"001","value"=>"")
            ,"LoteServico_G002"=>array("nCmp"=>"2.0","posInicio"=>"4","posFim"=>"7","leng"=>"4","Dec"=>"","type"=>"Num","Default"=>"0000","value"=>"")
            ,"TipoRegistro_G003"=>array("nCmp"=>"3.0","posInicio"=>"8","posFim"=>"8","leng"=>"1","Dec"=>"","type"=>"Num","Default"=>"0","value"=>"")
            ,"FEBRABAM_G004"=>array("nCmp"=>"4.0","posInicio"=>"9","posFim"=>"17","leng"=>"9","Dec"=>"","type"=>"Alpha","Default"=>"","value"=>"")
            ,"tpPessoa_G005"=>array("nCmp"=>"5.0","posInicio"=>"18","posFim"=>"18","leng"=>"1","Dec"=>"","type"=>"Numeric","Default"=>"2","value"=>"")
            ,"tpPessoaNum_G006"=>array("nCmp"=>"6.0","posInicio"=>"19","posFim"=>"32","leng"=>"14","Dec"=>"","type"=>"Numeric","Default"=>"","value"=>"")
            ,"ConvBanco_G007"=>array("nCmp"=>"7.1.0","posInicio"=>"33","posFim"=>"52","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>"","value"=>"")
            ,"ConvBanco_G008"=>array("nCmp"=>"7.2.0","posInicio"=>"33","posFim"=>"52","leng"=>"20","Dec"=>"","type"=>"Alpha","Default"=>"","value"=>"")
        );

function wordMatch($words, $input, $sensitivity){ 
    $shortest = -1; 
    foreach ($words as $word) {             
        //verifica a similaridade entre palavras
        $lev = levenshtein($input, $word); 
        if ($lev == 0) { 
            $closest = $word; 
            $shortest = 0; 
            break; 
        } 
        if ($lev <= $shortest || $shortest < 0) { 
            $closest  = $word; 
            $shortest = $lev; 
        } 
    } 
    if($shortest <= $sensitivity){ 
        return $closest; 
    } else { 
        return 0; 
    } 
}
$word = 'CodncoComp_G001'; 
$words  = array_keys($dataSet);
echo wordMatch($words, $word, 2);
