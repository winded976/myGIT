<?php
namespace classes\app;

use settings\options_mvc;
use settings\options_db;

class options {

	private $opt_suffix = [
		'mvc',
		'db',
		'param'
	];

	function __construct($log){
		$this->log = $log;
	}

	function __destruct(){}

	public function getOptions($type_opt){
		$this->log->log_event('start options');
		foreach($this->opt_suffix as $suffix){
			$obj = 'settings\options_'.$suffix;
			$obj = new $obj($this->log);
			$options[$suffix] = $obj->get($type_opt);
		}
		$this->log->log_event('stop options');
		return $options;
	}
}
?>