<?php
namespace classes\app;

class log {
	public $event = array();
	public $app_start;
	public $app_stop;
	public $app_runtime;

	function __construct(){
		$this->app_start = $this->microtime_float();
		$this->log_event('start log');
	}
	function microtime_float()
	{
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	function app_runtime(){
		$this->microtime_float();
		$time = round($this->microtime_float() - $this->app_start, 4);
		return $time;
	}
	function log_event($event){
		$time = strval($this->app_runtime());
		$this->event[$time][] = $event;
	}
	function stop_log(){
		$this->app_stop = $this->microtime_float();
		$this->app_runtime = $this->app_runtime();
		$this->log_event('stop log');
	}
}
?>