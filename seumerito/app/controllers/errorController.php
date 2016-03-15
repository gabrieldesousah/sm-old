<?php
class Error extends Controller{
    public function index_action(){
        echo "<h1>Ooooops, parece que essa página não existe...</h1>
        <a href='".ROOT."'>Índice</a>";
    }
 

} 