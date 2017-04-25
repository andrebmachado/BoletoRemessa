<?php
class dataSource{
    private $fieldName;
    private $dataSet;
    private $State="dsInactive";
    private $lineArray=[];
    private $lineString;
    private $fileGenerate;
    private $castType;
    private $QtdeRegsArquivo_G056;
    private $QtdeRegistLote_G057;
    private $NumSeqRegLote_G038=1;
    private $QtdeTitulos=0;
    private $vlrTotTitulos=0;

    public function __construct(){
        //$this->fileGenerate = new fileGenerate();
    }    
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
            $this->logMsg("Dataset em modo de inserção, de um post() antes de iniciar nova linha.");
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
    private function CampoPersonalizado($params){        
        $valor = $params['Valor'];
        if(empty($params['Valor'])){
            $valor = $params['Default'];            
        }        
        if(isset($params['SIDE_STR'])){
            if($params['SIDE_STR']=="L"){
                $SIDE_STR=STR_PAD_LEFT;
            }else if($params['SIDE_STR']=="R"){
                $SIDE_STR =STR_PAD_RIGHT;
            }            
        }
        return str_pad($valor,$params['leng'],$params['valueReplace'],$SIDE_STR);        
    }
    public  function addField($fieldName,$fieldValue,$fieldParams=array()){                        
            //Soma a quantidade de titulos se o CodSegRegDetalhe_G039=P         
            if($fieldName=='CodSegRegDetalhe_G039' and $fieldValue=="P"){                                
                $this->QtdeTitulos++;                
            } else if($fieldName=="QtdeTitCobranca1_C070"){ //Informa o numero de titulos para o campo QtdeTitCobranca_C070
                $fieldValue = $this->QtdeTitulos;
            }
            //Se o campo informado for o valor do titulo soma com o valor anterior para totalizar
            if($fieldName=='VlrNominalTit_G070'){ 
                //echo "<h3>".$fieldValue."</h3>";
                $this->vlrTotTitulos = $fieldValue + $this->vlrTotTitulos;
            } else if($fieldName=="ValorTotTitCart1_C071"){ //Informa a soma dos titulos para o campo ValorTotTitCart1_C071
                $fieldValue = $this->vlrTotTitulos;
            } 
            //Soma quantidade de registros do arquivo conforme o tipo 0,1,3,5,9            
            if($fieldName=='QtdeRegistArquivo_G056'){                
                $fieldValue = $this->QtdeRegsArquivo_G056;
            }
            //Numero sequencial de registros do lote (Ex: 1P, 2Q, 3P, 4Q)
            if($fieldName=='NumSeqRegLote_G038'){
                $fieldValue = $this->NumSeqRegLote_G038++;
            }            
            //Soma quantidade de lotes do arquivo conforma o tipo 1,3,4,5
            if($fieldName=='TipoRegistro_G003' and $fieldValue>=1 and $fieldValue<=5){
                $this->QtdeRegistLote_G057++;
            } else if($fieldName=='QtdeRegistLote_G057'){
                $fieldValue=$this->QtdeRegistLote_G057;
            }
            //Verifica se o campo informado existe no dataset
            if(array_key_exists($fieldName, $this->dataSet)){
                $this->castType = new castType($this->dataSet[$fieldName]);
                
                //var_dump($this->dataSet[$fieldName]); exit;
                //var_dump($this->castType->value($fieldValue)); exit;
                
                if($this->castType->value($fieldValue)['status']){
                    $this->lineArray[$fieldName]=$this->castType->value($fieldValue)['retorno'];
                    $this->lineString .= $this->castType->value($fieldValue)['retorno'];
                    //$this->lineString .= "-".$this->castType->value($fieldValue)['retorno'];  
                }
            }else{//se nao existe o campo no dataset verifica qual o nome mais próximo para o campo 
                $words  = array_keys($this->dataSet);
                $msg = "Campo ".$fieldName." inexistente, o mais proximo seria o campo ".$this->wordMatch($words, $fieldName, 2);
                $this->Exception($msg);
                $this->logMsg($msg);
                return $msg;
            }
    }
    public function getQtdeRegsArquivo_G056(){
        return $this->QtdeRegsArquivo_G056;
    }
    public function getQtdeRegistLote_G057(){
        return $this->QtdeRegistLote_G057;
    }
    public function getStringFile(){
        return $this->lineString;
    }
    public function post(){
        if(strlen($this->lineString)>240){
            $msg = "Linha superior ao tamanho permitido:\n";
                    //. "".$this->lineString;
            //$this->logMsg($msg);
            //exit;
        }
        $this->lineString .= "\n";
        $this->State = "dsInactive";
        $this->dataSet=array();
        //var_dump($this->dataSet);
        //echo "<b>".strlen($this->lineString)."</b>";
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
            //echo '<pre>Exception: ',  $e->getMessage()," - <b>File:</b>".$e->getFile()."<b> Linha:</b>".$e->getLine(),"</pre>\n";                         
            $logMsg = "Exception:".$e->getMessage()." - File: ".$e->getFile()." Linha: ".$e->getLine();                         
            $this->logMsg($logMsg, "error");
            return False;
        } finally {            
            fclose($f);
            return true;
        }        
    }
    protected static function logMsg( $msg, $level = 'info', $file = 'remessaBanco.log' ){        
        $levelStr = '';        
        switch ( $level ){
            case 'info':                
                $levelStr = 'INFO';// nível de informação
                break;
            case 'warning':                
                $levelStr = 'WARNING';// nível de aviso
                break;
            case 'error':                
                $levelStr = 'ERROR';// nível de erro
                break;
        }        
        $date = date( 'Y-m-d H:i:s' );
        // formata a mensagem do log
        // 1o: data atual
        // 2o: nível da mensagem (INFO, WARNING ou ERROR)
        // 3o: a mensagem propriamente dita
        // 4o: uma quebra de linha
        $msg = sprintf( "[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL );

        // escreve o log no arquivo
        // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
        file_put_contents( $file, $msg, FILE_APPEND );
    }    
    
}