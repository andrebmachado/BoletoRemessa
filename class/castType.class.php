<?php
include_once 'dataSource.class.php';
class castType extends dataSource{
    private $aValue;
    private $aValueResult = array("status"=>false,"retorno"=>null);
    private $params = [];
    
    public function __construct($params=[]){
        $this->params = $params;
        //var_dump($params);
    }    
    private function isNumeric(){
        $leng = $this->params['leng'];
        if($this->params['Dec']==2){
            $leng = $this->params['leng'] +2;
        }           
        return str_pad($this->aValue, $leng,"0",STR_PAD_LEFT);
    }
    private function isString(){
        return str_pad($this->aValue, $this->params['leng']," ",STR_PAD_RIGHT);
    }     
    private function checkType(){
        try {
            $this->aValue = substr($this->aValue,0, $this->params['leng']);
            if(strlen($this->aValue)>$this->params['leng']){                
                throw new Exception("Valor informado maior que o campo!");
            }
//            if(strlen($this->aValue)<$this->params['leng']){                
//                throw new Exception("Valor informado menor que o campo!");
//            }            
        } catch (Exception $e) {
            echo '<pre>Caught exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";
            exit; 
        }         
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