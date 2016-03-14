<?php
class RedirectorHelper{
    
    protected $parameters = array();
    
    protected function go( $data ){ //Redireciona para um arquivo dentro da raiz.
        header("Location: " . ROOT . $data);
    }
    
    public function setUrlParameter( $name, $value ){
        $this->parameters[$name] = $value;
    }
    
    protected function getUrlParameters( $name = null ){
        $parms = "";
        foreach( $this->parameters as $name => $value ){
            $parms .= $name . '/' . $value . '/';
        }
        return $parms;
    }
    
    public function goToController( $controller ){ //vai para o index desse controller
        $this->go( $controller ) . '/index/' . $this->getUrlParameters();
    }
    
    public function goToAction( $action ){ //a partir do getCurrentController ele altera a action do controller atual
        $this->go( $this->getCurrentController() . '/' . $action . '/' . $this->getUrlParameters() );
    }
    
    public function goToControllerAction( $controller, $action ){ //Altera tanto o controller quanto a Action
        $this->go( $controller . '/' . $action . '/' . $this->getUrlParameters() );
    }
    
    public function goToUrl( $url ){ //Abre uma URL externa
        header("Location: ".$url);
    }
    
    public function goToIndex(){ //LEva ao index/index, útil emlogout por ex.
        $this->go('index');
    }
    
    
    public function getCurrentController(){ //Retorna o atual controller.
        global $start;
        return $start->_controller;
    }
}