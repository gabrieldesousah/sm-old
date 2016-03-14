<?php
class Upload extends Controller{

public function material(){
    if( count($_FILES) > 0 ){ //ou isset(..)
    
        $type       = $_POST["type"];
        $content    = $_POST["content"];
        $professor  = $_POST["professor"];
        $area       = $_POST["area"];
        $college    = $_POST["college"];
        $unity      = $_POST["unity"];
        $link       = $_POST["type"];
        $name_file  = $_FILES['file']['name'];
        
        $data = array(
            "type" => $type,
            "content" => $content,
            "professor" => $professor,
            "area" => $area,
            "college" => $college,
            "unity" => $unity,
            "link" => $link,
            "name_file" => $name_file
            );
        
        $upload = new UploadHelper();
        $upload->setFile($_FILES['file']);
        
        $file_explode = explode('.',$_FILES['file']['name']);
        $file_name = $file_explode[0];
	    $extent = strtolower(end($file_explode));
        
        $upload->setFileName($file_name.'-'.md5(time()).'.'.$extent);
        $upload->setPath("/uploads/");

        if( $upload->upload() ) {
            
            $db = new Model();
            $table = "articles";
            var_dump($data);
            
        }
            echo "ok";
        }else {
            echo "falso";
        }
    }
}

/*
if( count($_FILES) > 0 ){ //ou isset(..)
        $upload = new UploadHelper();
        $upload->setFile($_FILES['imagem']);
        
        $file_explode = explode('.',$_FILES['imagem']['name']);
        $file_name = $file_explode[0];
	    $extent = strtolower(end($file_explode));
        
        $upload->setFileName($file_name.'-'.md5(time()).'.'.$extent);
        $upload->setPath("/uploads/");

        if( $upload->upload() ) {
            echo "ok";
        }else {
            echo "falso";
        }
    }
*
}