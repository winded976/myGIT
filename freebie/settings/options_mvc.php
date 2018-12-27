<?php
namespace settings;

use settings\options;

class options_mvc extends options{

	protected $default = [
		'controller' => [
			'index',
			'test_page_controller',
			'test_page_3'
		],
		'model' => [
			'index',
			'test_page_controller',
			'test_page_view',
			'test_page_3'
		],
		'view' => [
			'index',
			'test_page_view',
			'test_page_3'
		]
	];

	protected $test = [];
	protected $prodaction = [];
}
/*
https://habr.com/post/181772/

http://192.168.0.109:700/freebie/page_name/sub/page/1?q=1&d=3&page=3

controller - page_name OR default (index)
view - page_name or NEXT part of query (sub) OR default (index)
model - sub OR NEXT part of query OR default (index)

если sub не найден в массиве controller OR views OR model то это вероятно параметр если будет найден в массиве param
ЗНАЧЕНИЕ для параметра следующее значение в массиве если оно не соответствует критереиям param OR view OR controller OR model
если sub не найден в массиве param то это не нужная часть запроса

$router->run()
	router - парсинг запроса, определение контроллера (page_name), определение модели (опционально)
	вернуть масссив $route = [controller, model, view, param]

controller
	- oсновной метод run()

		- проверка запроса на корректность, если нет выдать что страница не существует или по умолчанию (main_page)
		- определяет используемую модель данных и бизнес правил для генерирования контента
		- $model->run() - получение данных
		- $view->run() - получение HTML
		- возврат HTML в index.php

model
	- модель данных и бизнес правил для страницы
	- основной метод run() вернет $data['var'] - массив с данными

*/
?>