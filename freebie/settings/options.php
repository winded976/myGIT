<?php
namespace settings;

class options {

	function __construct($log){
		$this->log = $log;
	}

	public function get($val){
		if(isset($this->{$val}) and !empty($this->{$val})){
			$this->log->log_event('load '.get_class($this).'->'.$val.' options');
			return $this->{$val};
		}else{
			$this->log->log_event('load '.get_class($this).'->default options');
			return $this->default;
		}
	}
}
?>