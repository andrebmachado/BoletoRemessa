<?php
class dataSource{
    private $fieldName;
    //private $Value;
    private $dataSet;
    private $State="dsInactive";
    private $lineArray=[];
    private $lineString;
    private $fileGenerate;
    private $castType;
    private $QtdeRegsArquivo_G056;
    private $QtdeRegistLote_G057;
    private $QtdeRegsArquivo_G056_Tot;
    private $QtdeRegistLote_G057_Tot;
    
    public function getFieldName(){
        return $this->fieldName;
    }

    private function Exception($aMsg){
        try {                                
            throw new Exception($aMsg);                        
        } catch (Exception $e) {
            echo '<pre>Exception: ',  $e->getMessage();//," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";                                 
        }           
    }
    public function __construct(){
        $this->fileGenerate = new fileGenerate();
    }
    public function getLineArray(){
        return $this->lineArray;
    }
    public function getLineStr(){
        return $this->lineString;
    }
    private function returnMsg($status=True,$msg="success"){
        return $return = array("status"=>$status,"msg"=>$msg);
    }
    public function Append($params = []){        
        //var_dump($params);
        $this->QtdeRegsArquivo_G056++;
        if(empty($params)){            
            $this->Exception("Informe o dataset");
        }else{
            $this->dataSet = $params;
        }        
        
        if($this->State == "dsInactive"){
             $this->State = "dsInsert";
             return True;
        }else{                      
            $this->Exception("Dataset em modo de inserção, de um post() antes de iniciar nova linha.");
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
            //Soma quantidade de registros do arquivo conforma o tipo 0,1,3,5,9
            if($fieldName=='QtdeRegistArquivo_G056'){
                $fieldValue = $this->QtdeRegsArquivo_G056;
                //debug echo $fieldName."=".$fieldValue."<br>";
            }
            //Soma quantidade de lotes do arquivo conforma o tipo 1,3,4,5
            if($fieldName=='TipoRegistro_G003' and $fieldValue>=1 and $fieldValue<=5){
                $this->QtdeRegistLote_G057++;                 
            }else if($fieldName=='QtdeRegistLote_G057'){
                $fieldValue = $this->QtdeRegistLote_G057;
                //echo $fieldName."=".$fieldValue."<br>";
            }
            if(array_key_exists($fieldName, $this->dataSet)){
                $this->castType = new castType($this->dataSet[$fieldName]);
                //$this->fieldName = "Field: ".$fieldName;
                if($this->castType->value($fieldValue)['status']){
                    $this->lineArray[$fieldName]=$this->castType->value($fieldValue)['retorno'];      
                    $this->lineString .= $this-> castType->value($fieldValue)['retorno'];
                }
            }else{        
                $words  = array_keys($this->dataSet);
                $msg = "Campo ".$fieldName." inexistente, o mais proximo seria o campo ".$this->wordMatch($words, $fieldName, 2);
                $this->Exception($msg);
                return $msg;
            }
    }
    public function getQtdeRegsArquivo_G056(){
        return $this->QtdeRegsArquivo_G056;
    }
    public function getQtdeRegistLote_G057(){
        return $this->QtdeRegistLote_G057;
    }
    
    public function post(){
        $this->lineString .= "\n";
        $this->State = "dsInactive";
        $this->dataSet=array();
        //var_dump($this->dataSet);
    }
    public function saveToFile($filename=""){        
        if($filename===""){
           $filename = "remessa/".date('Ymd').".txt"; 
        }        
        try {                
            if(($f=fopen($filename, 'w'))){
                fwrite($f, $this->lineString);
            }else{
                throw new Exception("Falha ao gerar o arquivo!");
            }
        } catch (Exception $e) {
            echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";                         
            return False;
        } finally {            
            fclose($f);
            return true;
        }        
    }
    
}