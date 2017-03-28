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
    private function splitLine(){
        $arr="";
        if(substr($this->linhaArquivo ,13, 1)=="T"){
            foreach ($this->dataSetT as $key => $value) {            
                 $arr[] = (object)$key."=>".substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']).",";
            }   
            $this->table[] = $arr;
        }
        if(substr($this->linhaArquivo ,13, 1)=="U"){
            foreach ($this->dataSetU as $key => $value) {            
                $arr[] = $key."=>".substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']);
            }
            $this->table[] = $arr;
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