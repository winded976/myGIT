<?php
namespace settings;

use settings\options;

class options_db extends options{

	protected $default = [
		'db_host' => 'localhost',
		'db_user' => 'be_admin',
		'db_pass' => 'qwerty',
		'db_base' => 'default_db'
	];

	protected $test = [];
	protected $prodaction = [];

	
}
?>