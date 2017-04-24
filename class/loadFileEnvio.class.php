<?php
//$number = "1299";
//echo $n = substr($number, 0,-2).",".substr($number, -2);
//exit;

//include_once 'dataSet.class.php';

class loadFile{  
    private $dataSetP=[];
    private $dataSetQ=[];
    private $dataSetT=[];
    private $dataSetU=[];
    private $table=[];
    private $fileName;
    private $ponteiro;
    private $linhaArquivo;  
    private $arr;
    
    public function __construct($params=[]){
        $this->dataSetP = $params['SeguimentoP'];
        $this->dataSetQ = $params['SeguimentoQ'];
        $this->dataSetT = $params['SeguimentoT'];
        $this->dataSetU = $params['SeguimentoU'];
        //var_dump($this->dataSetQ);
    }
    public function loadFile($fileName){
        $this->fileName = $fileName;        
        if(file_exists($this->fileName)){
            $this->ponteiro = fopen ($this->fileName,"r");                    
        while(!feof($this->ponteiro)){
            $this->linhaArquivo = fgets($this->ponteiro,4096);
            $this->splitLine();
        }     
        } else {
            echo "Arquivo ".$this->fileName." nao encontrado.";
        }
        //fclose($this->fileName);
    } 
    
    /*
     * Verifica se existe uma chave/valor no array
     * @param $array onde buscar
     * @param $chave que esta buscado
     * @param $valor par da $chave que esta buscando
     */
    public function findKeyValue_Array($array,$chave,$valor){                
        foreach ($array as $key => $value) {
            if(($key==$chave) and ($value==$valor)){
                return true;            
            }else{
                return false;
            }
        }
    }              
    public function separaDecimal($str,$nDecimal=2,$separador=","){
        return substr($str, 0,-$nDecimal).$separador.substr($str, -$nDecimal);
    }    
    private function splitLine(){
        if(substr($this->linhaArquivo ,13, 1)=="P"){
            $this->arr="";
        }
        if(substr($this->linhaArquivo ,13, 1)=="P"){            
            //Percorre o datasetP para splitar os campos
            foreach ($this->dataSetP as $key => $value){                
                if($value['Dec']!=0){//Verifica se o campo tem decimal e coloca virgula
                    $campo = $this->separaDecimal(substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']), 2, ",");
                } else {
                    $campo = $this->arr[$key] = substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']);                    
                }
                $this->arr[$key] = $campo;                
            }
            $this->table[] = $this->arr;
        }
        if(substr($this->linhaArquivo ,13, 1)=="Q"){
            //Percorre o datasetQ para splitar os campos
            foreach ($this->dataSetQ as $key => $value) {
                if($value['Dec']!=0){
                    $campo = $this->separaDecimal(substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']));                    
                } else {
                    $campo = $this->arr[$key] = substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']);
                }
                /*if($key==='CodSegRegDetalhe_G039'){
                    $campo="P e Q";
                }           
                if($this->findKeyValue_Array($this->arr, $key, $campo)){
                    $this->arr[$key."_2"] = $campo;                   
                }else{                
                    $this->arr[$key] = $campo;
                }*/
            }
            $this->table[] = $this->arr;            
        }
    }
    
    public function getRetornoMapeado(){
        return $this->table;
    }
}

echo "<pre>";
$retornoCEF = new loadFile(array("SeguimentoP"=>$SeguimentoP,"SeguimentoQ"=>$SeguimentoQ,"SeguimentoT"=>$SeguimentoT,"SeguimentoU"=>$SeguimentoU));
$retornoCEF->loadFile("remessa/20170424.txt");
var_dump($retornoCEF->getRetornoMapeado());

//
//foreach ($retornoBB->getRetornoMapeado() as $key => $value) {
//    //@TOTO: ler a tabela e atulizar no banco
//}