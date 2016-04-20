<?php

class Model {
    protected $db;
    protected $server = 'localhost';
    protected $dbname = 'seumerito';
    protected $user   = 'root';
    protected $pass   = '';
    
    public function __construct(){
        $this->db = new PDO(
        'mysql:host='.$this->server.'; 
        dbname='.$this->dbname.'; 
        charset=utf8',
        $this->user, 
        $this->pass
        );
    }
    
    public function setTable($table){
        $this->_table = $table;
    }
    
    //CRUD = CreateReadUpdateDelete
    public function insert( $tabela, Array $dados ){
        
        foreach ( $dados as $inds => $vals ){
            $campos[] = $inds;
            $valores[] = $vals;
        }
        $campos = implode(',', $campos);
        $valores = "'".implode("','", $valores)."'";
       
        /*
        $campos= implode(', ', array_keys($dados));
        $valores = "'".implode("',' ", array_values($dados))."'";
        */

        $this->db->query(" INSERT INTO `{$tabela}` ({$campos}) VALUES ({$valores})");
        return true;
    }

    
    public function read( $tabela, $select, $where = null, $limit = null, $offset = null, $orderby = null ){
        $select     = ($select  != null ? " {$select}"     : "*");
        $where      = ($where   != null ? "WHERE {$where}"     : "");
        $limit      = ($limit   != null ? "LIMIT {$limit}"     : "");
        $offset     = ($offset  != null ? "OFFSET {$offset}"   : "");
        $orderby    = ($orderby != null ? "ORDER BY {$orderby}" : "");
        
        $q = $this->db->query("SELECT {$select} FROM `{$tabela}` {$where} {$orderby} {$limit} {$offset}");
        $q->setFetchMode(PDO::FETCH_ASSOC);

        return $q->fetchAll();
    }
    
    public function update( $tabela, Array $dados, $where){
        foreach( $dados as $ind => $val){
            $campos[] = "{$ind} = '{$val}'";
        }
        $campos = implode(",", $campos);
        
        $this->db->query("UPDATE `{$tabela}` SET {$campos} WHERE {$where}");
    }
    public function delete( $tabela, $where){
        $this->db->query("DELETE FROM `{$tabela}` WHERE  {$where}");
        
    }
}