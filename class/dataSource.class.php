<?php
include_once 'fileGenerate.class.php';
include_once 'castType.class.php';
include_once 'dataSet.class.php';

class dataSource{
    private $fieldName;
    //private $Value;
    private $dataSet;
    private $State="dsInactive";
    private $lineArray=[];
    private $lineString;
    private $fileGenerate;
    private $castType;
    
    public function __construct($params = []){
        if(empty($params)){
            throw new Exception("Informe o dataSet");
        }else{
            $this->dataSet = $params;
        }
        $this->fileGenerate = new fileGenerate();
    }
    public function getLineArray(){
        return $this->lineArray;
    }
    public function getLineStr(){
        return $this->lineString;
    }
    public function returnMsg($status=True,$msg="success"){
        return $return = array("status"=>$status,"msg"=>$msg);
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
    //Sugere um campo se o informado nao corresponder aos index existentes
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
    public  function addField($fieldName,$fieldValue){    
        if(array_key_exists($fieldName, $this->dataSet)){
            $this->castType = new castType($this->dataSet[$fieldName]);
            if($this->castType->value($fieldValue)['status']){
                $this->lineArray[$fieldName]=$this->castType->value($fieldValue)['retorno'];      
                $this->lineString .= $this->castType->value($fieldValue)['retorno'];
            }
        }else{        
            $words  = array_keys($this->dataSet);
            $msg = "Campo ".$fieldName." inexistente, o mais proximo seria o campo ".$this->wordMatch($words, $fieldName, 2);
            return $msg;
        }
    }
    public function post(){
        $this->lineString .= "\n";
    }
}

$teste = new dataSource($dataSet);
print $teste->Append();        
$teste->addField("CodBancoComp_G001", "2");
$teste->addField("LoteServico_G002", "3");
$teste->post();
$teste->addField("CodBancoComp_G001", "2");
$teste->addField("LoteServico_G002", "3");

var_dump($teste->getLineStr());


//$teste->addField("LoteServico_G002", "0000");
//$teste->addField("TipoRegistro_G003", "0");
//$teste->addField("tpPessoa_G005", "0s");



exit;
//echo "<pre>";
//print_r($teste->fixType("CodBancoComp_G001","321321"));


//$str = str_pad("", 100, "0");
$str = "00000000010000000001";
$sb1 = "bob";
$sb2 = "99999";

echo "<br>";

$str = substr_replace($str,$sb1,4,strlen($sb1));
$str = substr_replace($str,$sb2,1,strlen($sb2));


echo $str."<br>";
echo strlen($str);


