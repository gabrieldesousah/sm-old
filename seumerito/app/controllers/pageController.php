<?php
class Page extends Controller{
	public $material;
	public $materialData;
	
	public function material(){
	
		$this->redirectorHelper = new RedirectorHelper();

    	$data = $this->getParams();
        $id = $data["id"];

    	$material = new PageModel();
    	
        
        $list_data = $material->materialData($id);
        $data['listData'] = $list_data;
        $this->materialData = $data['listData'];
        
        if($this->materialData == null){
        	$this->redirectorHelper->goToController('error');
        }
        //var_dump();
        
        $this->view('page', $data);
	}
}