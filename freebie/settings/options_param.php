<?php
namespace settings;

use settings\options;

class options_param extends options{

	protected $default = [
		'page' => 'page',
		'answer' => 'answer',
		'test_param' => 'test_param'
	];

	protected $test = [];
	protected $prodaction = [];
}
?>