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


class castType{
    private $aValue;
    private $aValueResult = array("status"=>false,"retorno"=>null);
    private $params = [];
    public function __construct($params=[]){
        $this->params = $params;
        //var_dump($params);
    }
    private function isNumeric(){
        return str_pad($this->aValue, $this->params['leng'],"0",STR_PAD_LEFT);
    }
    private function isString(){
        return str_pad($this->aValue, $this->params['leng']," ",STR_PAD_RIGHT);
    }     
    private function checkType(){
        try {
            if(strlen($this->aValue)>$this->params['leng']){ 
                throw new Exception("Valor informado maior que o campo!");
            }
        } catch (Exception $e) {
            echo '<pre>Caught exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";
        }
        
//        if(strlen($this->aValue)>$this->params['leng']){ 
//            return $this->aValueResult("false","Valor informado maior que o campo!");
//        }
        if(empty($this->aValue)||!empty($this->params['Default'])){
            $this->aValueResult['status'] = True;
            $this->aValueResult['retorno']= $this->params['Default'];            
        }
        if(!empty($this->aValue)){
            $this->aValueResult['status'] = True;
            $this->aValueResult['retorno']= $this->aValue;            
        }
    }
    public function value($fieldValue){
        $this->aValue = $fieldValue;
        $this->checkType();
        if($this->params['type']==="Num"){
          $this->aValueResult['status']=True;
          $this->aValueResult['retorno']=$this->isNumeric();  
        }
        if($this->params['type']=="Alpha"){
          $this->aValueResult['status']=True;
          $this->aValueResult['retorno']=$this->isString();  
        }        
        //var_dump($this->aValueResult);
        return $this->aValueResult;
    }
}

//$x = array("nCmp"=>"4.0","posInicio"=>"9","posFim"=>"17","leng"=>"9","Dec"=>"","type"=>"Alpha","Default"=>"","value"=>"");
//$test = new castType($x);
//var_dump($test->value("2"));
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
    public function getLine(){
        return $this->lineArray;
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
            try {
                if($this->castType->value($fieldValue)['status']){
                    $this->lineArray[$fieldName]=$this->castType->value($fieldValue)['retorno'];
                }else{
                     throw new Exception("zica virus"); tratar excecao aqui para informar o campo do erro
                }
            } catch (Exception $e) {
                echo '<pre>Caught exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";
            } 
            
                      
        }else{        
            $words  = array_keys($this->dataSet);
            $msg = "Campo ".$fieldName." inexistente, o mais proximo seria o campo ".$this->wordMatch($words, $fieldName, 2);
            return $msg;
        }
    }        
}

$teste = new dataSource($dataSet);
print $teste->Append();        
$teste->addField("CodBancoComp_G001", "2222");
$teste->addField("LoteServico_G002", "3");
var_dump($teste->getLine());


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


