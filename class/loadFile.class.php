<?php
include_once 'dataSet.class.php';
//$testLinha1 = "11122223444445677888889000000000000ASCCCCCCCCCCCCCCCCCCCCDEEEEEEEEEEEEEEEFFFFFFFFGGGGGGGGGGGGGGGHHHIIIIIJKKKKKKKKKKKKKKKKKKKKKKKKKLLMNNNNNNNNNNNNNNNOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOPPPPPPPPPPQQQQQQQQQQQQQQQRRRRRRRRRRSSSSSSSSSSSSSSSSS";
//$testLinha2 = "11122223444445677888888888888888999999999999999000000000000000AAAAAAAAAAAAAAABBBBBBBBBBBBBBBCCCCCCCCCCCCCCCDDDDDDDDDDDDDDDEEEEEEEEEEEEEEEFFFFFFFFGGGGGGGGHHHHIIIIIIIIJJJJJJJJJJJJJJJKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKLLLMMMMMMMMMMMMMMMMMMMMNNNNNNN";

class loadFile{  
    private $dataSetT=[];
    private $dataSetU=[];
    private $table=[];
    private $fileName;
    private $ponteiro;
    private $linhaArquivo;  
    private $arr;
    
    public function __construct($params=[]){
        $this->dataSetT = $params['SeguimentoT'];
        $this->dataSetU = $params['SeguimentoU'];
        //var_dump($this->dataSetU);
    }
    public function loadFile($fileName){
        $this->fileName = $fileName;
        $this->ponteiro = fopen ($this->fileName,"r");
        while(!feof($this->ponteiro)){
            $this->linhaArquivo = fgets($this->ponteiro,4096);
            $this->splitLine();
        }     
        //fclose($this->fileName);
    } 
    
    public function separaDecimal($str,$nDecimal=2,$separador=","){
        return substr($str, 0,-$nDecimal).$separador.substr($str, -$nDecimal);
    }
    
    /*
     * Verifica se existe uma chave/valor no array
     * @param $array onde buscar
     * @param $chave que esta buscado
     * @param $valor par da $chave que esta buscando
     */
    public function findKeyValue_Array($array,$chave,$valor){
        echo "<b>Chave:</b>".$chave." <b>Valor:</b>".$valor."<br>";
        foreach ($array as $key => $value) {
            if(($key==$chave) and ($value==$valor)){
                return true;            
            }else{
                return false;
            }
        }
    }      
    
    private function splitLine(){
        if(substr($this->linhaArquivo ,13, 1)=="T"){
            $this->arr="";
        }
        if(substr($this->linhaArquivo ,13, 1)=="T"){            
            //Percorre o datasetT para splitar os campos
            foreach($this->dataSetT as $key => $value){
                if($value['Dec']!=0){//Verifica se o campo tem decimal e coloca virgula
                    $campo = $this->separaDecimal(substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']), 2, ",");
                } else {
                    $campo = $this->arr[$key] = substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']);                    
                }
                $this->arr[$key] = $campo;
            }
            //$this->table[] = $this->arr;
        }
        if(substr($this->linhaArquivo ,13, 1)=="U"){
            //Percorre o datasetU para splitar os campos
            foreach ($this->dataSetU as $key => $value) {
                if($value['Dec']!=0){
                    $campo = $this->separaDecimal(substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']));                    
                } else {
                    $campo = $this->arr[$key] = substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']);
                } 
                if($key === 'CodSegRegDetalhe_G039'){
                    $campo="T e U";
                }
                if($this->findKeyValue_Array($this->arr, $key, $campo)){
                    $this->arr[$key] = $campo;
                }else {
                    $this->arr[$key."_2"] = $campo;
                }
            }
           $this->table[] = $this->arr;
        }
    }
    
    public function getRetornoMapeado(){
        return $this->table;
    }
}

echo "<pre>";
$retornoBB = new loadFile(array("SeguimentoT"=>$SeguimentoT,"SeguimentoU"=>$SeguimentoU));
$retornoBB->loadFile("../retorno/RET999999.RET");
var_dump($retornoBB->getRetornoMapeado());

foreach ($retornoBB->getRetornoMapeado() as $key => $value) {
    //@TOTO: ler a tabela e atulizar no banco
}