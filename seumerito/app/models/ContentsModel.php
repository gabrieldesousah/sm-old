<?php
class ContentsModel extends Model{
    
    public $_table = "articles";
    
    public function listPosts( $qtd, $offset = null ){
    	$search = "dicas";
        return $this->read($this->_table, 'DISTINCT content', "content != ''", $qtd, $offset, 'content ASC' );
    }
    
    public function insert(){
        $dados=array(
            "titulo" => "trarara",
            "descricao" => "pararatibum"
            );
        return $this->insert( $this->_table, $dados);
    }
    
    public function update(){
        $dados=array(
            "titulo" => "atualiando",
            "descricao" => "descricao"
            );
        return $this->update( $this->_table, $dados, "id=3");
    }
    
    public function delete(){
        return $this->delete( $this->_table, "id = 2");
    }
}