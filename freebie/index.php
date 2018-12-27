<?php
namespace freebie;

use classes\app\registry;
use classes\app\log;
use classes\app\options;
use classes\app\router;

ini_set('display_errors','1');

spl_autoload_extensions('.php');
spl_autoload_register(function($name){
	require str_replace('\\',DIRECTORY_SEPARATOR,$name.'.php');
});

$log = new log();
$log->log_event('start app');
$boot = new boot_loader();
$reg = new registry();
$reg->set('boot',$boot);
$reg->set('site_path',site_path);
$reg->set('base_url',base_url);
$reg->set('separator',separator);
$reg->set('request_uri', str_ireplace($boot->base_dir(), '', $_SERVER['REQUEST_URI']));
$reg->set('query_string', $_SERVER['QUERY_STRING']);
$reg->set('request', $_REQUEST);
$reg->set('root_namespace',__NAMESPACE__);
$reg->set('log',$log);

$opt = new options($log);
$options = $opt->getOptions('test'); // test OR prodaction
$reg->set('options',$options);

$router = new router($reg);
$route = $router->run();
$reg->set('route',$route);

$log->log_event('stop app');
$log->stop_log();

//output
if(!$boot->terminal){
	header('Content-Type:text/html; charset=utf-8;');
	header('Expires: Wed, 04 Nov 1976 07:15:09 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Pragma: no-cache');
}

echo $boot->vardump('$reg', $reg->vars);
//echo $boot->vardump('$route', $route);
//echo $boot->vardump('$boot->base_dir()', $boot->base_dir());
//echo $boot->vardump('SERVER', $_SERVER);


class boot_loader {

	public $terminal = 0;
	
	function __construct(){
		if(!isset($_SERVER['SERVER_PORT']) and !isset($_SERVER['SERVER_NAME'])){
			$this->terminal = 1;
		}
		define('separator',DIRECTORY_SEPARATOR);
		define('site_path',$this->site_path());
		define('base_url',$this->base_url());
	}

	function __destruct(){

	}

	//FUNCTIONS
	public function site_path(){
		return realpath(dirname(__FILE__)).separator;
	}
	public function base_url(){
		if(!$this->terminal){
			$port = '';
			if($_SERVER['SERVER_PORT'] == 443) $protocol = "https://";
			else if($_SERVER['SERVER_PORT'] == 80) $protocol = "http://";
			else{
				$protocol = "http://";
				$port = ":".$_SERVER['SERVER_PORT'];
			}
			$base_url = str_replace('\\','/',$protocol.$_SERVER['SERVER_NAME'].$port.$this->base_dir());
			return $base_url;
		}else{
			return $this->site_path();
		}
	}
	public function vardump($name,$val){
		if(!$this->terminal){
			$html = "<pre>";
			$html .= "<font color='blue'>".$name.":</font><br><code>";
			is_string($val) ? $html .= print_r(str_replace(chr(9),'',$val),true) : $html .= print_r($val,true);
			$html .= "</code></pre><hr><br>";
			return $html;
		}else{
			$html = "\n".$name.":\n";
			is_string($val) ? $html .= print_r(str_replace(chr(9),'',$val),true) : $html .= print_r($val,true);
			return $html."\n";
		}
	}
	public function microtime_float(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
	public function base_dir(){//if site locate in dir (example sites/site_01)
		$base_dir = substr(dirname(__FILE__), strpos(dirname(__FILE__),basename($_SERVER['DOCUMENT_ROOT'])) + strlen(basename($_SERVER['DOCUMENT_ROOT']))).separator;
		return $base_dir;
	}
}
?>