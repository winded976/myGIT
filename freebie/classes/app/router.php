<?php
namespace classes\app;

class router {

	public $route 		= ['controller' => 'index', 'model' => 'index', 'view' => 'index', 'param' => []];
	private $reg;
	private $log;
	private $model 		= 'index';
	private $view 		= 'index';
	private $controller = 'index';
	
	function __construct($reg){
		$this->reg = $reg;
		$this->log = $reg['log'];
		$this->log->log_event('start router');
	}

	function __destruct(){

	}

	//FUNCTIONS

	public function run(){
		$this->route['request_uri'] = $this->parse_request_uri($this->reg->vars['request_uri']);
		$this->route['request'] = $this->parse_request($this->reg->vars['request']);
		return $this->route;
	}

	private function parse_url($url){
		$url = parse_url($url, PHP_URL_PATH); if($url == '') return [];
		if($url !== false){
			$url = explode(separator, str_ireplace('\\',separator,str_ireplace('/',separator, trim($url, '/\\'))));
			return $url;
		}else return $url;
	}

	private function parse_request_uri($request_uri){
		$request_uri = $this->parse_url($request_uri);
		foreach($request_uri as $key => $part_uri){
			foreach($this->route as $mvc => $obj_name){
				if(isset($this->reg->vars['options']['mvc'][$mvc])){
					$arr_obj_names = $this->reg->vars['options']['mvc'][$mvc];
					$arr_obj_names = array_flip($arr_obj_names);
					if(isset($arr_obj_names[$part_uri])){
						$this->route[$mvc] = $this->reg->vars['options']['mvc'][$mvc][$arr_obj_names[$part_uri]];
					}
				}
				if(isset($this->reg->vars['options'][$mvc][$part_uri]) 
				and isset($request_uri[$key + 1])
				and !isset($this->reg->vars['options'][$mvc][$request_uri[$key + 1]])){
					$this->route[$mvc][$this->reg->vars['options'][$mvc][$part_uri]] = $request_uri[$key + 1];
				}
			}
		}
		return $request_uri;
	}

	private function parse_request($request){
		foreach($request as $key => $value){
			if(isset($this->reg->vars['options']['param'][$key])
			and !isset($this->route['param'][$key])){
				$this->route['param'][$key] = $value;
			}
		}
		return $request;
	}
}
?>