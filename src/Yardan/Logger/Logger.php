<?php
namespace Yardan\Logger;
/**
 * Description of Logger
 *
 * @author daniar
 */
class Logger implements LoggerInterface {
    protected $file;
    
    public function __construct($file) {
        $this->setFile($file);
    }


    public function setFile($file){
        $this->file = $file;
        return $this;
    }
    
    public function getFile(){
        return $this->file;
    }
    
    public function write($msg){
        $handler = fopen($this->getFile(), 'ab+');
        $msg = date('d-m-Y H:i:s').PHP_EOL.$msg.PHP_EOL;
        fwrite($handler, $msg);
        fclose ($handler);
    }
}
