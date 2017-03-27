<?php
include_once 'dataSet.class.php';

class loadFile{
    private $fileData;
    private $lineString;
    private $dataSet=[];
    private $tableData;
    private $linha1 = "11122223444445677888889000000000000ASCCCCCCCCCCCCCCCCCCCCDEEEEEEEEEEEEEEEFFFFFFFFGGGGGGGGGGGGGhHHHIIIIIJKKKKKKKKKKKKKKKKKKKKKKKKKLLMNNNNNNNNNNNNNNNOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOPPPPPPPPPPQQQQQQQQQQQQQRRRRRRRRRRSSSSSSSSSSSSSSSSSTTTT";
    
    public function __construct($params=[]){
        $this->dataSet = $params;
        //var_dump($this->dataSet);
    }
    
    public function splitLine(){
        foreach ($this->dataSet as $key => $value) {            
            echo substr($this->linha1 ,$value['posInicio']-1, $value['leng'])." ------- ";
            echo $key." - <b>Inicio</b>".$value['posInicio']." - <b>Fim</b>".$value['posFim']." - <b>Tam</b>".$value['leng']."<br>";
        }
    }
    
    
}

$retornoBB = new loadFile($SeguimentoT);
$retornoBB->splitLine();