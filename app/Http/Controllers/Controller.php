<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
# Models

use App\Sidebar;


abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public $data;

  	function __construct(){
 		//parent::__construct();
  		$this->data['sidebar'] = Sidebar::get();
        $this->data['config'] =  \Config::get('app.setting');
  }

  public function notification($type = null){
    $messages = \Config::get('notification');
    
    $this->data['msg'] = $messages[$type]; 
    	return view('notification',$this->data);
  }
}
