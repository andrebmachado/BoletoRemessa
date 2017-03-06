<?php
include_once 'fileGenerate.php';
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

class dataSource{
    private $fieldName;
    private $Value;
    private $dataSet;
    private $State="dsInactive";
    private $lineArray=[];
    private $lineString;
    private $fileGenerate;
    
    public function getLine(){
        return $this->lineArray;
    }

    public function __construct($params = []){
        if(empty($params)){
            throw new Exception("Informe o dataSet");
        }else{
            $this->dataSet = $params;
        }
        $this->fileGenerate = new fileGenerate();
           
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
            
    private function wordMatch($words, $input, $sensitivity){ 
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
            
    public function changeType($fieldName,$fieldValue){
        //return $this->dataSet[$fieldName];
        if($this->dataSet[$fieldName]['type']=='Num'){
            $msg = $this->dataSet[$fieldName]['type'];
            return $msg;
        }
    }
            //Se o campo informado existir sera adicionado ou retornara
            //uma msg de erro sugerindo o nome mais proximo conforme func. wordMath
    public  function addField($field,$value){    
                if(array_key_exists($field, $this->dataSet)){
                    $this->lineArray[$field]=$value;                    
                }else{        
                    $words  = array_keys($this->dataSet);
                    $msg = "Campo ".$field." inexistente, o mais proximo seria o campo ".$this->wordMatch($words, $field, 2);
                    return $msg;
                }
            }        
}

$teste = new dataSource($dataSet);
print $teste->Append();        
$teste->addField("CodBancoComp_G001", "9999");
$teste->addField("LoteServico_G002", "0000");
$teste->addField("TipoRegistro_G003", "0");
$teste->addField("tpPessoa_G005", "0s");

var_dump($teste->getLine());
echo "<hr>";

//echo "<pre>";
//print_r($teste->changeType("CodBancoComp_G001","321321"));

$str = str_pad("", 240, "-");

echo $str;