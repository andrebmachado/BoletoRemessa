<?php
include_once 'dataSet.class.php';

class loadFile{  
    
    private $dataSet=[];
    private $tableData=[];
    //private $linha1 = "11122223444445677888889000000000000ASCCCCCCCCCCCCCCCCCCCCDEEEEEEEEEEEEEEEFFFFFFFFGGGGGGGGGGGGGGGHHHIIIIIJKKKKKKKKKKKKKKKKKKKKKKKKKLLMNNNNNNNNNNNNNNNOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOPPPPPPPPPPQQQQQQQQQQQQQQQRRRRRRRRRRSSSSSSSSSSSSSSSSS";
    //private $linha2 = "11122223444445677888888888888888999999999999999000000000000000AAAAAAAAAAAAAAABBBBBBBBBBBBBBBCCCCCCCCCCCCCCCDDDDDDDDDDDDDDDEEEEEEEEEEEEEEEFFFFFFFFGGGGGGGGHHHHIIIIIIIIJJJJJJJJJJJJJJJKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKLLLMMMMMMMMMMMMMMMMMMMMNNNNNNN";
    private $fileName;
    private $ponteiro;
    private $linhaArquivo;
    private $seguimentoU=[];
    
    public function __construct($params=[]){
        $this->dataSet = $params;
        //var_dump($this->dataSet);
    }
    
    public function loadFile($fileName){
        $this->fileName = $fileName;
        $this->ponteiro = fopen ($this->fileName,"r");
        while(!feof($this->ponteiro)){
            $this->linhaArquivo = fgets($this->ponteiro,4096);
            //echo $this->linhaArquivo;
            $this->splitLine();
        }     
        //fclose($this->fileName);
    } 

    public function splitLine(){
        foreach ($this->dataSet as $key => $value) {
            if(substr($this->linhaArquivo ,13, 1)=="T"){
                echo "<br>".$this->seguimentoU[$key] = substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']);
            }
            if(substr($this->linhaArquivo ,13, 1)=="U"){
                echo "<br>".$this->seguimentoU[$key] = substr($this->linhaArquivo ,$value['posInicio']-1, $value['leng']+$value['Dec']);
            }
            //echo $this->seguimentoU[$key];
            //echo substr($this->linha1 ,$value['posInicio']-1, $value['leng']+$value['Dec'])." ------- ";
            //echo $key." - <b>Inicio</b>".$value['posInicio']." - <b>Fim</b>".$value['posFim']." - <b>Tam</b>".$value['leng']."<br>";
        }
        //var_dump($this->seguimentoU);
    }

    
    
}

echo "<pre>";
$retornoBB = new loadFile($SeguimentoT);
$retornoBB->splitLine();
$retornoBB->loadFile("../retorno/RET999999.RET");

