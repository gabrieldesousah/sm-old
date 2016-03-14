<?php
class UploadHelper{
    protected $path = 'uploads/material/', $file, $fileName, $fileTmpName;
    
    //tmp = temporário
    
    /*Altera a pasta caso seja chamado. 
    a pasta usual é uploads, pode alterar fazendo setPath("up_2/")*/
    public function setPath( $path ){ 
        $this->path = $path;
    }
    
    public function setFile($file){
        $this->file = $file;
        $this->setFileName();
        $this->setFileTmpName();
    }
    
    public function setFileName($name = null){
        if($name == null){
            $this->fileName = $this->file['name'];
        }else{
            $this->fileName = $name;
        }
    }
    
    public function setFileTmpName(){
        $this->file['tmp_name'] = $this->file['tmp_name'];
    }
    
    public function upload(){
    
        if(move_uploaded_file($this->file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].ROOT.$this->path . basename($this->fileName))){
			return true;
        }
        else{
            return false;
        }
    }
}