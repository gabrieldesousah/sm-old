<?php
class Page extends Controller{
	public $material;
	public $materialData;
	
	public function material(){

    	$data = $this->getParams();
        $id = $data["id"];

    	$material = new PageModel();
    	
        
        $list_data = $material->materialData($id);
        $data['listData'] = $list_data;
        $this->materialData = $data['listData'];
        
        //var_dump();
        
        $this->view('page', $data);
	}
}