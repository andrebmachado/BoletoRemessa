<?php

//NomeDoCampo['NumeroCampo','Nome_Codigo','Valor','PosInicial','PosFinal','Tamanho','Decimal','TipoCampo','Default']

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

function addField($field,$value,$dataSet){    
    if(array_key_exists($field, $dataSet)){
        $dataSet[$field]["value"]=$value;
        return $dataSet[$field];
    }else{        
        $words  = array_keys($dataSet);
        $msg = "Campo ".$field." inexistente, o mais proximo seria o campo ".wordMatch($words, $field, 2);
        echo $msg;
    }
}

addField("ConvBanco_G007", "JURIDICA", $dataSet);

class dataSource{
    private $fieldName;
    private $Value;
    private $dataSet;
    private $State="dsInactive";
    private $Line=[];
    


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
                echo '<pre>Caught exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";
            }            
        }        
    }
    public function addField($fieldName){
        
    }


    
    
//    public function addField($nome, $pos_start, $pos_end, $format, $default, $options)
//    {
//        foreach ($this->fields as $key => $field) {
//            $current_pos_start = $field->pos_start;
//            $current_pos_end = $field->pos_end;
//
//            if (($pos_start >= $current_pos_start && $pos_start <= $current_pos_end) ||
//                 ($pos_end <= $current_pos_end && $pos_end >= $current_pos_start) ||
//                 ($current_pos_start >= $pos_start && $current_pos_start <= $pos_end) ||
//                 ($current_pos_end <= $pos_end && $current_pos_end >= $pos_start)) {
//                unset($this->fields[$key]);
//            }
//        }
//
//        $this->fields[$nome] = new Field($this, $nome, $format, $pos_start, $pos_end, $options);
//        if ($default !== false) {
//            $this->fields[$nome]->set($default);
//        }
//    }    
    
    
    public function teste(){
        //var_dump($this->dataSet);
        //echo $this->State;        
    }
        
}
    

$teste = new dataSource($dataSet);
print $teste->Append();    
//print $teste->Append();    
print $teste->teste();    
