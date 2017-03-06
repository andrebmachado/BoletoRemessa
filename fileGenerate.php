<?php
class fileGenerate{    
    private $pathFile;
    private $fileName;
    private $fileData;        
    
    function getPathFile() {
        return $this->pathFile;
    }
    function getFileName() {
        return $this->fileName;
    }
    function getFileData() {
        return $this->fileData;
    }
    function setPathFile($pathFile) {
        $this->pathFile = $pathFile;
    }
    function setFileName($fileName) {
        $this->fileName = $fileName;
        if(empty($fileName)){
            $this->fileName = date('Ymd')."txt";
        }        
    }
    function setFileData($fileData) {
        $this->fileData = $fileData;
    }
    function __construct() {
        $this->fileName = date('Ymd')."txt";
    }    
    function teste(){
        print $this->pathFile."/".$this->fileName;
    }    
    function fileGenerate(){
        $x = $this->pathFile."/".$this->fileName;
        $file = fopen($x, 'w');
        fwrite($file, $this->fileData);
        fclose($file);
    }
    function fileAppend(){
        $x = $this->pathFile."/".$this->fileName;
        $file = fopen($x, 'a');
        fwrite($file, $this->fileData);
        fclose($file);
    }
    
}

//$f = new fileGenerate();
//$f->setFileData("10001");
//$f->setPathFile("remessa");
////$f->fileGenerate();
//$f->fileAppend();
